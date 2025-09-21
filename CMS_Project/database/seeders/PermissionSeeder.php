<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         {
            // Permission::create(['name' => 'create articles']);
            // Permission::create(['name' => 'edit articles']);
            // Permission::create(['name' => 'delete articles']);

            // Permission::create(['name' => 'create role']);
            // Permission::create(['name' => 'edit role']);
            // Permission::create(['name' => 'delete role']);

            // Permission::create(['name' => 'create user']);
            // Permission::create(['name' => 'edit user']);
            // Permission::create(['name' => 'delete user']);

            // $adminRole =Role ::create(['name' => 'admin']);
            // $adminRole->givePermissionTo('create articles');
            // $adminRole->givePermissionTo('edit articles');
            // $adminRole->givePermissionTo('create role');
            // $adminRole->givePermissionTo('edit role');
            // $adminRole->givePermissionTo('delete role');

            // $autherRole =Role::create(['name' => 'auther']);
            // $autherRole->givePermissionTo('create articles');
            // $autherRole->givePermissionTo('edit articles');
            // $autherRole->givePermissionTo('delete articles');

            // $editerRole =Role::create(['name' => 'editor']);
            // $editerRole->givePermissionTo('edit articles');



            // $user2 = User::find(2);
            // $user2->assignRole('admin');

            $user3 = User::find(3);
            $user3->assignRole('auther');

        }
    }
}
