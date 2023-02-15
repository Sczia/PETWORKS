<?php

namespace App\Http\Livewire\Appointment;

use App\Http\Controllers\MailController as ControllersMailController;
use App\Http\Controllers\Manage\MailController;
use App\Models\Appointment;
use App\Models\Owner;
use App\Models\Pet;
use Livewire\Component;

class Form extends Component
{
    public $services;
    /* steps */
    public $currentStep;
    public $totalStep;
    public $isNewClient = false;
    public $isOldClient = false;
    public $cancel = false;

    /* Old client */
    public $hasEmail = false;
    public $emailAddress;
    public $otp;
    public $pets;
    public $pet_id;
    public $pet;
    public $owner;
    public $addPet = false;
    public $dpet_name;
    public $dpet_type;
    public $dage;
    public $dbirthdate;
    public $dgender;
    public $dbreed;
    /* New client */
    /* owner */
    public $name;
    public $email;
    public $number;
    public $address;
    /* pet */
    public $pet_name;
    public $pet_type;
    public $age;
    public $birthdate;
    public $gender;
    public $breed;
    public $color;

    /* appointment */
    public $reason_id;
    public $date;
    public $appointments;
    public $time;

    public $cancelBtn = false;
    public $yes = false;
    public $cancelId = 0;
    public $attempt = 0, $limit = 3, $rememberEmail;
    public function validateData()
    {
        switch ($this->currentStep) {
            case 2:
                if ($this->isOldClient) {
                    if ($this->hasEmail) {
                        if ($this->addPet) {
                            $this->validate([
                                // pet info
                                'pet_name' => 'required',
                                'pet_type' => 'required',
                                'age' => 'required',
                                'birthdate' => 'required',
                                'gender' => 'required',
                                'breed' => 'required',
                                'color' => 'required',
                                /* appointment */
                                'reason_id' => 'required',
                                'date' => 'required',
                                'time' => 'required',
                            ]);
                        } else {
                            $this->validate([
                                /* appointment */
                                'reason_id' => 'required',
                                'date' => 'required',
                                'time' => 'required',
                            ]);
                        }
                    } else {
                        $this->validate([
                            'emailAddress' => 'required|email',
                        ]);
                    }
                }
                if ($this->isNewClient) {
                    $this->validate([
                        /* owner */
                        'name' => 'required',
                        'email' => 'required|email|unique:owners,email',
                        'number' => 'required|numeric|digits:11',
                        'address' => 'required',
                        // pet info
                        'pet_name' => 'required',
                        'pet_type' => 'required',
                        'age' => 'required',
                        'birthdate' => 'required',
                        'gender' => 'required',
                        'breed' => 'required',
                        'color' => 'required',
                        /* appointment */
                        'reason_id' => 'required',
                        'date' => 'required',
                        'time' => 'required',
                    ]);
                }
                break;
        }
    }

    public function increment()
    {
        $this->currentStep++;
        if ($this->currentStep == $this->totalStep) {
            $this->currentStep = $this->totalStep;
        }
    }
    public function decrement()
    {
        $this->currentStep--;
        if ($this->currentStep < 0) {
            $this->currentStep = 1;
        }
    }
    public function appointment()
    {
        $this->resetErrorBag();
        $this->validateData();
        if ($this->isNewClient) {
            $url = route('mail.send.verify', ['token' => $this->email]);
            ControllersMailController::sendVerificationEmail($this->name, $this->email, $url);
            $owner_id = Owner::create(
                [
                    'name' => $this->name,
                    'address' => $this->address,
                    'email' => $this->email,
                    'number' => $this->number,
                ]
            )->id;

            $pet_id = Pet::create(
                [
                    'owner_id' => $owner_id,
                    'pet_name' => $this->pet_name,
                    'age' => $this->age,
                    'gender' => $this->gender,
                    'birthdate' => $this->birthdate,
                    'breed' => $this->breed,
                    'pet_type' => $this->pet_type,
                    'color' => $this->color,
                ]
            )->id;
            Appointment::create(
                [
                    'owner_id' => $owner_id,
                    'pet_id' => $pet_id,
                    'reason_id' => $this->reason_id,
                    'date' => $this->date,
                    'time' => $this->time,
                ]
            );
        }
        if ($this->isOldClient) {
            if ($this->addPet) {
                try {
                    $pet_id = Pet::create(
                        [
                            'owner_id' => $this->owner->id,
                            'pet_name' => $this->pet_name,
                            'age' => $this->age,
                            'gender' => $this->gender,
                            'birthdate' => $this->birthdate,
                            'breed' => $this->breed,
                            'color' => $this->color,
                            'pet_type' => $this->pet_type,
                        ]
                    )->id;
                    Appointment::create([
                        'owner_id' => $this->owner->id,
                        'pet_id' => $pet_id,
                        'reason_id' => $this->reason_id,
                        'date' => $this->date,
                        'time' => $this->time,
                    ]);
                } catch (\Throwable $th) {
                    dd($th);
                }
            } else {
                Appointment::create([
                    'owner_id' => $this->owner->id,
                    'pet_id' => $this->pet->id,
                    'reason_id' => $this->reason_id,
                    'date' => $this->date,
                    'time' => $this->time,
                ]);
            }
        }
        $this->resetExcept(
            'isOldClient',
            'isNewClient',
            'cancel',
            'currentStep',
            'owner',
            'pets',
            'hasEmail',
            'services',
            'addPet'
        );
    }
    public function new()
    {
        $this->increment();
        $this->isNewClient = true;
    }
    public function old()
    {
        $this->increment();
        $this->isOldClient = true;
    }
    public function cancel()
    {
        $this->increment();
        $this->cancel = true;
    }
    public function no()
    {
        $this->cancelBtn = false;
    }
    /* function cancel button */
    public function cancelButton($id)
    {
        $this->cancelBtn = true;
        $this->cancelId = $id;
    }

    public function cancelAppointment($id)
    {
        $appointment = Appointment::find($id);
        if ($appointment->status == 'request' || $appointment->status == 'pending') {
            $appointment->update(['status' => 'cancelled', 'cancelled_by' => 'Client']);
            /* session success message */
            session()->flash('success', 'Appointment cancelled successfully');
        }
        $this->appointments = appointment::where('owner_id', '=',   $this->owner->id)->where(function ($query) {
            $query->where('status', '=', 'request')->orWhere('status', '=', 'pending');
        })->get();
    }
    public function verifyEmail()
    {
        $this->resetErrorBag();
        $this->validateData();
        try {
            $this->owner = Owner::where('email', '=', $this->emailAddress)->firstOrFail();
            if ($this->isOldClient) {
                $this->pets = Pet::where('owner_id', '=',   $this->owner->id)->get();
            } else {
                $this->appointments = appointment::where('owner_id', '=',   $this->owner->id)->where(function ($query) {
                    $query->where('status', '=', 'request')->orWhere('status', '=', 'pending');
                })->get();
            }
            $this->hasEmail = true;
        } catch (\Throwable $th) {
            $this->attempt++;
            if ($this->attempt > $this->limit) {
                /* redirect back */
                alert()->error('SYSTEM MESSAGE', ' Attempted too many times')->autoClose(5000)->width('500px')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
                return redirect(request()->header('Referer'));
            } else {
                $this->addError('emailAddress', 'Email not found');
                $this->hasEmail = false;
            }
        }
        # code...

    }
    public function back()
    {
        $this->decrement();
        $this->resetExcept('currentStep', 'services');
    }
    public function addPet()
    {
        $this->resetErrorBag();
        if ($this->addPet) {
            $this->addPet = false;
        } else {
            $this->addPet = true;
        }
    }
    public function mount()
    {
        $this->currentStep = 1;
    }

    public function render()
    {
        /*   if ($this->cancel) {
            $this->appointments = appointment::where('owner_id', '=',   $this->owner->id)->where(function ($query) {
                $query->where('status', '!=', 'done')->orWhere('status', '!=', 'cancelled');
            })->get();
        } */
        if ($this->isOldClient == true && $this->hasEmail == true) {
            if (!empty($this->pet_id)) {
                $this->pet = Pet::find($this->pet_id);
                $this->dpet_name = $this->pet->pet_name;
                $this->dpet_type = $this->pet->pet_type;
                $this->dbirthdate = $this->pet->birthdate;
                $this->dage = $this->pet->age;
                $this->dgender = $this->pet->gender;
                $this->dbreed = $this->pet->breed;
            }
        }
        return view('livewire.appointment.form');
    }
}
