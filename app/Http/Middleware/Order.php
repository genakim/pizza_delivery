<?php

namespace App\Http\Middleware;

use App\Models\Cart;
use Closure;

class Order
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $cart = new Cart();
        if($cart->totalQuantity === 0){
            return response()->redirectTo('/');
        }
        return $next($request);
    }
}
