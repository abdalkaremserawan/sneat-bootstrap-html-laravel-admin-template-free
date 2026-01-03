<?php

namespace App\Services;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
  /**
   * Create a new class instance.
   */
  public function __construct()
  {
    //
  }
  public function login(array $data)
  {


    $employee =   Employee::where('email', $data['email'])->first();
    if (Hash::check($data['password'], $employee->password)) {

      Auth::guard('web')->login($employee);
    }
  }
     public function logout()
    {
        Auth::guard('web')->logout();
    }
}
