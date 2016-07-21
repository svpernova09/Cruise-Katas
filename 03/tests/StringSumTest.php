<?php

class StringSumTest extends PHPUnit_Framework_TestCase
{
    protected $string_sum;

    public function setUp()
    {
        parent::setUp();

        $this->string_sum = new StringSum();
    }

    public function testSum()
    {
        $this->assertEquals(
            $this->string_sum->sum('4','4'),
            8
        );
        
        $this->assertFalse(
            $this->string_sum->sum('4','3') === 8
        );

        $this->assertEquals(
            $this->string_sum->sum('dog', 4),
            4
        );
    }

    public function testSumString()
    {
        $this->assertEquals(
            $this->string_sum->sumString('dog', 4),
            'dog 4 Did you mean to use sum()?'
        );
    }

    public function testSumNumbers()
    {
        $this->assertEquals(
            $this->string_sum->sumNumbers(46, 2),
            48
        );
    }

    /**
     * @expectedException TypeError
     */
    public function testSumNumbersThrowsError()
    {
        $this->string_sum->sumNumbers('dog', 'cat');
    }
}
