<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Task1\Ledder;
use App\Http\Controllers\Task1\Person;
use App\Http\Controllers\Task2\JsonReaderPurchases;
use PHPUnit\Framework\TestCase;

class ControllerTest extends TestCase
{

    public function testClimbingLedderTest()
    {
        //$expected value as a key and ledder to test as a value
        $ledderToTest = [
            13 => new Ledder(6),
            89 => new Ledder(10),
            20365011074  => new Ledder(50),
        ];

        $this->assertTrue(true);

        foreach ($ledderToTest as $expectedValue => $ledder) {
            $person = new Person(
                $ledder
            );

            $givenWays = $person->climbIterative($ledder->getSteps());

            $this->assertEquals($expectedValue, $givenWays);
        }

    }

    public function testJsonReader()
    {
        var_dump('asd');
        $e = 'asd;';

        $this->assertTrue(true);
    }
}
