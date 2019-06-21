<?php

include('libs/Client.php');
include('config.php');



//$client = new SoapClient('http://192.168.0.15/~user14/SOAP1/task2/server/?WSDL', array('cache_wsdl' => WSDL_CACHE_NONE));

/*$cars = $client->getAllCars();
var_dump($cars);*/

//print_r($client->__getFunctions());
// print_r($client);

$client = new Client(WSDL_URL);

if($_GET['auto_id']){
    $carInfoRes = $client->getCar($_GET['auto_id']);
    //var_dump($carInfoRes);
    include 'templates/auto.php';
}else{
    $cars = $client->getCars();
    include 'templates/index.php';
}



?>