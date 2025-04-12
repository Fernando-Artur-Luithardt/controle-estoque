<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductTrashController extends Controller
{
    /**
     * Index - Listagem
     * @return \Illuminate\Contracts\View\View
     */
    public function index() {
        $products = Product::active(0)->paginate(10);
        return view('product.trash.index', compact('products'));
    }

    public function update(Product $product, Request $request) {
        $request->validate([
            "active"=> "boolean",
        ]);

        $product->active = $request->active;
        $product->update();
    }
}
