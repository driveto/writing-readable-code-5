<?php

namespace App\Phase4;

class FuelPricelistFetcher
{
    private $apiCaller;

    public function __construct(ApiCaller $apiCaller)
    {
        $this->apiCaller = $apiCaller;
    }

    /**
     * @return mixed[]
     */
    public function fetchPriceLists(): array
    {
        $rawResponse = $this->apiCaller->callEndpoint('/pricelist');
        $fuelPricelistJson = json_decode($rawResponse, true);
        if ($fuelPricelistJson !== false) {
            return $fuelPricelistJson;
        }

        throw new \InvalidArgumentException('Unable decode
        $actualFuelPrice = $this->fuelPricelistFetcher->getGasolineP json from response: ' . $rawResponse);
    }

    /**
     * @param mixed[] $fuelPricelist
     * @return FuelPrice
     */
    public function getGasolinePriceFromPriceList(array $fuelPricelist): FuelPrice
    {
        return new FuelPrice(
            $fuelPricelist['gasoline']['name'],
            $fuelPricelist['gasoline']['price'],
            $fuelPricelist['gasoline']['currency']
        );
    }
}