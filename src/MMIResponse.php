<?php
namespace MapMyIndia;

class MMIResponse
{
    public function __construct($responseCode, $version, $results)
    {
        $this->responseCode = $responseCode;
        $this->version = $version;
        $this->results = $results;
    }

    public function isEmpty() : boolean
    {
        return empty($this->results);
    }

    public function getResults() : array
    {
        return $this->results;
    }

    public function getVersion() : string
    {
        return $this->version;
    }

    public function isSuccess() : boolean
    {
        return $this->responseCode === 200;
    }
}