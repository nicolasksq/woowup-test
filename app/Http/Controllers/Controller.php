<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Task2\JsonReaderPurchases;


class Controller
{

    public function main() {
        $test = new JsonReaderPurchases('purchases.json');

        var_dump($test);
    }
}
