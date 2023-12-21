<?php

namespace App\Livewire\Admin\Pages;

use App\Models\Page;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class ListPages extends Component
{
    use WithPagination;

    #[Rule(['string', 'required', 'unique:pages,name'])]
    public string $name;

    #[Rule(['string', 'required', 'unique:pages,handle'])]
    public string $handle;

    public ?int $editId = null;

    public function upsert()
    {
        if ($this->editId) {
            $validationRules = [
                'name' => "unique:pages,name,$this->editId",
                'handle' => "unique:pages,handle,$this->editId"
            ];
            $this->validate($validationRules);
            $page = Page::find($this->editId);
            $this->revokePermissionForPage($page->handle);
            $page->update([
                'name' => $this->name,
                'handle' => $this->handle,
            ]);
            $this->createPermissionForPage($this->handle);
        } else {
            $this->validate();
            Page::create([
                'name' => $this->name,
                'handle' => $this->handle
            ]);
            $this->createPermissionForPage($this->handle);
        }
        session()->flash("success", sprintf(
                "New page %s successfully.",
                $this->editId ? 'updated' : 'added'
            )
        );
        $this->dispatch('closeModal');
    }

    public function createPermissionForPage($pageHandle)
    {
        foreach (['read', 'create', 'update', 'delete'] as $permission) {
            Permission::create(['name' => $permission . ' ' . $pageHandle]);
        }
    }

    public function revokePermissionForPage($pageHandle)
    {
        foreach (['read', 'create', 'update', 'delete'] as $permission) {
            Permission::where(['name' => $permission . ' ' . $pageHandle])->delete();
        }
    }

    public function add()
    {
        $this->resetModal();
        $this->dispatch('openModal');
    }

    public function edit(Page $page)
    {
        $this->resetModal();
        $this->editId = $page->id;
        $this->name = $page->name;
        $this->handle = $page->handle;
        $this->dispatch('openModal');
    }

    public function delete(Page $page)
    {
        $page->delete();
        $this->revokePermissionForPage($page->handle);
        session()->flash('success', 'Page deleted successfully.');
    }

    public function resetModal()
    {
        $this->reset(['editId', 'name', 'handle']);
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.admin.pages.list-pages', [
            'pages' => Page::oldest('name')->paginate(15)
        ]);
    }
}
