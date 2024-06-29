<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Blacklist extends Component
{
    public $blacklistedUsers;

    public function mount()
    {
        $this->blacklistedUsers = User::where('blacklisted', true)->get();
    }

    public function removeFromBlacklist($id)
    {
        $user = User::findOrFail($id);
        $user->blacklisted = false;
        $user->save();

        session()->flash('message', 'Usuario eliminado de la lista negra.');

        $this->mount();
    }

    public function render()
    {
        return view('livewire.blacklist');
    }
}
