<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Product $product, Cart $cart)
    {
        $products = $product::paginate(12);

        return view('index', [
            'products' => $products,
            'cart' => $cart
        ]);
    }
}
