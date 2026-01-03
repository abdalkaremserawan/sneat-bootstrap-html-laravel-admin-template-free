<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // public function run(): void
    {
      $role1 = Role::create(['name' => 'employee-management']);
      $role1->givePermissionTo(
        [
          'view employees',
          'create employees',
          'update employees',
          'delete employees'
        ]
      );
      $role2 = Role::create(['name' => 'role-management']);
      $role2->givePermissionTo(
        [
          'view roles',
          'create roles',
          'sync permissions with roles',
          'sync users with roles',
          'update roles',
          'delete roles',
        ]
      );
      $role3 = Role::create(['name' => 'customer-management']);
      $role3->givePermissionTo(
        [
          'view customers',
          'create customers',
          'update customers',
          'delete customers',
        ]
      );
    }
  }
}
