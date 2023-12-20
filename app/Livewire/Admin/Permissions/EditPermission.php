<?php

namespace App\Livewire\Admin\Permissions;

use Livewire\Attributes\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class EditPermission extends Component
{
    #[Rule(['required', 'string', 'unique:permissions,name'])]
    public string $name;
    public Permission $permission;

    public function mount(Permission $permission)
    {
        $this->name = $permission->name;
        $this->permission = $permission;
    }

    public function update()
    {
        $this->validate();

        $this->permission->update([
            'name' => $this->name,
        ]);

        session()->flash('success', 'Permission updated successfully.');
        $this->redirectRoute('list-permissions');
    }

    public function render()
    {
        return view('livewire.admin.permissions.edit-permission');
    }
}
