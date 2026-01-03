<?php

namespace App\Services;

use App\Models\Employee;

class EmployeeService
{
  /**
   * Create a new class instance.
   */
  public function __construct()
  {
    //
  }
  public function index()
  {
    return Employee::where('is_admin',false)->get();
  }

  public function store(array $data)
  {
     $employee = Employee::create([
            'email'     => $data['email'],
            'password'  => $data['password'],
            'is_admin'  => $data['is_admin'] ?? false,
        ]);

        $employee->user()->create([
            'name' => $data['name'],
            'date_of_birth' => $data['date_of_birth'],
        ]);

         $employee->syncRoles($data['roles']);

        return $employee;
  }


  public function update(Employee $employee, array $data)
  {
    $employee->update([
      'email' => $data['email'],
      'password' => $data['password'],
      'is_admin' => $data['is_admin'] ?? false,
    ]);

      $employee->user()->update([
            'name' => $data['name'],
            'date_of_birth' => $data['date_of_birth'],
        ]);

    return $employee;
  }


  public function delete(Employee $employee)
  {
    $employee->delete();
    return true;
  }
}
