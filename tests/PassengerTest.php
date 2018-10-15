<?php

declare(strict_types=1);
namespace BusFlix;

use PHPUnit\Framework\TestCase;

/**
 * @covers \BusFlix\Passenger
 */
class PassengerTest extends TestCase
{
    public function testPassengerIsHappyByDefault(): void
    {
        $this->assertFalse((new Passenger())->isSad());
    }

    public function testPassengerIsSadAfterRefusedBoarding(): void
    {
        $passenger = new Passenger();
        $passenger->bookingRefused(new BoardingRefuseReceipt());
        $this->assertTrue($passenger->isSad());
    }
}
