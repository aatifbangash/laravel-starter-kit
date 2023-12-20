<?php

namespace App\Livewire\Admin\Permissions;

use Livewire\Attributes\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class NewPermission extends Component
{
    #[Rule(['string', 'required', 'unique:permissions,name'])]
    public string $name;

    public function save()
    {
        $this->validate();

        Permission::create(['name' => $this->name]);

        session()->flash('success', 'New permission added successfully.');
        $this->redirectRoute('list-permissions');
    }
    public function render()
    {
        return view('livewire.admin.permissions.new-permission');
    }
}
