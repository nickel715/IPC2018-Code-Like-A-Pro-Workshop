<?php declare(strict_types=1);
namespace BusFlix;

use PHPUnit\Framework\TestCase;

class BoardingTest extends TestCase
{
    public function testBoardOneBus(): void
    {
        $boarding = new Boarding();
        $boarding->addBus($bus = new Bus());
        $boarding->board(new Passenger());
        $this->assertFalse($bus->isEmpty());
    }
    public function testBoardMultipleBuses(): void
    {
        $boarding = new Boarding();
        $boarding->addBus($bus1 = new Bus());
        $boarding->addBus($bus2 = new Bus());
        $boarding->board(new Passenger());
        $boarding->board(new Passenger());
        $boarding->board(new Passenger());
        $this->assertTrue($bus1->isFull());
        $this->assertFalse($bus2->isEmpty());
    }
}
