<?php

class StringSum
{
    public function __construct()
    {
        
    }

    /**
     * @param $number_one string
     * @param $number_two string
     * @return int
     */
    public function sum($number_one, $number_two)
    {
        if (!is_numeric($number_one))
        {
            $number_one = '0';
        }

        if (!is_numeric($number_two))
        {
            $number_two = '0';
        }

        return $number_one + $number_two;
    }

    public function sumString($string_one, $string_two)
    {
        $warning = '';

        if (is_numeric($string_one) || is_numeric($string_two))
        {
            $warning = "Did you mean to use sum()?";
        }

        return $string_one . ' ' . $string_two . ' ' . $warning;
    }

    public function sumNumbers(int $number_one, int $number_two)
    {
        return $number_one + $number_two;
    }
}