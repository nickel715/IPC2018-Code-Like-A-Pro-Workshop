<?php
// @codingStandardsIgnoreFile
// @codeCoverageIgnoreStart
// this is an autogenerated file - do not edit
spl_autoload_register(
    function($class) {
        static $classes = null;
        if ($classes === null) {
            $classes = array(
                'busflix\\boarding' => '/Boarding.php',
                'busflix\\bus' => '/Bus.php',
                'busflix\\busfullexception' => '/BusFullException.php',
                'busflix\\failedexception' => '/FailedException.php',
                'busflix\\passenger' => '/Passenger.php',
                'busflix\\seat' => '/Seat.php'
            );
        }
        $cn = strtolower($class);
        if (isset($classes[$cn])) {
            require __DIR__ . $classes[$cn];
        }
    },
    true,
    false
);
// @codeCoverageIgnoreEnd
