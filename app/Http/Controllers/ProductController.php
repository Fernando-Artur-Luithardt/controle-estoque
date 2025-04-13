<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Index - Listagem
     * @return \Illuminate\Contracts\View\View
     */
    public function index() {
        $products = Product::with('sales')->active()->paginate(10);
        return view('product.index', compact('products'));
    }

    /**
     * Index - Listagem
     * @return \Illuminate\Contracts\View\View
     */
    public function get(Product $product) {
        return response()->json($product);
    }

    /**
     * Edita - Página de Edição
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     */
    public function edit(Request $request, Product $product) {
        return view('product.form', compact('product'));
    }

    /**
     * Create Prodct
     * @param \Illuminate\Http\Request $request
     */
    public function create(Request $request) {
        $this->validateRequest($request);
        $product = Product::create($request->all());
        return redirect()->route('product.edit', $product->id)->with('success', 'Product created successfully.');
    }
    
    /**
     * Update Product
     * @param \Illuminate\Http\Request $request
     * @param mixed $id
     */
    public function update(Request $request, $id) {
        $this->validateRequest($request);
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('products.index');
    }    

    /**
     * Valida Post Produto
     * @param \Illuminate\Http\Request $request
     */
    private function validateRequest(Request $request)
    {
        $request->validate([
            'description'       => 'required|string|max:200',
            'price'             => 'required|numeric|between:0,99999999.99',
            'inventory_level'   => 'required|integer|min:0',
            'barcode'           => 'required|string|max:200',
            'active'            => 'nullable|boolean',
        ]);        
    }
}
