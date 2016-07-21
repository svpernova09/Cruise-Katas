<?php

class CasinoTest extends PHPUnit_Framework_TestCase
{
    protected $casino;

    public function setUp()
    {
        parent::setUp();

        $age = 21;

        $this->casino = new Casino($age);
    }

    public function testPullSlotHandle()
    {
        $pull = $this->casino->pullSlotHandle();

        $this->assertTrue(count($pull) === 3);
        $this->assertInternalType("int", $pull[0]);
        $this->assertInternalType("int", $pull[1]);
        $this->assertInternalType("int", $pull[2]);
    }

    public function testDidSlotPullWin()
    {
        $this->assertTrue(
            $this->casino->didSlotPullWin([7, 7, 7])
        );

        $this->assertFalse(
            $this->casino->didSlotPullWin([3, 3, 7])
        );
    }

    public function testSpinRoulette()
    {
        $spin = $this->casino->spinRouletteWheel();
        $this->assertInternalType("int", $spin);
        $this->assertTrue($spin < 100);
        $this->assertTrue($spin > 0);
    }

    public function testDrawBlackJackCard()
    {
        $card = $this->casino->drawBlackJackCard();

        // Card must be 1 through 11
        $this->assertTrue($card <= 11);
    }

    public function testDealBlackJackHand()
    {
        $hand = $this->casino->dealBlackJackHand();

        $this->assertTrue(count($hand) === 2);
        $this->assertInternalType("int", $hand[0]);
        $this->assertInternalType("int", $hand[1]);
    }

    public function testdidBlackJackHandWin()
    {
        $this->assertTrue(
            $this->casino->didBlackJackHandWin(
                [10, 9]
            )
        );

        $this->assertTrue(
            $this->casino->didBlackJackHandWin(
                [10, 10]
            )
        );

        $this->assertTrue(
            $this->casino->didBlackJackHandWin(
                [10, 11]
            )
        );

        $this->assertFalse(
            $this->casino->didBlackJackHandWin(
                [11, 12]
            )
        );
    }
}
