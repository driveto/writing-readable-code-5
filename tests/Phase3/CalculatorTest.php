<?php


namespace Tests\Phase3;


use App\Phase3\Calculator;
use App\Phase3\Car;
use App\Phase3\CarRepository;
use App\Phase3\ConsumptionConverter;
use App\Phase3\FuelPrice;
use App\Phase3\FuelPricelistFetcher;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
     public function testCalculateCostForTrip()
    {
        /** @var CarRepository|MockObject $carRepositoryMock */
        $carRepositoryMock = self::createMock(CarRepository::class);
        $carRepositoryMock->method('findCar')
            ->willReturn(new Car(
                1,
                'Testovaci auto',
                25
            ));
        
        /** @var FuelPricelistFetcher|MockObject $fuelPricelistFetcherMock */
        $fuelPricelistFetcherMock = self::createMock(FuelPricelistFetcher::class);
        $fuelPricelistFetcherMock->method('getGasolinePrice')
            ->willReturn(new FuelPrice(
                'Benzin',
                25.5,
                'CZK'
            ));
        
        $calculator = new Calculator(
            $carRepositoryMock,
            new ConsumptionConverter(),
            $fuelPricelistFetcherMock
        );

        self::assertEquals(1919.64, $calculator->calculateCostForTrip(1, 800));
    }
    
    
}