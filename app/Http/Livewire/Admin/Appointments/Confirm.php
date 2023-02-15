<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Appointment;
use App\Models\category;
use App\Models\Daily;
use App\Models\Doctor;
use App\Models\Photos;
use App\Models\product;
use App\Models\sale;
use App\Models\SoldProduct;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Confirm extends Component
{
    use WithFileUploads;
    public $currentStep = 1;
    public $totalSteps = 2;
    public $doctors;
    public $appointment_id;
    public $appointment;
    public $categories;
    public $category_id;
    public $products = [];
    public $selected_products = [];
    public $productId;
    public $prevProductId;
    public $total = 0;
    public $sub_product = 0;
    public $sub_service = 0;
    public $once = true;


    /* dito yung variables ng inc */
    public $complaint;
    public $weight;
    public $hr;
    public $rr;
    public $diet;
    public $temperature;
    public $color;
    public $next_visit;
    public $doctor_id;
    public $history;
    public $prescription;
    public $comment;
    public $photos;


    public function next()
    {
        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
    }

    public function back()
    {
        $this->currentStep--;
        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }

    public function mount()
    {
        $this->doctors = Doctor::all();
        $this->categories = category::all();
        $this->appointment = Appointment::find($this->appointment_id);
        $this->selected_products = SoldProduct::where('appointment_id', $this->appointment_id)->get();
        foreach ($this->selected_products as $product) {
            $this->sub_product = $this->sub_product + ($product->product->price * $product->quantity);
        }
        $this->sub_service = $this->appointment->service->price;
        $this->total = $this->sub_product + $this->sub_service;
    }
    public function increase($id)
    {
        try {
            $product = SoldProduct::where('appointment_id', $this->appointment_id)
                ->where('product_id', $id)
                ->firstOrFail();
            $product->quantity = $product->quantity + 1;
            $product->update();
            $product_price = product::find($id)->price;
            $this->sub_product = $this->sub_product + $product_price;
            $this->total = $this->total + $product_price;
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function decrease($id)
    {
        try {
            $product = SoldProduct::where('appointment_id', $this->appointment_id)
                ->where('product_id', $id)
                ->firstOrFail();
            $product->quantity = $product->quantity - 1;
            $product->update();
            $product_price = product::find($id)->price;
            $this->sub_product = $this->sub_product - $product_price;
            $this->total = $this->total - $product_price;
            if ($product->quantity == 0) {
                $product->delete();
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function updatedProductId($productId)
    {
        $product = product::where('id', $productId)->first();
        try {
            $sold = SoldProduct::where('appointment_id', $this->appointment_id)
                ->where('product_id', $productId)
                ->firstOrFail();
            $sold->quantity = $sold->quantity + 1;
            $sold->update();
            $product_price = product::find($productId)->price;
            $this->sub_product = $this->sub_product + $product_price;
            $this->total = $this->total + $product_price;
        } catch (\Throwable $th) {
            SoldProduct::create([
                'appointment_id' => $this->appointment_id,
                'product_id' => $product->id,
                'quantity' => 1,

            ]);
            $product_price = product::find($productId)->price;
            $this->sub_product = $this->sub_product + $product_price;
            $this->total = $this->total + $product_price;
        }

        $this->reset('productId');
    }
    public function submit()
    {
        $appointment = Appointment::where('id', '=', $this->appointment_id)->first();
        $appointment->update([
            'complaint' => $this->complaint,
            'weight' => $this->weight,
            'hr' => $this->hr,
            'rr' => $this->rr,
            'temperature' => $this->temperature,
            'diet' => $this->diet,
            'next_visit' => $this->next_visit,
            'history' => $this->history,
            'prescription' => $this->prescription,
            'comment' => $this->comment,
            'doctor_id' => $this->doctor_id,
            'status' => 'done',
            'type' => 'old client'


        ]);
        $transaction = Daily::create([
            'appointment_id' => $this->appointment_id,
            'amount' => $this->total,
        ]);
        $path = 'uploads/appointments/' . $appointment->owner->name . '/' . $appointment->service->service;
        $title= $appointment->service->service;
        try {
            // Iterate through each photo
            foreach ($this->photos as $key => $photo) {
                // Generate a unique filename
                $filename = $title . '-' . ($key + 1) . '.' . $photo->getClientOriginalExtension();
                // Check if the file already exists in the given path
                while (Storage::exists($path . '/' . $filename)) {
                    // If it does, increment the key and generate a new filename
                    $filename = $title . '-' . ++$key . '.' . $photo->getClientOriginalExtension();
                }
                // Create a new photo in the database
                Photos::create([
                    'appointment_id' => $this->appointment_id,
                    'photo' => Str::lower($title . '-' . $key),
                    'path' => $path . '/' . $filename,
                ]);
                // Save the photo to the given path
                $photo->storeAs($path, $filename);
            }
            $sold_products = SoldProduct::where('appointment_id','=',$this->appointment_id)->get();

            foreach ($sold_products as $product) {
                $sale = Sale::firstOrNew(['product_id' => $product->product_id]);
                $remain = $sale->remain ? $sale->remain : $product->product->stock;
                $sale->sold = $product->quantity;
                $sale->remain = $remain - $product->quantity;
                $sale->sale = $sale->sale + ($product->quantity * $product->product->price);
                $sale->save();
            }
            return redirect(route('admin.owner.index'));
        } catch (\Throwable $th) {
            toast()->error('SYSTEM MESSAGE', $th->getMessage())->autoClose(5000)->width('500px')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
            return redirect(request()->header('Referer'));
        }

    }
    public function render()
    {
        $this->selected_products = SoldProduct::where('appointment_id', $this->appointment_id)->get();
        $this->products = product::where('category_id', '=', $this->category_id)->get();
        return view('livewire.admin.appointments.confirm');
    }
}
