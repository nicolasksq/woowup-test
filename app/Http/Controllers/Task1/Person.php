<?php

//Ejercicio 1: Subir la escalera
//
//Estás subiendo una escalera que tiene n escalones. En cada paso podés elegir subir 1 escalón o subir 2.
//
//Programar una solución que, dada una escalera de n escalones, encuentre de cuántas formas distintas se puede subir para llegar al final.
//
//Ejemplo:
//
//Para una escalera de 2 escalones, el resultado es 2 porque las posibilidades son:
//
//Subir 1 escalón + subir 1 escalón
//Subir 2 escalones
//Para una escalera de 3 escalones, el resultado es 3, porque las posibilidades son:
//
//Subir 1 escalón + subir 1 escalón + subir 1 escalón
//Subir 1 escalón + subir 2 escalones
//Subir 2 escalones + subir 1 escalón
namespace App\Http\Controllers\Task1;

class Person
{

    private $givenSteps = [];

    /**
     * Person constructor.
     * @param Ledder $ledder
     */
    public function __construct(Ledder $ledder)
    {
        $this->ledder = $ledder;
    }

/**
 * @link http://www.matetam.com/sites/default/files/e4_combinacionesypermutaciones_1.pdf
 * Llamemosle en a la cantidad de formas que tiene Marquitos
    de llegar al escalon n. Por ejemplo, e1 = 1 ya que tiene una sola forma de
    subir el primer escal´on y e2 = 2 pues para llegar al segundo escal´on lo puede
    hacer con un salto doble o con dos saltos de a uno. Ahora, dividiremos a en en
    dos partes: ¿de cuantas maneras puede llegar al escal´on n dado que su ´ultimo
    paso es un salto de uno? y ¿de cu´antas maneras puede llegar al escal´on n dado
    que su ultimo paso es un salto de dos? Claramente la respuesta a la primer
    pregunta es en−1 y la respuesta a la segunda es en−2. Es decir, hemos obtenido
    que en = en−1+en−2. En otras palabras, podemos obtener el valor de un termino
    al saber los dos t´erminos anteriores. Ya hemos calculado e1 y e2. ¿Cuanto vale
    e3? Por lo hecho anteriormente sabemos que: e3 = e1 + e2 = 1 + 2 = 3. Y de
    la misma manera podemos ir determinando los siguientes hasta llegar a e10 que
    es el que nos interesa: e4 = e3 + e2 = 3 + 2 = 5, e5 = e4 + e3 = 5 + 3 = 8, e6 =
    e5 + e4 = 8 + 5 = 13, e7 = e6 + e5 = 13 + 8 = 21, e8 = e7 + e6 = 21 + 13 =
    34, e9 = e8 + e7 = 34 + 21 = 55, e10 = e9 + e8 = 55 + 34 = 89. La sucesion
    infinita de la cual hemos calculado los primeros 10 terminos es conocida como
    la sucesi´n de Fibonacci.
 */
    public function climbRecursive(int $steps)
    {

        if ($steps == 1 || $steps == 2) {
            return $steps;
        }

        $resultOneStep = $this->climbRecursive($steps - 1);
        $resultTwoStep = $this->climbRecursive($steps - 2);

        return $resultTwoStep + $resultOneStep;

    }

    public function climbIterative(int $steps)
    {
        if ($steps == 1 || $steps == 2) {
            return $steps;
        }

        $first  = 0;
        $second = 1;
        $result = 0;

        for ($i = 0; $i <= $steps - 1; $i++) {
            $result = $second + $first;
            $first  = $second;
            $second = $result;
        }

        return $result;
    }

    /**
     * @return Ledder
     */
    public function getLedder(): Ledder
    {
        return $this->ledder;
    }

    /**
     * @param Ledder $ledder
     */
    public function setLedder(Ledder $ledder): void
    {
        $this->ledder = $ledder;
    }

    /**
     * @var Ledder
     */
    private Ledder $ledder;

}
