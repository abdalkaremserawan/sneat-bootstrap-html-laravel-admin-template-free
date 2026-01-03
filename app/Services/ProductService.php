<?php

namespace App\Services;

use App\Models\Product;


class ProductService
{
  /**
   * Create a new class instance.
   */
  public function __construct() {}
  public function index()
  {
  return  Product::with('subcategory')->get();
  }

  public function store(array $data)
  {
    Product::create([
      'sub_category_id' => $data['sub_category_id'],
      'name' => $data['name'],
      'description' => $data['description'],
      'price' => $data['price'],
    ]);
  }

  public function update(Product $product, array $data)
  {
    $product->update([
      'sub_category_id' => $data['sub_category_id'],
      'name' => $data['name'],
      'description' => $data['description'],
      'price' => $data['price'],
    ]);

    return $product;
  }

  public function delete(Product $product)
  {
    $product->delete();
    return true;
  }
}
