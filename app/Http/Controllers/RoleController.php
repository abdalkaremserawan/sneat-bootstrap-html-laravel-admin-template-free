<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\SyncRoleRequest;
use App\Models\Employee;
use App\Models\User;
use App\Services\RoleService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
  public function __construct(protected RoleService $roleService) {}

  public function index()
  {
    $roles = $this->roleService->index();

    return view('roles.index', compact('roles'));
  }
  public function create()
  {
    $permissions = Permission::all();
    $users = User::all();
    return view('roles.create', compact('permissions', 'users'));
  }

  public function store(StoreRoleRequest $request)
  {
    $this->roleService->store($request->validated());
    return redirect()->route('roles.index')->with('sucesss', 'role created');
  }
  public function edit(Role $role)

  {
    $permissions = Permission::all();
    $users = User::all();
    return view('roles.edit', compact('role', 'permissions', 'users'));
  }
  public function update(Role $role, StoreRoleRequest $request)
  {
    $this->roleService->update($role, $request->validated());
    return redirect()->route('roles.index')->with('sucesess', 'role updated');
  }
  public function destroy(Role $role)
  {
    $this->roleService->delete($role);
    return redirect()->route('roles.index')->with('sucess', 'role deleted');
  }
  public function syncPermissions(SyncRoleRequest $request, Role $role)
  {
    // return 222;
    // dd(222);
    // تأكد أن $permissions دائمًا مصفوفة حتى لو لم يختار المستخدم أي صلاحية
    $permissions = $request->validated()['permissions'] ?? [];

    $this->roleService->syncPermissions($role, $permissions);

    return redirect()->route('roles.index')->with('success', 'Permissions synced');
  }

  public function syncUserRoles(SyncRoleRequest $request, Employee $employee)
  {
    $roles = $request->validated()['roles'];

    $this->roleService->syncRoles($employee, $roles);

    return redirect()->route('employees.index')->with('success', 'Roles synced successfully');
  }
}
