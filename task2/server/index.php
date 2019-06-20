<?php
ini_set('soap.wsdl_cache_enabled', 0); 
ini_set('soap.wsdl_cache_ttl', 0);

include 'config.php';
include 'DB.php';
include 'index1.php';
//ini_set("soap.wsdl_cache_enabled", "0");


/*include('libs/db.php');
include('libs/AutoShop.php');*/

/*include 'config.php';
include 'DB.php';*/

$server = new SoapServer("http://192.168.0.15/~user14/SOAP1/task2/server/autoshop_new.wsdl");
$server->setClass("DB");
$server->handle();

$autoshop = new DB;
$cars = $autoshop->getAllCars();
$carInfo = $autoshop->getCarInfo();
//var_dump($cars);
?>