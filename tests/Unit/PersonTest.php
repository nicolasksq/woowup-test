<?php

namespace Tests\Unit;

use App\Http\Controllers\Task1\Ledder;
use App\Http\Controllers\Task1\Person;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testClimbingLedderTest()
    {
        //$expected value as a key and ledder to test as a value
        $ledderToTest = [
            5 => new Ledder(6),
            3 => new Ledder(10),
            2 => new Ledder(1000),
        ];

        $this->assertTrue(true);

        foreach ($ledderToTest as $expectedValue => $ledder) {
            $person = new Person(
                $ledder
            );

            $givenWays = $person->climb($ledder->getSteps());

            $this->assertEquals($expectedValue, $givenWays);
        }


    }
}
