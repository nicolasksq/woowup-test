<?php

//Ejercicio 2: Reaprovisionamiento de productos
//
//Deberás escribir un programa que lea el archivo JSon (adjunto) donde se encuentran las compras de un cliente y calcule la fecha de posible
// recompra de los productos que compró (solo los que compró al menos 2 veces).
//

//
//Este ejercicio nos sirve para evaluar dos cosas: 1. cuán fácil es entender el código que escribas y 2. como diseñás el modelo de objetos.
namespace App\Http\Controllers\Task2;

class JsonReaderPurchases {

    /**
     * @var Customer
     */
    private Customer $customer;

    const CUSTOMER_KEY  = 'customer';
    const PURCHASES_KEY = 'purchases';

    const LOCATION_JSON_FILE = 'app/Http/Controllers/Task2/';


    /**
     * JsonReader constructor.
     */
    public function __construct($jsonFile)
    {

        $data = file_get_contents( self::LOCATION_JSON_FILE . $jsonFile);

        $customer = json_decode($data, true);

        foreach($customer[self::CUSTOMER_KEY][self::PURCHASES_KEY] as $purchase) {
            $purchases[] = new Purchase(
                $purchase[Purchase::NUMBER_KEY],
                new \DateTime($purchase[Purchase::DATE_KEY]),
                $purchase[Purchase::PRODUCTS_KEY]
            );
        }


        $this->customer = new Customer($purchases);

    }

    public function getCustomer() {
        return $this->customer;
    }


}
