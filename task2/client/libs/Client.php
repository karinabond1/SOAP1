<?php

class Client
{
    private $client;

    public function __construct($wsdlUrl)
    {
        $this->client = new SoapClient($wsdlUrl, array('cache_wsdl' => WSDL_CACHE_NONE));
    }

    public function getCars()
    {
        $cars = array();
        foreach($this->client->getAllCars()->item as $value){
            $temp = array();
            array_push($temp,$value->item[0]->value);
            array_push($temp,$value->item[1]->value);
            array_push($temp,$value->item[2]->value);
            array_push($cars, $temp);
        }
        return $cars;
    }

    public function getCar($id)
    {
        if($id){
            $carInfo = $this->client->getCarInfo($id);
            $carInfoRes = array();
            array_push($carInfoRes, $carInfo->item[0]->item);
            array_push($carInfoRes, $carInfo->item[1]->item);
            return $carInfoRes;
        }else{
            return "error";
        }        
    }

}