<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Livewire\Attributes\Rule;
use Livewire\Component;

class NewUser extends Component
{

    #[Rule('required|string')]
    public string $name;

    #[Rule('required|email|unique:users,email')]
    public string $email;

    #[Rule('required')]
    public string $password;

    public function save()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        session()->flash('success', 'New user added successfully.');
        $this->redirectRoute('list-users');
    }

    public function render()
    {
        return view('livewire.admin.users.new-user');
    }
}
