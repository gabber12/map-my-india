<?php

namespace Tests;

use MapMyIndia\Client;
use MapMyIndia\GeoCoder;
use PHPUnit\Framework\TestCase;

class TestClient extends TestCase
{
    protected $geoCoder;

    public function setUp()
    {
        $this->geoCode = new GeoCoder("2vktgjh45o1nc3qxt7atmpblt3s86r7k");
    }

    public function testClientInstantiation()
    {
        $client = new Client();
        $this->assertTrue($client->test());
    }

    public function testGeoCoderWrongLicenseKey()
    {
        $geoCode = new GeoCoder("36e3dm7y1lgoprj6xh3y3jbswjpm3mah");
        $this->expectException(\MapMyIndia\Exceptions\MMIException::class);
        $geoCode->geoCode("saket");
        
    }
    public function testGeoCoderSuccess()
    {
        $res = $this->geoCode->geoCode("saket");
        $this->assertNotEmpty($res->getResults());
        $this->assertNotEmpty($res->getVersion());
    }

    public function testRevGeoCoderSuccess()
    {
        
        $res = $this->geoCode->rgeoCode("26.5645", "85.9914");
        $this->assertNotEmpty($res->getResults());
        $this->assertNotEmpty($res->getVersion());
    }
}