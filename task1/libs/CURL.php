<?php

class CURL
{
    private $url;

    public function __construct($url)
    {
        $this->url=$url;
    }

    public function cURLResult()
    {
        $xml = '<?xml version="1.0" encoding="utf-8"?>'.
        '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">'.
         '<soap:Body>'.
           '<ListOfContinentsByName xmlns="http://www.oorsprong.org/websamples.countryinfo">'.
           '</ListOfContinentsByName>'.
          '</soap:Body>'.
        '</soap:Envelope>'; 

           $headers = array('POST /websamples.countryinfo/CountryInfoService.wso HTTP/1.1',
                'Host: webservices.oorsprong.org',
                'Content-Type: text/xml; charset=utf-8',
                'Content-Length:'.strlen($xml));

        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_URL,$this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $res = curl_exec($ch); 

        $res = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $res);
        //echo "<pre>".print_r($res, true)."</pre>"; 
        $result = new SimpleXMLElement($res);
        return $result->soapBody->mListOfContinentsByNameResponse->mListOfContinentsByNameResult;
        
    }

    public function cURLResultPar($par)
    {
        $xml = '<?xml version="1.0" encoding="utf-8"?>'.
        '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">'.
          '<soap:Body>'.
            '<CountryIntPhoneCode xmlns="http://www.oorsprong.org/websamples.countryinfo">'.
              '<sCountryISOCode>'.$par[sCountryISOCode].'</sCountryISOCode>'.
            '</CountryIntPhoneCode>'.
          '</soap:Body>'.
        '</soap:Envelope>'; 

           $headers = array('POST /websamples.countryinfo/CountryInfoService.wso HTTP/1.1',
           'Host: webservices.oorsprong.org',
           'Content-Type: text/xml; charset=utf-8',
           'Content-Length: '.strlen($xml));

        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $res = curl_exec($ch); 
        return $res;
    }

}