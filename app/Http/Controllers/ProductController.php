<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
      public function __construct(protected ProductService $productService) {}

    public function index()
    {
        $products = $this->productService->index();

        // return response()->json([
        //     'message' => 'products list',
        //     'data' => $products
        // ]);
        return view('products.index', compact('products'));


    }

    public function create()
    {
        return view('products.create');
    }


    public function store(StoreProductRequest $request)
    {
        $product = $this->productService->store($request->validated());

        // return response()->json([
        //     'message' => 'product created',
        //     'data' => $product
        // ]);
         return redirect()->route('products.index')->with('success', 'Product created');
    }

     public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }
    public function update(StoreProductRequest $request, Product $product)
    {
        $product = $this->productService->update($product, $request->validated());

        // return response()->json([
        //     'message' => 'product updated',
        //     'data' => $product
        // ]);
        return redirect()->route('products.index')->with('success', 'Product updated');
    }

    public function destroy(Product $product)
    {
        $this->productService->delete($product);

        // return response()->json([
        //     'message' => 'product deleted'
        // ]);
          return redirect()->route('products.index')->with('success', 'Product deleted');
    }
}
