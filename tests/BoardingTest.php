<?php declare(strict_types=1);
namespace BusFlix;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class BoardingTest extends TestCase
{
    public function testBoardPassenger(): void
    {
        $boarding = new Boarding($bus = new Bus());
        $boarding->addPassenger(new Passenger());
        $boarding->board();

        $this->assertFalse($bus->isEmpty());
        $this->assertFalse($boarding->hasRemainingPassengers());
    }

    public function testRefuseBoardingToPassenger(): void
    {
        $bus = new Bus(0);

        /** @var Passenger|MockObject $passenger */
        $passenger = $this->createMock(Passenger::class);
        $passenger->expects($this->once())
            ->method('refuseBoarding')
            ->with($this->isInstanceOf(BoardingRefuseReceipt::class));

        $boarding = new Boarding($bus);
        $boarding->addPassenger($passenger);
        $boarding->board();
        $this->assertTrue($boarding->hasRemainingPassengers());
    }
}
