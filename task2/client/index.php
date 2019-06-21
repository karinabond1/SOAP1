<?php


$client = new SoapClient('http://gfl:8070/SOAP1/task2/server/?WSDL', array('cache_wsdl' => WSDL_CACHE_NONE));

/*$cars = $client->getAllCars();
var_dump($cars);*/

//print_r($client->__getFunctions());
// print_r($client);

if($_GET['auto_id']){
    $carId = $_GET['auto_id'];
    $carInfo = $client->getCarInfo($_GET['auto_id']);
    $carInfoRes = array();
    array_push($carInfoRes, $carInfo->item[0]->item);
    array_push($carInfoRes, $carInfo->item[1]->item);
    include 'templates/auto.php';
}else{
    $cars = array();

    foreach($client->getAllCars()->item as $value){
        $temp = array();
        array_push($temp,$value->item[0]->value);
        array_push($temp,$value->item[1]->value);
        array_push($temp,$value->item[2]->value);
        array_push($cars, $temp);
    }
    include 'templates/index.php';
}

?>