<?php

namespace App\Livewire\Admin\Permissions;

use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class ListPermissions extends Component
{
    use WithPagination;

    private string $pageHandler = 'permissions';

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
        $this->authorize("create $this->pageHandler");
        $this->resetModal();
        $this->dispatch('openModal');
    }

    public function edit(Permission $permission)
    {
        $this->authorize("update $this->pageHandler");
        $this->resetModal();
        $this->editId = $permission->id;
        $this->name = $permission->name;
        $this->dispatch('openModal');
    }

    public function delete(Permission $permission)
    {
        $this->authorize("delete $this->pageHandler");
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
        $this->authorize("read $this->pageHandler");

        return view('livewire.admin.permissions.list-permissions', [
            'title' => 'Permissions',
            'pageHandler' => $this->pageHandler,
            'permissions' => Permission::oldest('name')->paginate(15)
        ]);
    }
}
