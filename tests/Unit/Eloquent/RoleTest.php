<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Auth\Role;
use App\Auth\Permission;

class RoleTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public function testRelationToPermission()
    {
        $role = factory(Role::class)->create();
        $permission = factory(Permission::class)->create();

        $role->permissions()->save($permission);

        $this->assertEquals($permission->id, $role->permissions->first()->id);
    }

    public function testSoftDelete()
    {
        $role = factory(Role::class)->create();
        $role->delete();

        $target = Role::withTrashed()->first();

        $this->assertTrue($target->trashed());
        $this->assertEquals(0, count(Role::all()));
    }
}
