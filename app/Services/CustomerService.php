<?php

namespace App\Services;

use App\Models\Customer;

class CustomerService
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
    return Customer::with('media')->get();
  }

  public function store(array $data)
  {
    $customer = Customer::create([
      'phone' => $data['phone'],
      'password' => $data['password'],
    ]);
    $customer->user()->create([
      'name' => $data['name'],
      'date_of_birth' => $data['date_of_birth'],
    ]);




    $customer->addMedia($data['photo'])->toMediaCollection('photos');

    return $customer;
  }

  public function update(Customer $customer, array $data)
  {
    $customer->update([
      'phone' => $data['phone'],
      'password' => $data['password'],
    ]);

      $customer->user()->create([
      'name' => $data['name'],
      'date_of_birth' => $data['date_of_birth'],
    ]);

    $customer->clearMediaCollection('photos');
    $customer->addMedia($data['photo'])->toMediaCollection('photos');

    return $customer;
  }

  public function delete(Customer $customer)
  {
    $customer->clearMediaCollection('photos');
    $customer->delete();
  }
}
