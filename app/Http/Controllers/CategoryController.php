<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  // public function index(){
  //  $categories= Category::get();
  //    return view('categories.index',compact('categories'));
  // }

  public function __construct(protected CategoryService $categoryService) {}

  public function index() {
   $categories= $this->categoryService->index();
  //  return response()->json([
  //     'message' => 'categories list',
  //     'data' => $categories
  //  ]);
   return view('categories.index', compact('categories'));

  }
  public function store(StoreCategoryRequest $request)
    {
         $this->categoryService->store($request->validated());

        // return response()->json([
        //     'message' => 'category created',
        //     'data' => $category
        // ]);
                return redirect()->route('categories.index')->with('success', 'Category created');
    }
      public function create()
    {
        return view('categories.create');
    }
       public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(StoreCategoryRequest $request, Category $category)
    {
        $category = $this->categoryService->update($category, $request->validated());

 return redirect()->route('categories.index')->with('success', 'Category updated');

    }

    public function destroy(Category $category)
    {
        $this->categoryService->delete($category);


           return redirect()->route('categories.index')->with('success', 'Category deleted');
    }
}
