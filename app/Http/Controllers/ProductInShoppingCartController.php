<?php

namespace App\Http\Controllers;

use App\Models\ProductInShoppingCart;
use Illuminate\Http\Request;

class ProductInShoppingCartController extends Controller
{

    public function __construct()
    {
        $this->middleware('shopping_cart');
    }

    public function store(Request $request){
        $in_shopping_cart = ProductInShoppingCart::create([
            'shopping_cart_id' => $request->shopping_cart->id,
            'product_id' => $request->product_id,
        ]);

        if($in_shopping_cart){
            redirect()->back();
        }

        return redirect()->back()->withErrors(['product' => 'No se pudo agregar el producto']);
    }

    public function destroy($id){

    }
}
