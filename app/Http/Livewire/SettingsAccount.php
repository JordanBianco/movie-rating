<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SettingsAccount extends Component
{
    public $name, $email, $username;

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->username = auth()->user()->username;
    }

    public function updateUserAccount()
    {
        $this->validate([
            'name' => 'required|min:2',
            'email' => ['required','email', 'unique:users,email,' . auth()->user()->id],
            'username' => ['required','alpha_dash', 'unique:users,username,' . auth()->user()->id]
        ]);

        auth()->user()->update([
            'name' => $this->name,
            'email' => $this->email,
            'username' => $this->username,
        ]);

        session()->flash('message', 'Informazioni aggiornate correttamente.');

        $this->emit('update-user-account');
    }

    public function render()
    {
        return view('livewire.settings-account');
    }
}
