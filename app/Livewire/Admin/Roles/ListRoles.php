<?php

namespace App\Livewire\Admin\Roles;

use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class ListRoles extends Component
{
    use WithPagination;

    public string $pageTitle = 'Roles';
    public string $pageHandler = 'roles';
    public ?int $editId = null;

    #[Rule(['required', 'string', 'unique:roles,name'])]
    public string $name;

    public function upsert()
    {
        $this->validate();

        if ($this->editId) {
            Role::findById($this->editId)->update([
                'name' => $this->name
            ]);
        } else {
            Role::create([
                'name' => $this->name
            ]);
        }
        session()->flash("success", sprintf(
                "New role %s successfully.",
                $this->editId ? 'updated' : 'added'
            )
        );
        $this->dispatch('closeModal');
    }

    public function add()
    {
        $this->authorize("create $this->pageHandler");
        $this->resetModal();
        $this->dispatch('openModal');
    }

    public function edit(Role $role)
    {
        $this->authorize("update $this->pageHandler");
        $this->resetModal();
        $this->editId = $role->id;
        $this->name = $role->name;
        $this->dispatch('openModal');
    }

    public function delete(Role $role)
    {
        $this->authorize("delete $this->pageHandler");
        $role->delete();
        session()->flash('success', 'Role deleted successfully.');
    }

    public function resetModal()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.admin.roles.list-roles', [
            'roles' => Role::oldest('name')->paginate(15)
        ]);
    }
}
