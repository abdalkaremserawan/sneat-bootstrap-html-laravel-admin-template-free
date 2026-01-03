<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Models\Customer;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
  public function __construct(protected CustomerService $customerService) {}

  public function index()
  {
    $customers = $this->customerService->index();
    return view('customers.index', compact('customers'));
  }

  public function create()
  {
    return view('customers.create');
  }

  public function store(StoreCustomerRequest $request)
  {
    $this->customerService->store($request->validated());

    return redirect()->route('customers.index')->with('success', 'Customer created');
  }

  public function edit(Customer $customer)
  {
    return view('customers.edit', compact('customer'));
  }

  public function update(StoreCustomerRequest $request, Customer $customer)
  {
    $this->customerService->update($customer, $request->validated());

    return redirect()->route('customers.index')->with('success', 'Customer updated');
  }

  public function destroy(Customer $customer)
  {
    $this->customerService->delete($customer);

    return redirect()->route('customers.index')->with('success', 'Customer deleted');
  }
}
