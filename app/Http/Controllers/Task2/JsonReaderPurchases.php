<?php

//Ejercicio 2: Reaprovisionamiento de productos
//
//Deberás escribir un programa que lea el archivo JSon (adjunto) donde se encuentran las compras de un cliente y calcule la fecha de posible
// recompra de los productos que compró (solo los que compró al menos 2 veces).
//
//Para obtener la fecha de recompra de un producto: hay que analizar cada cuanto tiempo vuelve a comprar ese producto.
// Luego sumarle ese tiempo a la fecha de última compra del producto. Vas a tener una fecha de recompra por producto.
//
//Este ejercicio nos sirve para evaluar dos cosas: 1. cuán fácil es entender el código que escribas y 2. como diseñás el modelo de objetos.
namespace App\Http\Controllers\Task2;

class JsonReaderPurchases {

    /**
     * @var Customer
     */
    private Customer $customer;

    const CUSTOMER_KEY = 'customer';
    const PURCHASES_KEY = 'purchases';


    /**
     * JsonReader constructor.
     */
    public function __construct($jsonFile)
    {

        $data = file_get_contents('app/Http/Controllers/Task2/' . $jsonFile);

        $customer = json_decode($data, true);

        foreach($customer[self::CUSTOMER_KEY][self::PURCHASES_KEY] as $purchase) {
            $purchases[] = new Purchase(
                $purchase[Purchase::NUMBER_KEY],
                new \DateTime($purchase[Purchase::DATE_KEY]),
                $purchase[Purchase::PRODUCTS_KEY]
            );
        }


        $this->customer = new Customer($purchases);

        $this->customer->getProductBoughtMoreThanOne();

    }


}
