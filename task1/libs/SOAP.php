<?php

class SOAP
{
    private $url;

    public function __construct($url)
    {
        $this->url=$url;
    }

    public function SoapClientResult()
    {
        $client = new SoapClient($this->url);
        $result = $client->ListOfContinentsByName();
        return $result;

    }

    public function SoapClientResultPar($par)
    {
        $client = new SoapClient($this->url);
        $result = $client->CountryIntPhoneCode($par);
        return $result;

    }
}