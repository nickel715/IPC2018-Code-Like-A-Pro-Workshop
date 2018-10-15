<?php declare(strict_types=1);
namespace BusFlix;

class Passenger
{
    private $isSad = false;

    public function bookingRefused(BoardingRefuseReceipt $boardingRefuseReceipt): void
    {
        $this->isSad = true;
    }

    public function isSad()
    {
        return $this->isSad;
    }
}
