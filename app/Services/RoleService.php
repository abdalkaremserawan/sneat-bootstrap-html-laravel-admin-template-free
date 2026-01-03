<?php

namespace App\Services;

use App\Models\Employee;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleService
{

  public function __construct()
  {
    //
  }
  public function index()
  {
    return   Role::with('permissions')->paginate(15);

  }
  public function create(){

  }
  public function store(array $data)
  {
    $role=Role::create([
      'name' => $data['name']
    ]);
    $this->syncPermissions($role,$data['permissions']);

  }
  public function update(Role $role, array $data)
  {
    $role->update([
      'name' => $data['name']
    ]);
    return $role;
  }

  public function delete(Role $role)
  {
    $role->delete();
    return true;
  }
  public function syncPermissions(Role $role, array $permissions)
  {
    // dd($role,$permissions);
    // تأكد أنك تعمل على نسخة موجودة في قاعدة البيانات
    $role = Role::find($role->id);

    $role->syncPermissions($permissions);

    return true;
  }
  public function syncRoles(Employee $employee, array $roles): bool
    {

        $employee->syncRoles($roles);

        return true;
}
}
