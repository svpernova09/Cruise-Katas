<?php

class HaggleTest extends PHPUnit_Framework_TestCase
{
    protected $haggle;

    public function setUp()
    {
        parent::setUp();

        $this->haggle = new Haggle();
    }

    public function testGetPrice()
    {
        $price = $this->haggle->getPrice();

        $this->assertTrue(
            $price > 0
        );

        $this->assertTrue(
            $price <= 100
        );

        $this->assertTrue(
            is_float($price)
        );
    }

    public function testFindPercent()
    {
        $this->assertEquals(
            $this->haggle->findPercent(50, 100),
            50
        );

        $this->assertEquals(
            $this->haggle->findPercent(30, 100),
            30
        );
    }

    public function testCounterOffer()
    {
        $this->assertTrue(
            $this->haggle->counterOffer(
                90.00,
                100.00
            )
        );

        $this->assertFalse(
            $this->haggle->counterOffer(
                50.00,
                100.00
            )
        );
    }
    
    public function testHaggle()
    {
        $this->assertTrue(
            $this->haggle->doHaggle()
        );
    }
}
