<?php

namespace App\Phase4;

class Calculator
{
    /** @var CarRepository */
    private $carRepository;

    /** @var ConsumptionConverter */
    private $consumptionConverter;

    /** @var FuelPricelistFetcher */
    private $fuelPricelist;

    public function __construct(
        CarRepository $carRepository,
        ConsumptionConverter $consumptionConverter,
        FuelPricelistFetcher $fuelPricelistFetcher
    )
    {
        $this->carRepository = $carRepository;
        $this->consumptionConverter = $consumptionConverter;
        $this->fuelPricelist = $fuelPricelistFetcher;
    }

    public function calculateCostForTrip(int $carId, int $distanceInKm): float {
        $car = $this->carRepository->findCar($carId);
        $litersPer100Km = $this->consumptionConverter->mpgToLitersPer100Km($car->getMpg());
        $gasolinePrice = $this->fuelPricelist->getGasolinePriceFromPriceList(
            $this->fuelPricelist->fetchPriceLists()
        );

        $costOfGasolinePerKm = $litersPer100Km * $gasolinePrice->getPrice() / 100;

        return $costOfGasolinePerKm * $distanceInKm;
    }
}