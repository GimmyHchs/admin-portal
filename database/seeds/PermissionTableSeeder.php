<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'ManagePermission',
            'description' => '是否能夠管理權限',
        ]);
        Permission::create([
            'name' => 'VisitAdminPortal',
            'description' => '是否能夠進入後台',
        ]);
    }
}
