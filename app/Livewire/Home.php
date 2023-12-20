<?php

namespace App\Livewire;

use Auth;
use Livewire\Component;

class Home extends Component
{
    public bool $isLoggedIn;

    public function render()
    {
        return view('livewire.home')
            ->title('Lara Social Admin Panel');
    }
}
