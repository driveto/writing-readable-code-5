<?php

namespace App\Phase4;

class ConsumptionConverter
{
    const MILE_TO_KM_RATIO = 1.609344;
    const GALLON_TO_LITRE_RATIO = 3.785411784;

    public function mpgToLitersPer100Km(int $mpg): float
    {
        $kmPerGallon = $mpg * self::MILE_TO_KM_RATIO;
        $kmPerLiter = $kmPerGallon * (1/self::GALLON_TO_LITRE_RATIO);
        $literPerKm = self::GALLON_TO_LITRE_RATIO / ($kmPerLiter * self::GALLON_TO_LITRE_RATIO);

        return round($literPerKm * 100, 2);
    }
}