<?php


namespace App\Phase3;


class FuelPricelistFetcher
{
    public function getGasolinePrice(): FuelPrice
    {
        $fuelPricelist = file_get_contents("http://private-0dc60-driveto1.apiary-mock.com/pricelist");
        $fuelPricelistJson = json_decode($fuelPricelist, true);

        return new FuelPrice(
            $fuelPricelistJson['gasoline']['name'],
            $fuelPricelistJson['gasoline']['price'],
            $fuelPricelistJson['gasoline']['currency']
        );
    }
}