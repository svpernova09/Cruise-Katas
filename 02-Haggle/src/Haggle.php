<?php

class Haggle
{
    /**
     * Get a price and offer 10% of that price
     * @return bool
     */
    public function doHaggle()
    {
        $price = $this->getPrice();
        $offer = $price - (($price/100) * 10);

        return $this->counterOffer($price, $offer);
    }

    /**
     * @param int $min
     * @param int $max
     * @return float
     */
    public function getPrice($min = 0, $max = 100)
    {
        return round(
            ($min + ($max - $min) * (mt_rand() / mt_getrandmax())),
            2
        );
    }

    /**
     * Returns True if the discount % is <= 30
     * @param $offer
     * @param $price
     * @return bool
     */
    public function counterOffer($offer, $price)
    {
        $percent = $this->findPercent($offer, $price);
        $discount = 100 - $percent;

        if ($discount <= 30)
        {
            return true;
        }

        return false;
    }

    /**
     * @param $x
     * @param $y
     * @return string
     */
    public function findPercent($x, $y)
    {
        $percent = $x / $y;
        $percentage = $percent * 100;

        return number_format($percentage, 2);
    }
}