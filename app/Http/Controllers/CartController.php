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

class CartController extends Controller
{
    /**
     * @param Request $request
     * @param Cart $cart
     * @return Factory|View
     */
    public function index(Request $request, Cart $cart)
    {
        return view('cart', [
            'cart' => $cart,
            'breadcrumbs' => [
                [
                    'text' => 'Menu',
                    'disabled' => false,
                    'href' => '/'
                ],
                [
                    'text' => 'Cart',
                    'disabled' => true,
                    'href' => '/cart'
                ]
            ]
        ]);
    }

    /**
     * Add item to cart
     * @param Product $product
     * @param Request $request
     * @param Cart $cart
     * @return ResponseFactory|Response
     */
    public function addItem(Product $product, Request $request, Cart $cart)
    {
        $cart->add($product, $request->get('quantity'));

        return response([
            'success' => true,
            'data' => [
                'totalQuantity' => $cart->totalQuantity,
                'totalPrice' => $cart->totalPrice
            ]
        ]);
    }

    /**
     * Delete item from cart
     * @param $id int product id
     * @param Cart $cart
     * @return ResponseFactory|Response
     */
    public function deleteItem($id, Cart $cart)
    {
        $cart->deleteItem($id);

        return response([
            'success' => true,
            'data' => [
                'totalQuantity' => $cart->totalQuantity,
                'totalPrice' => $cart->totalPrice
            ]
        ]);
    }

    /**
     * Change item' quantity
     * @param Product $product
     * @param Request $request
     * @param Cart $cart
     * @return ResponseFactory|Response
     */
    public function changeQuantity(Product $product, Request $request, Cart $cart)
    {
        $validatedData = $request->validate([
            'quantity' => 'required|int|min:1'
        ]);

        $cart->add($product, $validatedData['quantity'], true);

        return response([
            'success' => true,
            'data' => [
                'totalQuantity' => $cart->totalQuantity,
                'totalPrice' => $cart->totalPrice,
                'totalItemPrice' => $cart->getItem($product->id)['price']
            ]
        ]);
    }
}
