<?php
namespace App\Http\Controllers\Task2;


class Customer
{

    public function getProductBoughtMoreThanOne() {
        foreach($this->getPurchases() as $purchase) {
          foreach ($purchase->getProducts() as $index => $product) {
              
          }
        }


    }

    //segun las compras para los items que estan repetidos, deberia poder calcular la fecha de la proxima compra
    public function predictNextPurchase() {

    }

    /**
     * Customer constructor.
     * @param Purchase[] $purchases
     */
    public function __construct(array $purchases)
    {
        $this->purchases = $purchases;
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
    public function setFavoriteProducts(array $favoriteProducts): void
    {
        $this->favoriteProducts = $favoriteProducts;
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
