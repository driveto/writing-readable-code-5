<?php


namespace App\Phase1;


use App\Database;

class Calculator
{
    /** @var Database $database */
    private $database;

    const MILE_TO_KM_RATIO = 1.609344;
    const GALLON_TO_LITRE_RATIO = 3.785411784;

    public function __construct()
    {
        $this->database = new Database(
            "127.0.0.1",
            "root",
            "root",
            "pehapkari"
        );

        $this->database->connect();
    }

    public function calculateCostForTrip(int $carId, int $distanceInKm): float {
        $carResult = $this->database->select('SELECT `mpg` FROM cars WHERE `id`=?', [$carId]);
        $literPer100Km = $this->calculateMpgToLitres($carResult);


        $fuelPricelist = file_get_contents("http://private-0dc60-driveto1.apiary-mock.com/pricelist");
        $fuelPricelistJson = json_decode($fuelPricelist, true);
        $costOfGasoline = $fuelPricelistJson['gasoline']['price'];

        $costOfGasolinePerKm = $literPer100Km * $costOfGasoline / 100;

        return $costOfGasolinePerKm * $distanceInKm;
    }

    private function calculateMpgToLitres($carResult): float
    {
        $milesPerGallon = $carResult['mpg'];
        $kmPerGallon = $milesPerGallon * self::MILE_TO_KM_RATIO;
        $kmPerLiter = $kmPerGallon * (1/self::GALLON_TO_LITRE_RATIO);
        $literPerKm = self::GALLON_TO_LITRE_RATIO / ($kmPerLiter * self::GALLON_TO_LITRE_RATIO);

        return $literPerKm * 100;
    }

}