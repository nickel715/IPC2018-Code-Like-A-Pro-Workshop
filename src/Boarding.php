<?php

declare(strict_types=1);
namespace BusFlix;

class Boarding
{
    /**
     * @var Passenger[]
     */
    private $passengers = [];

    /**
     * @var Bus
     */
    private $bus;

    public function __construct(Bus $bus)
    {
        $this->bus = $bus;
    }

    public function board(): void
    {
        foreach ($this->passengers as $key => $passenger) {
            if (!$this->bus->isFull()) {
                $this->bus->board($passenger);
                unset($this->passengers[$key]);
            } else {
                $passenger->refuseBoarding(new BoardingRefuseReceipt());
            }
        }
    }

    public function addPassenger(Passenger $passenger): void
    {
        $this->passengers[] = $passenger;
    }

    public function hasRemainingPassengers(): bool
    {
        return !empty($this->passengers);
    }
}
