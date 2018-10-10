<?php


namespace App\Phase3;


use App\Phase3\CarRepository;
use App\Phase3\ConsumptionConverter;
use App\Phase3\FuelPricelistFetcher;

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
        $gasolinePrice = $this->fuelPricelist->getGasolinePrice();

        $costOfGasolinePerKm = $litersPer100Km * $gasolinePrice->getPrice() / 100;

        return $costOfGasolinePerKm * $distanceInKm;
    }
}