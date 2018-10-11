<?php

declare(strict_types=1);

namespace App\Phase4;

class ApiCaller
{
    private $apiHost;

    public function __construct(string $apiHost)
    {
        $this->apiHost = $apiHost;
    }

    public function callEndpoint(string $endpointUrl): string
    {
        try {
            $fuelPricelist = file_get_contents($this->apiHost . $endpointUrl);
        } catch (\Throwable $e) {
            throw new \InvalidArgumentException('Unable to get data from ' . $endpointUrl);
        }
        if ($fuelPricelist !== false) {
            return $fuelPricelist;
        }

        throw new \InvalidArgumentException('Unable to get data from ' . $endpointUrl);
    }
}
