<?php

class Casino
{
    public function __construct($age = 0)
    {
        // Are you 21 or over?
        if ($age < 21)
        {
            throw new Exception('Sorry you must be older than 21.');
        }
    }

    /**
     * @return array
     */
    public function pullSlotHandle()
    {
        return [
            mt_rand(1, 4),
            mt_rand(1, 4),
            mt_rand(1, 4),
        ];
    }

    /**
     * @param $pull array
     * @return bool
     */
    public function didSlotPullWin($pull)
    {
        if ($pull[0] === $pull[1] &&
            $pull[1] === $pull[2] &&
            $pull[0] === $pull[2])
        {
            return true;
        }

        return false;
    }

    /**
     * @return int
     */
    public function spinRouletteWheel()
    {
        return mt_rand(1,99);
    }

    /**
     * @param $spin int
     * @return bool
     */
    public function didRouletteWin($spin)
    {
        if (mt_rand(1, 99) === $spin)
        {
            return true;
        }

        return false;
    }

    public function drawBlackJackCard()
    {
        return mt_rand(1, 11);
    }

    public function dealBlackJackHand()
    {
        $card_one = $this->drawBlackJackCard();
        $card_two = $this->drawBlackJackCard();

        return [$card_one, $card_two];
    }

    /**
     * @param $hand array
     * @return bool
     */
    public function didBlackJackHandWin($hand)
    {
        $hand_value = array_sum($hand);

        if ($hand_value > 21) {
            // is either card 11?
            if ($hand[0] === 11) {
                $hand[1] = 1;
            }

            // is either card 11?
            if ($hand[1] === 11) {
                $hand[1] = 1;
            }

            return $this->didBlackJackHandWin($hand);
        }

        if ($hand_value <= 21 && $hand_value > 17) {
            return true;
        }

        return false;
    }
}