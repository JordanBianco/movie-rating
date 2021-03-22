<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserProfile extends Component
{
    protected $listeners = [
        'update-user-avatar' => 'render',
        'update-user-account' => 'render',
        'update-user-profile' => 'render',
    ];

    public function render()
    {
        return view('livewire.user-profile');
    }
}
