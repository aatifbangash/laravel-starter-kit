<?php

namespace App\Livewire\Admin\Permissions;

use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class ListPermissions extends Component
{
    use WithPagination;

    #[Rule(['string', 'required', 'unique:permissions,name'])]
    public string $name;
    public ?int $editId = null;

    public function upsert()
    {
        $this->validate();

        if ($this->editId)
            Permission::findById($this->editId)->update([
                'name' => $this->name,
            ]);
        else
            Permission::create(['name' => $this->name]);

        session()->flash("success", sprintf(
                "New permission %s successfully.",
                $this->editId ? 'updated' : 'added'
            )
        );
        $this->dispatch('closeModal');
    }

    public function add()
    {
        $this->resetModal();
        $this->dispatch('openModal');
    }

    public function edit(Permission $permission)
    {
        $this->resetModal();
        $this->editId = $permission->id;
        $this->name = $permission->name;
        $this->dispatch('openModal');
    }

    public function delete(Permission $permission)
    {
        $permission->delete();
        session()->flash('success', 'Permission deleted successfully.');
    }

    public function resetModal()
    {
        $this->reset(['editId', 'name']);
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function render()
    {
        return view('livewire.admin.permissions.list-permissions', [
            'permissions' => Permission::oldest('name')->paginate(15)
        ]);
    }
}
