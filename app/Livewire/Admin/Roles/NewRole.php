<?php

namespace App\Livewire\Admin\Roles;

use Livewire\Attributes\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class NewRole extends Component
{

    #[Rule(['required', 'string', 'unique:roles,name'])]
    public string $name;

    public function save()
    {
        $this->validate();

        Role::create(['name' => $this->name]);

        session()->flash('success', 'New role added successfully.');
        $this->redirectRoute('list-roles');
    }

    public function delete()
    {

    }

    public function render()
    {
        return view('livewire.admin.roles.new-role');
    }
}
