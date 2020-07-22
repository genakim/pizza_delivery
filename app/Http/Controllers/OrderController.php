<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Events\OrderConfirmed;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * @param Request $request
     * @param Cart $cart
     * @return Factory|\Illuminate\Http\RedirectResponse|View
     */
    public function index(Request $request, Cart $cart)
    {
        $items = [];
        foreach ($cart->items as $item){
            $items[] = [
                'product' => $item['item']->name,
                'quantity' => $item['quantity'],
                'totalPrice' => $item['price']
            ];
        }

        $totalPrice = $cart->totalPrice + $cart->deliveryCost;

        return view('order', [
            'items' => $items,
            'total' => [
                'priceInUs' => $totalPrice,
                'priceInEu' => $cart->getCurrencyPrice($totalPrice, 'eu'),
                'quantity' => $cart->totalQuantity,
                'deliveryCost' => $cart->deliveryCost
            ]
        ]);
    }

    public function confirm(Cart $cart)
    {
        $cart->clean();
        return response([
            'success' => true,
            'message' => 'Your order confirmed! Pizza is coming to you!'
        ]);
    }
}
