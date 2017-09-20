<?php
/**
 * Created by PhpStorm.
 * User: mammut
 * Date: 19.09.17
 * Time: 9:30
 */

namespace MammutAlex\GeoRadius;

class Radius
{
    private $lat;
    private $lng;
    private $radius;
    private $latDegreeInKm = 111.1;

    public function __construct(float $lat, float $lng)
    {
        $this->lat = $lat;
        $this->lng = $lng;
    }

    public function getMinMaxGeo(int $radius = 50): array
    {
        $this->addRadius($radius);

        return [
            'lng' => [
                'min' => $this->getMinLng(),
                'max' => $this->getMaxLng(),
            ],
            'lat' => [
                'min' => $this->getMinLat(),
                'max' => $this->getMaxLat(),
            ],
        ];
    }

    private function addRadius(int $radius)
    {
        $this->radius = $radius;
    }

    private function getMinLng(): float
    {
        return ($this->lng - $this->radius / abs(cos(deg2rad($this->lat)) * $this->latDegreeInKm));
    }

    private function getMaxLng(): float
    {
        return ($this->lng + $this->radius / abs(cos(deg2rad($this->lat)) * $this->latDegreeInKm));
    }

    private function getMinLat():float
    {
        return ($this->lat - ($this->radius / $this->latDegreeInKm));
    }

    private function getMaxLat():float
    {
        return ($this->lat + ($this->radius / $this->latDegreeInKm));
    }
}