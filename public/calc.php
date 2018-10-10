<?php
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

if(array_key_exists('submit', $_GET)) {
    $carId = (int)$_GET['car'];
    $distance = (int)$_GET['distance'];

    $calculator = new App\Phase1\Calculator();
    $costForTrip = $calculator->calculateCostForTrip($carId, $distance);

    echo "Cena za palivo: " . number_format($costForTrip, 2) . " Kč";
}