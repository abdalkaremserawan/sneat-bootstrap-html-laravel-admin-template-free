<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
 $permissions = [

            // Employees
            'view employees',
            'create employees',
            'update employees',
            'delete employees',

            // Roles
            'view roles',
            'create roles',
            'sync permissions with roles',
            'sync users with roles',
            'update roles',
            'delete roles',

            // Customers
            'view customers',
            'create customers',
            'update customers',
            'delete customers',

            // Categories
            'view categories',
            'create categories',
            'update categories',
            'delete categories',

            // Subcategories
            'view subcategories',
            'create subcategories',
            'update subcategories',
            'delete subcategories',

            // Products
            'view products',
            'create products',
            'update products',
            'delete products',

            // Orders
            'view orders',
            'review orders',
            'change order status',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        }
}
