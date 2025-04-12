<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::active()->paginate(5);
        return view('produtos', compact('products'));
    }

    public function create() {
        return view('form-produto');
    }
}
