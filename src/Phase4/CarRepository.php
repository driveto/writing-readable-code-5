<?php

namespace App\Phase4;

use App\Database;

class CarRepository
{
    /** @var Database */
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function findCar(int $id): Car {
        $carResult = $this->database->select('SELECT `id`, `name`, `mpg` FROM cars WHERE `id`=?', [$id]);

        return new Car(
            $carResult['id'],
            $carResult['name'],
            $carResult['mpg']
        );
    }
}