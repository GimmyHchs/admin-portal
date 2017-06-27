<?php

use Illuminate\Database\Seeder;
use App\Auth\User;
use App\Auth\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'gimmy',
            'email' => 'gimmy.huang@asiayo.com',
            'password' => bcrypt('123456'),
        ]);

        foreach (Permission::all() as $permission) {
            $user->permissions()->save($permission);
        }

        factory(User::class, 50)->create();
    }
}
