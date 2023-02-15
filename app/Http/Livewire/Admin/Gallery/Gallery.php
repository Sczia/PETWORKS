<?php

namespace App\Http\Livewire\Admin\Gallery;

use App\Models\Album;
use App\Models\model\Photos;
use App\Models\Photos as ModelsPhotos;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Gallery extends Component
{
    use WithFileUploads;
    public $photos = [];
    public $title, $date;
    public function save()
    {
        $this->validate([
            'title' => 'required',
            'date' => 'required',
            'photos.*' => 'required|mimes:png,jpg|max:5024', // 5MB Max
        ]);
        $title = Str::replace(' ', '-', Str::lower($this->title));
        $path = 'uploads/gallery/' . $title;
        $photo = $this->photos[0];
        $filename = $title . '-.' . $photo->getClientOriginalExtension();
        $photo->storeAs($path, $filename);
        $gallery_id = Album::create([
            'title' => $this->title,
            'base_path' => $path,
            'path' => $path . '/' . $filename,
            'date' => $this->date
        ])->id;
        try {
            // Iterate through each photo
            foreach ($this->photos as $key => $photo) {
                // Generate a unique filename
                $filename = $this->title . '-' . ($key + 1) . '.' . $photo->getClientOriginalExtension();
                // Check if the file already exists in the given path
                while (Storage::exists($path . '/' . $filename)) {
                    // If it does, increment the key and generate a new filename
                    $filename = $this->title . '-' . ++$key . '.' . $photo->getClientOriginalExtension();
                }
                // Create a new photo in the database
                ModelsPhotos::create([
                    'album_id' => $gallery_id,
                    'photo' => Str::lower($this->title . '-' . $key),
                    'path' => $path.'/'. $filename,
                ]);
                // Save the photo to the given path
                $photo->storeAs($path, $filename);
            }
            toast()->success('SYSTEM MESSAGE', ' Added successfully.')->autoClose(5000)->width('500px')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
            return redirect(request()->header('Referer'));
            $this->reset();
        } catch (\Throwable $th) {
            toast()->error('SYSTEM MESSAGE', $th->getMessage())->autoClose(5000)->width('500px')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
            return redirect(request()->header('Referer'));
        }
    }


    public function render()
    {
        return view('livewire.admin.gallery.gallery');
    }
}
