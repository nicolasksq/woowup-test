<?php

/**
 *       {
        "number": "B001-002309",
        "date": "2020-03-01",
        "products": [
        {
        "sku": "101",
        "name": "Cat Chow 1KG"
        },
        {
        "sku": "102",
        "name": "Tidy Cats 2KG"
        }

        ]
        }
 * */
namespace App\Http\Controllers\Task2;


class Purchase
{

    const NUMBER_KEY     = 'number';
    const DATE_KEY       = 'date';
    const PRODUCTS_KEY   = 'products';

    /**
     * Product constructor.
     * @param string $number
     * @param \DateTime $date
     * @param Product[] $products
     */
    public function __construct(string $number, \DateTime $date, array $products)
    {
        $this->number   = $number;
        $this->date     = $date;

        foreach ($products as $product) {
            $this->products[] = new Product(
                $product[Product::SKU_KEY],
                $product[Product::NAME_KEY]
            );
        }
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber(string $number): void
    {
        $this->number = $number;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date): void
    {
        $this->date = $date;
    }

    /**
     * @return Product[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param Product[] $products
     */
    public function setProducts(array $products): void
    {
        $this->products = $products;
    }

    /**
     * @var string
     */

    private string $number;

    /**
     * @var \DateTime
     */
    private \DateTime $date;

    /**
     * @var Product[]
     */
    private array $products;


}
