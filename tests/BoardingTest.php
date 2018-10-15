<?php declare(strict_types=1);
namespace BusFlix;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * @uses \BusFlix\Bus
 * @covers \BusFlix\Boarding
 * @covers \BusFlix\BoardingResult
 * @covers \BusFlix\PassengerQueue
 */
class BoardingTest extends TestCase
{
    public function testBoardPassenger(): void
    {
        $bus = new Bus();
        $boarding = new Boarding();
        $passengerQueue = new PassengerQueue();
        $passengerQueue->addPassenger(new Passenger());

        $boardingResult = $boarding->board($bus, $passengerQueue);

        $this->assertFalse($bus->isEmpty());
        $this->assertFalse($boardingResult->hasRemainingPassengers());
    }

    public function testRefuseBoardingToPassenger(): void
    {
        $bus = new Bus(0);

        /** @var Passenger|MockObject $passenger */
        $passenger = $this->createMock(Passenger::class);
        $passenger->expects($this->once())
            ->method('bookingRefused')
            ->with($this->isInstanceOf(BoardingRefuseReceipt::class));

        $boarding = new Boarding();
        $passengerQueue = new PassengerQueue();
        $passengerQueue->addPassenger($passenger);

        $boardingResult = $boarding->board($bus, $passengerQueue);

        $this->assertTrue($boardingResult->hasRemainingPassengers());
    }
}
