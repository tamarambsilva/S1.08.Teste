<?php

require_once __DIR__ . "/SpeedSensor.php";

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class SpeedSensorTest extends TestCase
{

    #[DataProvider('speedProvider')]
    public function testSpeedStatus(int $speed, string $expected): void
    {
        
        $speedSensor = new SpeedSensor($speed);

        
        $this->assertSame($expected, $speedSensor->getSpeedStatus());
    }

    public static function speedProvider(): array
    {
        return ['below 30' => [29, "Very slow"],

           
            'lower limit of adequate speed' => [30, "Adequate speed"],
            'upper limit of adequate speed' => [60, "Adequate speed"],

            'lower limit of slight excess' => [61, "Slight excess"],
            'upper limit of slight excess' => [80, "Slight excess"],

            'lower limit of moderate excess' => [81, "Moderate excess"],
            'upper limit of moderate excess' => [100, "Moderate excess"],

            'above 100' => [101, "Serious excess"],];
    }
}
