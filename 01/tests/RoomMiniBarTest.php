<?php

class RoomMiniBarTest extends PHPUnit_Framework_TestCase
{
    protected $items;
    protected $mini_bar;

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

        $this->mini_bar = new RoomMiniBar($this->items);
    }

    public function testShowCart()
    {
        $this->assertEquals(
            $this->mini_bar->showCart(),
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

        $mini_bar = new RoomMiniBar($this->items);
        $cart = $mini_bar->addToCart($item);

        $this->assertArraySubset($item, $cart);
    }

    public function testGetSubTotal()
    {
        $this->assertEquals(
            $this->mini_bar->getSubTotal(),
            '17.48'
        );
    }

    public function testGetDiscount()
    {
        $this->assertEquals(
            $this->mini_bar->getDiscount($this->items),
            '1.25'
        );
    }

    public function testGetTotal()
    {
        $this->assertEquals(
            $this->mini_bar->getTotal(),
            '16.23'
        );
    }
}
