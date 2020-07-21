<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Product $product)
    {
        $products = $product::paginate(12);

        return view('index', [
            'products' => $products
        ]);
    }
}
