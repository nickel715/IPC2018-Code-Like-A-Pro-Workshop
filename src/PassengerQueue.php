<?php

declare(strict_types=1);
namespace BusFlix;

/**
 * @method Passenger current()
 */
class PassengerQueue extends \ArrayIterator
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addPassenger(Passenger $passenger): void
    {
        $this->append($passenger);
    }
}
