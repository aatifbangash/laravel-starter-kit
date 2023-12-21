<?php

namespace App\Livewire\Admin\Roles;

use App\Models\Page;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class AssignPermissions extends Component
{

    public Role $role;
    public array $permissions = [];

    public function mount(Role $role)
    {
        $this->role = $role;
        if($role->permissions->isNotEmpty()) {
            $role->permissions->each(function($permission){
                $data = explode(" ",$permission->name, 2);
                $this->permissions[$data[1]][$data[0]] = true;
            });
        }
    }

    public function update()
    {

        if (!empty($this->permissions)) {
            $this->role->syncPermissions([]); // revoke all permissions
            foreach ($this->permissions as $page => $permissions) {
                if (!empty($permissions)) {
                    foreach ($permissions as $key => $value) {
                        if ($value == true) {
                            $this->role->givePermissionTo($key . ' ' . $page);
                        }
                    }
                }
            }
            session()->flash("success", "Permissions updated successfully.");
        }
    }

    public function render()
    {
        return view('livewire.admin.roles.assign-permissions', [
            'title' => 'Assign Permissions',
            'pages' => Page::all()
        ]);
    }
}
