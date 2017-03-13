<?php
namespace MapMyIndia;
use MapMyIndia\Concerns\CanMakeMMICall;

class GeoCoder
{
    use CanMakeMMICall;

    protected $key;

    public function __construct($key)
    {
        $this->key = $key;
    }
    const MMI_BASE = "http://apis.mapmyindia.com/advancedmaps/v1/";
    const GEOCODE_API = "/geo_code";

    public static function getUrl($api, $key)
    {
        return self::MMI_BASE.$key.$api;
    }

    public function geoCode(string $address)
    {
        $data = ['addr' => $address];
        $geoCodeResponse = $this->get(self::getUrl(self::GEOCODE_API, $this->key), $data);
        return $geoCodeResponse;
    }
}