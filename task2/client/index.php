<?php

include('libs/Client.php');
include('config.php');





$client = new Client(WSDL_URL);

if($_GET['auto_id'] && !$_POST['name']){
    $carInfoRes = $client->getCar($_GET['auto_id']);
    
    include 'templates/auto.php';
}if($_GET['auto_id'] && $_POST['name'] && $_POST['surname']){
    $carInfoRes = $client->getCar($_GET['auto_id']);
    if(stristr($_POST['name']," ")||stristr($_POST['surname']," ")){
        $sendRequest = "There are some spaces in the fields. Please, write again your name or surname!";
        include 'templates/auto.php';
    }else{
        $car_id = (int)$_GET['auto_id'];
        $name = (string)$_POST['name'];
        $surname = (string)$_POST['surname'];
        $payment = (string)$_POST['payment'];

        $sendRequest = $client->getCarRequest($car_id,$name,$surname,$payment);


        if($sendRequest===true){
            include 'templates/thank.php';
        }else{
            include 'templates/auto.php';
        }
    }


    
}else{
    if($_POST['year_issue']&& !$_GET['auto_id']){
        $brand = empty($_POST['brand']) ? '' : trim($_POST['brand']);
        $model = empty($_POST['model']) ? '' : trim($_POST['model']);
        $year = empty($_POST['year_issue']) ? 0 : $_POST['year_issue'];
        $engine = empty($_POST['engin_capacity']) ? 0 : $_POST['engin_capacity'];
        $speed = empty($_POST['max_speed']) ? 0 : $_POST['max_speed'];
        $color = empty($_POST['color']) ? '' : trim($_POST['color']);
        $priceFrom = empty($_POST['price_from']) ? 0 : $_POST['price_from'];
        $priceTo = empty($_POST['price_to']) ? 0 : $_POST['price_to'];
        $search = $client->getSearchResult($brand,$model,$year,$engine,$speed,$color,$priceFrom,$priceTo);
        

    }
    if(!$_GET['auto_id']){
        $cars = $client->getCars();
        include 'templates/index.php';
    }

}



?>