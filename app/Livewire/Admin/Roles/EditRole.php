<?php

namespace App\Livewire\Admin\Roles;

use Livewire\Attributes\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class EditRole extends Component
{
    #[Rule(['required', 'string', 'unique:roles,name'])]
    public string $name;
    public Role $role;

    public function mount(Role $role)
    {
        $this->name = $role->name;
        $this->role = $role;
    }

    public function update()
    {
        $this->validate();
        $this->role->update([
            'name' => $this->name,
        ]);

        session()->flash('success', 'Role updated successfully.');
        $this->redirectRoute('list-roles');
    }

    public function render()
    {
        return view('livewire.admin.roles.edit-role');
    }
}
