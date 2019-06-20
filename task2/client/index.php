<?php


$client = new SoapClient('http://192.168.0.15/~user14/SOAP1/task2/server/?WSDL', array('cache_wsdl' => WSDL_CACHE_NONE));

/*$cars = $client->getAllCars();
var_dump($cars);*/

//print_r($client->__getFunctions());
// print_r($client);
$cars = array();

foreach($client->getAllCars()->item as $value){
    $temp = array();
    array_push($temp,$value->item[0]->value);
    array_push($temp,$value->item[1]->value);
    array_push($cars, $temp);
    //var_dump($value->item[0]->value);
}
//var_dump($cars);
$carInfo = $client->getCarInfo(2);
//var_dump($carInfo->item[0]->item);
$carInfoRes = array();
array_push($carInfoRes, $carInfo->item[0]->item);
array_push($carInfoRes, $carInfo->item[1]->item);
//var_dump($carInfoRes);




include 'templates/index.php';
?>