<?php


use PHPUnit\Framework\TestCase;

class JsonReaderTest extends TestCase
{

    public function testReader(){
        $test = new \App\Http\Controllers\Task2\JsonReaderPurchases('purchases.json');


    }

}
