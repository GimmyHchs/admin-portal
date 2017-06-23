<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name' => 'Admin',
            'description' => '預設擁有全部權限',
        ]);

        foreach (Permission::all() as $permission) {
            $role->permissions()->save($permission);
        }
    }
}
