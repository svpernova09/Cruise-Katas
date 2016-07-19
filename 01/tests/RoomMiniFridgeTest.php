<?php

class RoomMiniFridgeTest extends PHPUnit_Framework_TestCase
{
    protected $items;
    protected $fridge;

    public function setUp()
    {
        parent::setUp();

        $this->items = [
            [
                'name' => 'Monster Energy',
                'price' => '5.99',
                'discount' => '0',
            ],
            [
                'name' => 'Corona',
                'price' => '7.99',
                'discount' => '.50',
            ],
            [
                'name' => 'Coca Cola',
                'price' => '3.50',
                'discount' => '.75'
            ],
        ];

        $this->fridge = new RoomMiniFridge($this->items);
    }

    public function testShowCart()
    {
        $this->assertEquals(
            $this->fridge->showCart(),
            $this->items
        );
    }

    public function testAddToCart()
    {
        $item = [
            'name' => 'Red Bull',
            'price' => '6.99',
            'discount' => '.25',
        ];

        $fridge = new RoomMiniFridge($this->items);
        $cart = $fridge->addToCart($item);

        $this->assertArraySubset($item, $cart);
    }

    public function testGetSubTotal()
    {
        $this->assertEquals(
            $this->fridge->getSubTotal(),
            '17.48'
        );
    }

    public function testGetDiscount()
    {
        $this->assertEquals(
            $this->fridge->getDiscount($this->items),
            '1.25'
        );
    }

    public function testGetTotal()
    {
        $this->assertEquals(
            $this->fridge->getTotal(),
            '16.23'
        );
    }
}
