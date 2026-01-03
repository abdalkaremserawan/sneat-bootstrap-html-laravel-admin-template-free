<?php

namespace App\Services;

use App\Models\Category;


class CategoryService
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
        return Category::get();
    }

    public function store(array $data)
    {
         Category::create([
            'name' =>[
              'en'=>$data['name']['en'],
              'ar'=>$data['name']['ar']
            ],
            'description' => $data['description'],
        ]);
       
    }

    public function update(Category $category,array $data)
    {
        $category->update([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);

        return $category;
    }

    public function delete(Category $category)
    {
        $category->delete();
        return true;
    }
}
