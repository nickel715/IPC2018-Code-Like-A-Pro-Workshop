<?php

declare(strict_types=1);
namespace BusFlix;

class Boarding
{
    /**
     * @var Bus[]
     */
    private $buses;

    public function addBus(Bus $bus)
    {
        $this->buses[] = $bus;
    }

    public function board(Passenger $passenger)
    {
        foreach ($this->buses as $bus) {
            if (!$bus->isFull()) {
                $bus->board($passenger);
            }
        }
    }
}
