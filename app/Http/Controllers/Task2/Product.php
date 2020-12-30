<?php
/*
 * "sku": "101",
 * "name": "Cat Chow 1KG"
 */
namespace App\Http\Controllers\Task2;

class Product implements \JsonSerializable
{
    const SKU_KEY   = 'sku';
    const NAME_KEY  = 'name';

    /**
     * Purchase constructor.
     * @param string $sku
     * @param string $name
     */
    public function __construct(string $sku, string $name)
    {
        $this->sku = $sku;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     */
    public function setSku(string $sku): void
    {
        $this->sku = $sku;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @var string
     */
    private string $sku;

    /**
     * @var string
     */
    private string $name;

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'sku'  => $this->sku,
            'name' => $this->name
        ];
    }
}
