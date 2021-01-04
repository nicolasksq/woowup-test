<?php
namespace App\Http\Controllers\Task2;


use DateInterval;

class Customer
{

    /**
     * Customer constructor.
     * @param Purchase[] $purchases
     */
    public function __construct(array $purchases)
    {
        $this->purchases = $purchases;

        if(!empty($purchases)) {
            $this->setFavoriteProducts();
        }

    }

    /**
     * Para obtener la fecha de recompra de un producto: hay que analizar cada cuanto tiempo vuelve a comprar ese producto.
     * Luego sumarle ese tiempo a la fecha de última compra del producto. Vas a tener una fecha de recompra por producto.
     *
     * sumatoria de ( date+1 - date ) de 1 a n / (n-1)
     *
     * Prediction based on favorite product.
     *
     */
    public function predictNextPurchase() : array{

        foreach($this->purchases as $purchase) {
            foreach($purchase->getProducts() as $product) {

                if(array_key_exists($product->getSku(), $this->getFavoriteProducts())) {
                    $timeline[$product->getSku()][] = $purchase->getDate();
                }
            }
        }

        foreach ($timeline as $sku => $dates) {
            $diff = 0;
            foreach ($dates as $index => $date) {
                if($index) {
                    $diff += $date->getTimestamp() - $dates[$index-1]->getTimestamp();
                }
            }
            $diff = round(($diff/(count($dates) - 1)) / 60 );
            $lastPurchase = clone end($dates);
            $lastPurchase->modify("+{$diff} minutes");
            $nextPurchase[$sku] = $lastPurchase->format('Y-m-d H:i');

        }

        return $nextPurchase;

    }

    /**
     * @return Purchase[]
     */
    public function getPurchases(): array
    {
        return $this->purchases;
    }

    /**
     * @param Purchase[] $purchases
     */
    public function setPurchases(array $purchases): void
    {
        $this->purchases = $purchases;
    }

    /**
     * @return Product[]
     */
    public function getFavoriteProducts(): array
    {
        return $this->favoriteProducts;
    }

    /**
     * @param Product[] $favoriteProducts
     */
    public function setFavoriteProducts(): void
    {

        $productsRepeated = [];
        foreach($this->getPurchases() as $purchase) {
            $products = $purchase->getProducts();
            array_walk_recursive($products, function($product) use (&$productsRepeated, $purchase){
                $productsRepeated[$product->getSku()] =
                    array_key_exists($product->getSku(), $productsRepeated) ?
                        $final[$product->getSku()] = $product :
                        $final[$product->getSku()] = null;
            });

        }

        $this->favoriteProducts = array_filter($productsRepeated);

    }

    /**
     * @var Purchase[]
     */
    private array $purchases;

    /**
     * @var Product[]
     */
    private array $favoriteProducts;
}
