<?php

namespace App\Models;

class Cart
{
    public $items = [];
    public $totalQuantity = 0;
    public $totalPrice = 0;
    private $cartId = 'cart';
    public $deliveryCost = 5;
    private $currencyRates = [
        'us' => 1,
        'eu' => 1.2
    ];

    /**
     * Cart constructor.
     */
    public function __construct()
    {
        $oldCart = session($this->cartId);

        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    /**
     * Add or change items in cart
     * @param Product $product
     * @param int $quantity
     * @param bool $quantityAsTotal
     */
    public function add(Product $product, int $quantity = 1, $quantityAsTotal = false) : void
    {
        if (array_key_exists($product->id, $this->items)) {
            $item = $this->items[$product->id];

            $this->totalQuantity -= $item['quantity'];
            $this->totalPrice -= $item['price'];

            if (!$quantityAsTotal) {
                $quantity += $item['quantity'];
            }

            $item['quantity'] = $quantity;
            $item['price'] = $product->price * $quantity;
        } else {
            $item = [
                'quantity' => $quantity,
                'price' => $product->price * $quantity,
                'item' => $product
            ];
        }

        $this->totalPrice += $item['price'];
        $this->totalQuantity += $item['quantity'];
        $this->items[$product->id] = $item;

        $this->save();
    }


    /**
     * Save cart
     */
    public function save(): void
    {
        session()->put($this->cartId, $this);
    }

    /**
     * Clean cart
     */
    public function clean(): void
    {
        session()->forget($this->cartId);
    }

    /**
     * @param $id int product id
     */
    public function deleteItem($id): void
    {
        if (!array_key_exists($id, $this->items)) {
            return;
        }

        $item = $this->items[$id];
        $this->totalQuantity -= $item['quantity'];
        $this->totalPrice -= $item['price'];

        unset($this->items[$id]);

        $this->save();
    }

    /**
     * @param $id int product id
     */
    public function getItem($id)
    {
        return $this->items[$id] ?? null;
    }

    /**
     * @param $price
     * @param string $currency
     * @return float|int
     */
    public function getCurrencyPrice($price, $currency = 'us')
    {
        $rate = $this->currencyRates[$currency];
        return round($rate * $price, 2);
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        $data = [];
        foreach ($this->items as $item){
            $data[] = [
                'id' => $item['item']->id,
                'name' => $item['item']->name,
                'productPrice' => $item['item']->price,
                'img' => $item['item']->preview_img,
                'price' => $item['price'],
                'quantity' => $item['quantity']
            ];
        }
        return $data;
    }
}
