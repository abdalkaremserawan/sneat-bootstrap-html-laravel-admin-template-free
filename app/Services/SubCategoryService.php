<?php

namespace App\Services;

use App\Models\SubCategory;


class SubCategoryService
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
    return   SubCategory::with('category')->get();
  }

  public function store(array $data)
  {
    SubCategory::create([

      'category_id' => $data['category_id'],
      'name' => $data['name'],
      'description' => $data['description'],

    ]);
  }

  public function update(SubCategory $subCategory, array $data)
  {
    $subCategory->update([
      'category_id' => $data['category_id'],
      'name' => $data['name'],
      'description' => $data['description'],
    ]);

    return $subCategory;
  }

  public function delete(SubCategory $subCategory)
  {
    $subCategory->delete();
    return true;
  }
}
