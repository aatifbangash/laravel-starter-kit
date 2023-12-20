<?php

namespace App\Livewire\Admin\Roles;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class ListRoles extends Component
{
    use WithPagination;

    public function delete(Role $role)
    {
        $role->delete();

        session()->flash('success', 'User deleted successfully.');
    }

    public function render()
    {
        return view('livewire.admin.roles.list-roles', [
            'roles' => Role::oldest('name')->paginate(15)
        ]);
    }
}
