<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::active()->paginate(10);
        return view('product.index', compact('products'));
    }

    public function edit(Request $request, Product $product) {
        return view('product.form', compact('product'));
    }

    public function create(Request $request) {
        $product = Product::create($request->all());
        return redirect()->route('product.edit', $product->id)->with('success', 'Product created successfully.');
    }
    
    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('products.index');
    }    

    private function validateRequest(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'description'    => 'string',
            'active'         => 'required|boolean',
            'amount'         => 'required|numeric',
            'images.*'       => 'sometimes|file|mimes:jpg,jpeg,png,bmp,webp|max:2048',
            'brandId'        => 'required|numeric',
            'categoryId'     => 'sometimes|numeric',
            'colorPaletteId' => 'nullable|numeric',
        ]);
    }

    private function productData(Request $request)
    {
        return [
            'name'             => $request->name,
            'description'      => $request->description,
            'howToUse'         => $request->howToUse,
            'active'           => $request->active,
            'amount'           => $request->amount,
            'user_id'          => auth()->id(),
            'brand_id'         => $request->brandId,
            'category_id'      => $request->categoryId,
            'color_palette_id' => $request->colorPaletteId
        ];
    }
}
