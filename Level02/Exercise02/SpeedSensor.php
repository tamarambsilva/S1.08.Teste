<?php

class SpeedSensor
{
    public function __construct(private int $speed) {}

    public function getSpeedStatus(): string {
        
        if ($this->speed < 30) {
            return "Very slow";

        } elseif ($this->speed <= 60) {
            return "Adequate speed";

        } elseif ($this->speed <= 80) {
            return "Slight excess";

        } elseif ($this->speed <= 100) {
            return "Moderate excess";

        } else {
            return "Serious excess";
        }
    }
}