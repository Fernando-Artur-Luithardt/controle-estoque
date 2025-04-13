<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Index - Listagem
     * @return \Illuminate\Contracts\View\View
     */
    public function index() {
        $sales = Sale::with('product')->get();
        return view('sale.index', compact('sales'));
    }

    public function create(Request $request) {
        $request->validate([
            'amount'        => 'required|integer|min:0|max:32767',
            'price'         => 'required|numeric|between:0,99999999.99',
            'product_id'    => 'required|integer|exists:products,id',
            'update_price'  => 'sometimes|boolean',
        ]);

        $product = Product::find($request->product_id);

        if($request->amount > $product->inventory_level) {
            return redirect()->back()->withErrors(['amount' => 'A quantidade solicitada excede o estoque disponível.'])->withInput();;
        }

        Sale::create($request->all());

        if($request->update_price) {
            $product->price = $request->price;
        }

        //Atualiza inventory_level do Produto da venda
        $product->inventory_level = $product->inventory_level - $request->amount;
        $product->update();

        return redirect()->back()->with('success','');
    }
}
