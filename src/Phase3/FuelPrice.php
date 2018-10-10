<?php


namespace App\Phase3;


class FuelPrice
{
    /** @var string */
    private $name;

    /** @var float */
    private $price;

    /** @var string */
    private $currency;

    public function __construct(
        string $name,
        float $price,
        string $currency
    )
    {
        $this->name = $name;
        $this->price = $price;
        $this->currency = $currency;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }
}