<?php

namespace App\Livewire\Admin;

use Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Logout extends Component
{

    public function logout()
    {
        Auth::logout();
        session()->flash('success', 'Logout successfully.');
        $this->redirectRoute('login');
    }

    public function render()
    {
        return view('livewire.admin.logout');
    }
}
