<?php

namespace App\Http\Livewire;

use App\Models\Feed;
use Livewire\Component;

class SettingsProfile extends Component
{
    public $bio;
    public $phone;
    public $website;
    public $job;
    public $location;
    public $is_public;

    public function mount()
    {
        $this->bio = auth()->user()->profile->bio;
        $this->phone = auth()->user()->profile->phone;
        $this->website = auth()->user()->profile->website;
        $this->job = auth()->user()->profile->job;
        $this->location = auth()->user()->profile->location;
        $this->is_public = auth()->user()->profile->is_public;
    }
    
    protected $rules = [
        'bio' => 'nullable|sometimes|max:400',
        'phone' => 'nullable|sometimes|digits_between:9,11',
        'website' => 'nullable|sometimes|url',
        'job' => 'nullable|sometimes|string|max:50',
        'location' => 'nullable|sometimes|string|max:50',
        'is_public' => 'boolean',
    ];

    public function updateUserProfile()
    {
        $this->validate();

        auth()->user()->profile()->update([
            'bio' => $this->bio,
            'phone' => $this->phone,
            'website' => $this->website,
            'job' => $this->job,
            'location' => $this->location,
            'is_public' => $this->is_public,
        ]);

        session()->flash('message', 'Profilo aggiornato!');

        $this->emit('update-user-profile');
    }

    public function toggleVisibility()
    {
        $this->is_public = !$this->is_public;
    }

    public function render()
    {
        return view('livewire.settings-profile');
    }
}
