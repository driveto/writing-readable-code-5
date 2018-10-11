<?php

use App\Database;

error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

if(array_key_exists('submit', $_GET)) {
    $carId = (int)$_GET['car'];
    $distance = (int)$_GET['distance'];

    $database = new Database(
        '127.0.0.1',
        'root',
        'root',
        'pehapkari'
    );

    $database->connect();

    $calculator = new App\Phase4\Calculator(
        new \App\Phase4\CarRepository($database),
        new \App\Phase4\ConsumptionConverter(),
        new \App\Phase4\FuelPricelistFetcher(
            new \App\Phase4\ApiCaller('http://private-0dc60-driveto1.apiary-mock.com')
        )
    );
    $costForTrip = $calculator->calculateCostForTrip($carId, $distance);

    echo 'Cena za palivo: ' . number_format($costForTrip, 2) . ' Kč';
}