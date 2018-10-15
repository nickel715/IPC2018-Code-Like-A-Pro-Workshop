<?php

declare(strict_types=1);
namespace BusFlix;

class BoardingResult
{
    /**
     * @var bool
     */
    private $hasRemainingPassengers;

    public function __construct(bool $hasRemainingPassengers)
    {
        $this->hasRemainingPassengers = $hasRemainingPassengers;
    }


    public function hasRemainingPassengers(): bool
    {
        return $this->hasRemainingPassengers;
    }
}
