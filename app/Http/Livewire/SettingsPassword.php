<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class SettingsPassword extends Component
{
    public string $password = '';
    public string $password_confirmation = '';

    public bool $show = false;

    protected $rules = [
        'password' => 'required|string|confirmed|min:8'
    ];

    public function togglePasswordVisibility()
    {
        $this->show = ! $this->show;;
    }

    public function updateUserPassword()
    {
        $this->validate();

        auth()->user()->update([
            'password' => Hash::make($this->password)
        ]);

        session()->flash('message', 'Password aggiornata correttamente');
    }

    public function render()
    {
        return view('livewire.settings-password');
    }
}
