<?php

ini_set('soap.wsdl_cache_enabled', 0); 
ini_set('soap.wsdl_cache_ttl', 0);
include('config.php');
include('DB.php');

$server = new SoapServer("http://192.168.0.15/~user14/SOAP1/task2/server/autoshop_new.wsdl");
$server->setClass("DB");
$server->handle();

/*$autoshop = new DB;
$cars = $autoshop->getAllCars();
$carInfo = $autoshop->getCarInfo(2);
//$json = '{ "brand": "","model": "", "year": 2011,"engine": 0,"speed": 0, "color": "white","priceFrom": 0,"priceTo": 0 }';
//$stdInstance = json_decode($json);
$brand = "";
$model = "";
$year = 2011;
$engine = 0;
$speed = 0;
$color = "";
$priceFrom = 0;
$priceTo = 0;
$search = $autoshop->getSearchResult($brand,$model,$year,$engine,$speed,$color,$priceFrom,$priceTo);
//var_dump($search);
//echo $search;

$carSendInfo = $autoshop->getCarRequestBuy(2,"Ka","hoho","card");
var_dump($carSendInfo);*/