<?php

namespace Tests\Phase4;

use App\Phase4\ApiCaller;
use App\Phase4\FuelPrice;
use App\Phase4\FuelPricelistFetcher;
use PHPUnit\Framework\TestCase;

class FuelPricelistFetcherTest extends TestCase
{
    /** @var FuelPricelistFetcher */
    private $fuelPricelistFetcher;

    public function setUp(): void
    {
        $this->fuelPricelistFetcher = new FuelPricelistFetcher(new ApiCaller('host'));
    }

    /**
     * @param string[] $fuelPricelist
     * @param FuelPrice $expectedFuelPrice
     * @dataProvider providePriceLists
     */
    public function testMpgToLitersPer100Km(array $fuelPricelist, FuelPrice $expectedFuelPrice): void
    {
        $actualFuelPrice = $this->fuelPricelistFetcher->getGasolinePriceFromPriceList($fuelPricelist);

        self::assertEquals($expectedFuelPrice, $actualFuelPrice);
    }

    /**
     * @return mixed[][]
     */
    public function providePriceLists(): array
    {
        return [
            [
                ['gasoline' => ['name' => 'Natural98', 'price' => 36.34, 'currency' => 'CZK']],
                new FuelPrice('Natural98', 36.34, 'CZK'),
            ],
        ];
    }
}
