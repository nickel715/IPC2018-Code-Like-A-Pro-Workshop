<?php declare(strict_types = 1);
namespace BusFlix;

class Bus {

    /** @var int  */
    private $capacity;

    /** @var bool  */
    private $empty = true;

    public function __construct($capacity = 2)
    {
        $this->capacity = $capacity;
    }

    public function isEmpty(): bool {
        return $this->empty;
    }

    public function board(Passenger $passenger) {
        if ($this->isFull()) {
            throw new BusFullException();
        }
        $this->empty = false;
        $this->capacity--;
    }

    public function isFull(): bool {
        return $this->capacity <= 0;
    }
}
