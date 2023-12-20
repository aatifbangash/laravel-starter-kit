<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class ListUsers extends Component
{
    use WithPagination;

    public function delete(User $user)
    {
        $user->delete();

        session()->flash('success', 'User deleted successfully.');
    }

    public function render()
    {

        return view('livewire.admin.users.list-users', [
            'users' => User::orderByDesc('id')->paginate(15)
        ])
            ->title("List Users - ");
    }
}
