<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        $products = Product::active()->get();
        $sales = Sale::all();

        return view('index', [
            'products'  => count($products),
            'sales'     => count($sales)
        ]);
    }
}
