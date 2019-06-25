<?php

include('libs/Client.php');
include('config.php');



//$client = new SoapClient('http://192.168.0.15/~user14/SOAP1/task2/server/?WSDL', array('cache_wsdl' => WSDL_CACHE_NONE));

/*$cars = $client->getAllCars();
var_dump($cars);*/

//print_r($client->__getFunctions());
// print_r($client);

$client = new Client(WSDL_URL);

if($_GET['auto_id'] && !$_POST['name']){
    $carInfoRes = $client->getCar($_GET['auto_id']);
    //var_dump($carInfoRes);
    include 'templates/auto.php';
}if($_GET['auto_id'] && $_POST['name'] && $_POST['surname']){
    $carInfoRes = $client->getCar($_GET['auto_id']);
    $id = (int) $_GET['auto_id'];
    $name = (string)$_POST['name'];
    $surname = (string)$_POST['surname'];
    $payment = (string)empty($_POST['payment']) ? '' : trim($_POST['payment']);

    $sendRequest = $client->sendCarRequest($id,$name,$surname,$payment);
    echo '<br><br><br>';
    echo $id." ".$name." ".$surname." ".$payment." ".$sendRequest;
    if($sendRequest===true){
        include 'templates/thank.php';
    }else{
        include 'templates/auto.php';
    }
    
}else{
    if($_POST['year_issue']&& !$_GET['auto_id']){
        //$searchValues = array('brand'=>$_POST['brand'],'model'=>$_POST['model'],'year_issue'=>$_POST['year_issue'],'engin_capacity'=>$_POST['engin_capacity'],'max_speed'=>$_POST['max_speed'],'color'=>$_POST['color'],'price_from'=>$_POST['price_from'],'price_to'=>$_POST['price_to']);
        $brand = empty($_POST['brand']) ? '' : trim($_POST['brand']);
        $model = empty($_POST['model']) ? '' : trim($_POST['model']);
        $year = empty($_POST['year_issue']) ? 0 : $_POST['year_issue'];
        $engine = empty($_POST['engin_capacity']) ? 0 : $_POST['engin_capacity'];
        $speed = empty($_POST['max_speed']) ? 0 : $_POST['max_speed'];
        $color = empty($_POST['color']) ? '' : trim($_POST['color']);
        $priceFrom = empty($_POST['price_from']) ? 0 : $_POST['price_from'];
        $priceTo = empty($_POST['price_to']) ? 0 : $_POST['price_to'];
        $search = $client->getSearchResult($brand,$model,$year,$engine,$speed,$color,$priceFrom,$priceTo);
        //echo '<br><br>';
        //var_dump($search);

    }
    if(!$_GET['auto_id']){
        $cars = $client->getCars();
        include 'templates/index.php';
    }

}



?>