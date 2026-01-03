<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminEmployee = Employee::create([
            'email' => 'admin@ecommerce.com',
            // 'password' => 'password',
                'password' => bcrypt('password'), //  تشفير كلمة المرور
            'is_admin' => true,
        ]);
$adminEmployee->user()->create([
   'name' => 'Admin',
            'date_of_birth' => '1990-03-21',
]);
//         User::create([
//             'name' => 'Admin',
//             'date_of_birth' => '1990-03-21',
// 'userable_id'=> $adminEmployee->id,
// 'userable_type'=>Employee::class
//         ]);

        // Assign all admin roles
        $adminEmployee->assignRole([
            'employee-management',
            'role-management',
            'customer-management',
        ]);
    }
}
