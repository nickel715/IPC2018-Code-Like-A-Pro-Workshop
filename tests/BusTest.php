<?php declare(strict_types = 1);
namespace BusFlix;

use PHPUnit\Framework\TestCase;

/**
 * @covers \BusFlix\Bus
 */
class BusTest extends TestCase {

    public function testBusIsInitiallyEmpty() {
        $bus = new Bus();
        $this->assertTrue($bus->isEmpty());
    }

    public function testBusIsNotEmptyOncePassengerHasBoarded() {
        $bus = new Bus();
        $bus->board(new Passenger());

        $this->assertFalse($bus->isEmpty());
    }

    public function testBusIsFullOnceItReachedCapacity() {
        $bus = new Bus();
        $bus->board(new Passenger());
        $bus->board(new Passenger());

        $this->assertTrue($bus->isFull());
    }

    public function testPassengerCannotBoardFullBus() {
        $bus = new Bus();
        $bus->board(new Passenger());
        $bus->board(new Passenger());

        $this->expectException(BusFullException::class);
        $bus->board(new Passenger());
    }

    public function testBusCapacityIsFlexible(): void
    {
        $bus = new Bus(3);
        $bus->board(new Passenger());
        $bus->board(new Passenger());
        $bus->board(new Passenger());
        $this->assertTrue($bus->isFull());
    }

    public function testBusWithImpossibleCapacity(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Bus(-1);
    }
}
