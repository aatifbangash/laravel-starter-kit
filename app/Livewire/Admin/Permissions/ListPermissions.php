<?php

namespace App\Livewire\Admin\Permissions;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class ListPermissions extends Component
{
    use WithPagination;

    public function delete(Permission $permission)
    {
        $permission->delete();

        session()->flash('success', 'Permission deleted successfully.');
    }

    public function render()
    {
        return view('livewire.admin.permissions.list-permissions', [
            'permissions' => Permission::oldest('name')->paginate(15)
        ]);
    }
}
