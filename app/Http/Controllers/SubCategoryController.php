<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubCategoryRequest;
use App\Models\SubCategory;
use App\Services\SubCategoryService;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    //
    public function __construct(protected SubCategoryService $subCategoryService) {}

    public function index() {
        $subCategories = $this->subCategoryService->index();
        // return response()->json([
        //     'message' => 'subcategories list',
        //     'data' => $subCategories
        // ]);
            return view('subcategories.index', compact('subCategories'));
    }
       public function create()
    {
        return view('subcategories.create');
    }

    public function store(StoreSubCategoryRequest $request)
    {
        $subCategory = $this->subCategoryService->store($request->validated());

        // return response()->json([
        //     'message' => 'subCategory created',
        //     'data' => $subCategory
        // ]);

        return redirect()->route('subcategories.index')->with('success','SubCategory created');
    }
        public function edit(SubCategory $subCategory)
    {
        return view('subcategories.edit', compact('subCategory'));
    }


    public function update(StoreSubCategoryRequest $request, SubCategory $subCategory)
    {
        $subCategory = $this->subCategoryService->update($subCategory, $request->validated());

        // return response()->json([
        //     'message' => 'subCategory updated',
        //     'data' => $subCategory
        // ]);

        return redirect()->route('subcategories.index')->with('success', 'SubCategory updated');
    }

    public function destroy(SubCategory $subCategory)
    {
        $this->subCategoryService->delete($subCategory);

        // return response()->json([
        //     'message' => 'subCategory deleted'
        // ]);
        return redirect()->route('subcategories.index')->with('success','SubCategory deleted');
    }
}
