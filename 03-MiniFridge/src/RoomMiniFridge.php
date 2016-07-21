<?php

class RoomMiniFridge
{
    public $cart;

    public function __construct($items = [])
    {
        $this->cart = $items;
    }

    /**
     * @return array
     */
    public function showCart()
    {
        return $this->cart;
    }

    /**
     * @param $item
     * @return mixed
     */
    public function addToCart($item)
    {
        return $this->cart[] = $item;
    }

    /**
     * @return string
     */
    public function getSubTotal()
    {
        $total = '0';
        foreach($this->cart as $item)
        {
            $total = $total + $item['price'];
        }

        return $total;
    }

    /**
     * @return string
     */
    public function getDiscount()
    {
        $discount = '0';
        foreach($this->cart as $item)
        {
            $discount = $discount + $item['discount'];
        }

        return $discount;
    }

    /**
     * @return string
     */
    public function getTotal()
    {
        return $this->getSubtotal() - $this->getDiscount();
    }
}