<?php

namespace App\Http\Livewire;

use App\Models\Image;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class SettingsImage extends Component
{
    use WithFileUploads;

    public $profile_image;

    protected $rules = [
        'profile_image' => 'image|max:1024|'
    ];

    public function updateUserProfileImage()
    {
        $this->validate();

        if (auth()->user()->images()->exists()) {
            // Si rimuove l'immagine precedente, se esiste
            auth()->user()->images()->first()->delete();
        }

        $path = $this->profile_image->store('images', 'public');

        Image::create([
            'url' => $path,
            'imageable_id' => auth()->id(),
            'imageable_type' => User::class,
        ]);

        session()->flash('message', 'Immagine cambiata correttamente.');

        $this->reset();

        $this->emit('update-user-avatar');
    }
    
    public function render()
    {
        return view('livewire.settings-image');
    }
}
