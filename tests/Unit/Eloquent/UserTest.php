<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Permission;

class UserTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public function testRelationToPermission()
    {
        $user = factory(User::class)->create();
        $permission = factory(Permission::class)->create();

        $user->permissions()->save($permission);

        $this->assertEquals($permission->id, $user->permissions->first()->id);
    }

    public function testSoftDelete()
    {
        $user = factory(User::class)->create();
        $user->delete();

        $target = User::withTrashed()->first();

        $this->assertTrue($target->trashed());
        $this->assertEquals(0, count(User::all()));
    }

    public function testHasPermission()
    {
        $user = factory(User::class)->create();
        $permission = factory(Permission::class)->create(['name' => 'manage']);
        $user->permissions()->save($permission);

        $this->assertTrue($user->hasPermission('manage'));
        $this->assertFalse($user->hasPermission('otherpermissions'));
    }
}
