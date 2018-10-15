<?php

declare(strict_types=1);
namespace BusFlix;

class Boarding
{
    public function board(Bus $bus, PassengerQueue $passengerQueue): BoardingResult
    {
        $hasRemainingPassengers = false;
        foreach ($passengerQueue as $passenger) {
            if (!$bus->isFull()) {
                $bus->board($passenger);
            } else {
                $hasRemainingPassengers = true;
                $passenger->bookingRefused(new BoardingRefuseReceipt());
            }
        }
        return new BoardingResult($hasRemainingPassengers);
    }
}
