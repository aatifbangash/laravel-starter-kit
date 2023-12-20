<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        Create Roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
//
//        Create Permissions
        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'update']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'read']);

//        Give or revoke permission from role
//        $adminRole = Role::findByName('admin');
//        $adminRole->givePermissionTo([
//            'create',
//            'update',
//            'delete',
//            'read'
//        ]);
//        $adminRole->revokePermissionTo('edit');

//        Assign Role or Permission to User
//        $user = User::first();
//        $user->assignRole('admin');
//        $user->removeRole('admin');
//        $user->givePermissionTo('edit');
//        $user->revokePermissionTo('edit');

//        Check permissions
//        route()->middleware('can:create');
//        auth()->user()->can('edit')
//        @can('delete')
//            <a href="/users/1/destroy">Delete</a>
//        @endcan

        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('user'),
            ]
        ];

        \App\Models\User::factory(98)->create();

        foreach ($users as $user) {
            \App\Models\User::factory()->create($user);
        }


    }
}
