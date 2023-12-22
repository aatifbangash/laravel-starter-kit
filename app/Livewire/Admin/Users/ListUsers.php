<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ListUsers extends Component
{
    use WithPagination;

    public string $pageTitle = 'Users';
    public string $pageHandler = 'users';
    public ?int $editId = null;

    #[Rule('required|string')]
    public string $name;

    #[Rule('required|email|unique:users,email')]
    public string $email;

    #[Rule('required')]
    public string $password;

    #[Rule('required')]
    public string $role = "";

    public function upsert()
    {
        if ($this->editId) {
            $validationRules = [
                'name' => "required|string",
                'email' => "required|email|unique:users,email,$this->editId"
            ];
            $this->validate($validationRules);

            $user = User::findOrFail($this->editId);
            $user->update([
                'name' => $this->name,
                'email' => $this->email
            ]);
            $user->syncRoles([$this->role]); //reset roles

        } else {
            $this->validate();
            $newUser = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password)
            ]);

            if (!empty($this->role))
                $newUser->assignRole($this->role);

        }
        session()->flash("success", sprintf(
                "New user %s successfully.",
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

    public function edit(User $user)
    {
        $this->authorize("update $this->pageHandler");
        $this->resetModal();
        $this->editId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = "********";
        $this->role = $user->getRoleNames()->first() ?? "";
        $this->dispatch('openModal');
    }

    public function delete(User $user)
    {
        $this->authorize("delete $this->pageHandler");
        $user->delete();
        session()->flash('success', 'User deleted successfully.');
    }

    public function resetModal()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.admin.users.list-users', [
            'roles' => Role::all(),
            'users' => User::with('roles:name')->orderByDesc('id')->paginate(15)
        ])
            ->title("List Users - ");
    }
}
