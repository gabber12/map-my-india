<?php

namespace Tests;

use MapMyIndia\Client;
use MapMyIndia\GeoCoder;
use PHPUnit\Framework\TestCase;

class TestClient extends TestCase
{
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
        $geoCode = new GeoCoder("2vktgjh45o1nc3qxt7atmpblt3s86r7k");
        $res = $geoCode->geoCode("saket");
        $this->assertNotEmpty($res->getResults());
    }

    
}