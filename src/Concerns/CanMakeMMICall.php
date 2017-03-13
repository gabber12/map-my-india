<?php

namespace MapMyIndia\Concerns;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\ClientException;
use MapMyIndia\MMIResponse;

trait CanMakeMMICall
{
    public function get($uri, $data)
    {
        $client = new HttpClient();

        $query = [
            'query' => $data
        ];

        try {
            $response = $client->get($uri, $query);
            $json = json_decode($response->getBody()->getContents(), true);
            return new MMIResponse($json['responseCode'], $json['version'], $json['results']);
        } catch(ClientException $e) {
            if($e->getResponse()->getStatusCode() == 401) {
                throw new \MapMyIndia\Exceptions\MMIException("License key not valid");
            }
            throw new \MapMyIndia\Exceptions\MMIException("Bad Request");
        } 
        
    }

    public function post($uri, $data, $licenseKey)
    {

    }
}