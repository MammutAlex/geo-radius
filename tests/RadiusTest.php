<?php
/**
 * Created by PhpStorm.
 * User: mammut
 * Date: 19.09.17
 * Time: 10:08
 */

namespace MammutAlex\GeoRadius\Test;

use MammutAlex\GeoRadius\Radius;
use PHPUnit\Framework\TestCase;

class RadiusTest extends TestCase
{
    public function testGetMinMaxRadius()
    {
        $radius = new Radius($lat = 50.450100, $lng = 30.523400);
        $this->assertTrue(is_array($radius->getMinMaxGeo()));
    }
}