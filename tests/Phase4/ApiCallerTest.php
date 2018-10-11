<?php

namespace Tests\Phase4;

use App\Phase4\ApiCaller;
use PHPUnit\Framework\TestCase;

class ApiCallerTest extends TestCase
{
    /** @var ApiCaller */
    private $apiCaller;

    /** @var ApiCaller */
    private $apiCallerWrongHost;

    public function setUp(): void
    {
        $this->apiCaller = new ApiCaller('http://private-0dc60-driveto1.apiary-mock.com');
        $this->apiCallerWrongHost = new ApiCaller('http://this-does-not-exist');
    }

    public function testCallEndpoint(): void
    {
        $actualResponse = $this->apiCaller->callEndpoint('/pricelist');

        self::assertEquals(
            file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_expectedResponse.json'),
            $actualResponse
        );
    }

    public function testCallEndpointWillFailWithWrongEndpoint(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Unable to get data from /does-not-exists');

        $this->apiCaller->callEndpoint('/does-not-exists');
    }

    public function testCallEndpointWillFailWithWrongHost(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Unable to get data from /anything');

        $this->apiCallerWrongHost->callEndpoint('/anything');
    }
}