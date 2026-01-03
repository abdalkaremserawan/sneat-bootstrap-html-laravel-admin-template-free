<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Employee;
use App\Services\EmployeeService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class EmployeeController extends Controller
{
    //
      public function __construct(protected EmployeeService $employeeService) {}

    public function index()
    {
        $employees = $this->employeeService->index();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
      $roles=Role::all();
        return view('employees.create',compact('roles'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        $this->employeeService->store($request->validated());

        return redirect()->route('employees.index')->with('success', 'Employee created');
    }

    public function edit(Employee $employee)
    {
      $roles = Role::all();
        return view('employees.edit', compact('employee','roles'));
    }

    public function update(StoreEmployeeRequest $request, Employee $employee)
    {
        $this->employeeService->update($employee, $request->validated());

        return redirect()->route('employees.index')->with('success', 'Employee updated');
    }

    public function destroy(Employee $employee)
    {
        $this->employeeService->delete($employee);

        return redirect()->route('employees.index')->with('success', 'Employee deleted');
    }

}
