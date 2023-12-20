<?php

namespace App\Livewire\Admin;

use Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Login extends Component
{
//    protected $listeners = [
//        'logout-event' => 'logout',
//    ];

    #[Rule('required|email')]
    public string $email;

    #[Rule('required')]
    public string $password;

    public bool $remember = false;

    public function login()
    {
        $this->validate();
        $credentials = ['email' => $this->email, 'password' => $this->password];

        if (Auth::attempt($credentials, $this->remember)) {
            $this->redirectRoute('home');
        }
        session()->flash('error', 'Invalid email or password.');
    }

    public function render()
    {
        return view('livewire.admin.login')
            ->title('Login')
            ->layout('layouts.login.login');
    }
}
