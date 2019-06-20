<?php

require 'config.php';
require 'libs/SOAP.php';
require 'libs/CURL.php';


$url = "http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL";

$soap = new SOAP($url);
$result = $soap->SoapClientResult()->ListOfContinentsByNameResult->tContinent;

$resultPar = $soap->SoapClientResultPar(['sCountryISOCode'=>'AF'])->CountryIntPhoneCodeResult;


$curl = new CURL($url);
$resultCURL = $curl->cURLResult()->mtContinent;


$resultCURLPar = $curl->cURLResultPar(['sCountryISOCode'=>'AF']);




include_once 'templates/index.php';
?>