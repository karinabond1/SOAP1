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
        $carsWsdl = $this->client->getAllCars();
        $cars = array();
        if(!$carsWsdl){
            return "There is some problems. Please, try again later!";
        }else{
            foreach ($carsWsdl->item as $value) {
                $temp = array();
                array_push($temp, $value->item[0]->value);
                array_push($temp, $value->item[1]->value);
                array_push($temp, $value->item[2]->value);
                array_push($cars, $temp);
            }
            return $cars;
        }

    }

    public function getCar($id)
    {
        $carInfo = $this->client->getCarInfo($id);

        if (!$carInfo) {
            return "There is some problems. Please, try again!";
        } else {
            $carInfoRes = array();
            array_push($carInfoRes, $carInfo->item[0]->item);
            array_push($carInfoRes, $carInfo->item[1]->item);
            return $carInfoRes;
        }
    }

    public function getSearchResult($brand, $model, $year, $engine, $speed, $color, $priceFrom, $priceTo)
    {
        $searchResult = array();
        $search = $this->client->getSearchResult($brand, $model, $year, $engine, $speed, $color, $priceFrom, $priceTo);
        
        if (!$search) {
            return "There is no cars with this parameters. Please, try again!";
        } else {
            foreach ($search->item as $item) {
                if (count($item->item) > 1) {
                    $temp = array();
                    array_push($temp, $item->item[0]->value);
                    array_push($temp, $item->item[1]->value);
                    array_push($temp, $item->item[2]->value);
                    array_push($searchResult, $temp);
                    unset($temp);
                } else {
                    $temp = array();
                    array_push($temp, $item[0]->value);
                    array_push($temp, $item[1]->value);
                    array_push($temp, $item[2]->value);
                    array_push($searchResult, $temp);
                    unset($temp);
                }

            }
            return $searchResult;
        }


    }

    public function getCarRequest($car_id, $name, $surname, $payment)
    {
        $answer = $this->client->getCarRequestBuy($car_id, $name, $surname, $payment);
        
        
        if (!$answer) {
            return "There is some problems with sending your data. Please, try again!";
        } else {
            return true;
        }
        
    }

}