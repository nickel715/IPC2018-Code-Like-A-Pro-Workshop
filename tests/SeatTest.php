<?php declare(strict_types = 1);
namespace BusFlix;

use PHPUnit\Framework\TestCase;

/**
 * @covers \BusFlix\Seat
 */
class SeatTest extends TestCase {

    public function testSeatIsInitiallyAvailable(): void {
        $seat = new Seat();
        $this->assertTrue($seat->isAvailable());
    }

    public function testAvailableSeatCanBeOccupied(): void {
        $seat = new Seat();
        $seat->occupy();
        $this->assertFalse($seat->isAvailable());
    }

    public function testUnavailableSeatCanNotBeOccupied(): void {
        $seat = new Seat();
        $seat->occupy();

        $this->expectException(FailedException::class);
        $seat->occupy();
    }

}
