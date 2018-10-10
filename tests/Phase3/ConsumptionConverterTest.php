<?php


namespace Tests\Phase3;


use App\Phase3\ConsumptionConverter;
use PHPUnit\Framework\TestCase;

class ConsumptionConverterTest extends TestCase
{
    /**
     * @dataProvider provideMpgToLitersPer100Km
     * @param int $mpg
     * @param float $expected
     */
    public function testMpgToLitersPer100Km(int $mpg, float $expected) {
        $converter = new ConsumptionConverter();

        self::assertEquals($expected, $converter->mpgToLitersPer100Km($mpg));
    }

    public function provideMpgToLitersPer100Km() {
        return [
            [21, 11.2],
            [100, 2.35],
            [1, 235.21],
            // [0, 0]
        ];
    }
}
