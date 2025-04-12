<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        $products = Product::active()->get();

        return view('index', ['products'=> count($products)]);
    }
}
