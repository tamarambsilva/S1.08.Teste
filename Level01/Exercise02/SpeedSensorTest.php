<?php

require_once __DIR__ . "/SpeedSensor.php";

use PHPUnit\Framework\TestCase;

class SpeedSensorTest extends TestCase {

    public function testVerySlowSpeed(): void {

        $speedSensor = new SpeedSensor(29);

        $this->assertSame("Very slow", $speedSensor->getSpeedStatus());
    }

    public function testAdequateSpeedAtLowerLimit(): void {

        $speedSensor = new SpeedSensor(30);

        $this->assertSame("Adequate speed", $speedSensor->getSpeedStatus());
    }

    public function testAdequateSpeedAtUpperLimit(): void {

        $speedSensor = new SpeedSensor(60);

        $this->assertSame("Adequate speed", $speedSensor->getSpeedStatus());
    }

    public function testSlightExcessAtLowerLimit(): void {

        $speedSensor = new SpeedSensor(61);

        $this->assertSame("Slight excess", $speedSensor->getSpeedStatus());
    }

    public function testSlightExcessAtUpperLimit(): void {

        $speedSensor = new SpeedSensor(80);

        $this->assertSame("Slight excess", $speedSensor->getSpeedStatus());
    }

    public function testModerateExcessAtLowerLimit(): void {

        $speedSensor = new SpeedSensor(81);

        $this->assertSame("Moderate excess", $speedSensor->getSpeedStatus());
    }

    public function testModerateExcessAtUpperLimit(): void {

        $speedSensor = new SpeedSensor(100);

        $this->assertSame("Moderate excess", $speedSensor->getSpeedStatus());
    }

    public function testSeriousExcess(): void {
        
        $speedSensor = new SpeedSensor(101);

        $this->assertSame("Serious excess", $speedSensor->getSpeedStatus());
    }
}