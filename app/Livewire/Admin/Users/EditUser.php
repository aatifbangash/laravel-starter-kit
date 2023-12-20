<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EditUser extends Component
{
    public User $user;

    #[Rule('required|string')]
    public string $name;

//    #[Rule('required|email|unique:users,email')]
    public string $email;

    public string $password;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = "*******";
    }

    public function update()
    {
        $this->validate();

        $this->user->update([
            'name' => $this->name
        ]);

        session()->flash('success', 'User updated successfully.');
        $this->redirectRoute('list-users');
    }

    public function render()
    {
        return view('livewire.admin.users.edit-user');
    }
}
