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
        foreach ($this->client->getAllCars()->item as $value) {
            $temp = array();
            array_push($temp, $value->item[0]->value);
            array_push($temp, $value->item[1]->value);
            array_push($temp, $value->item[2]->value);
            array_push($cars, $temp);
        }
        return $cars;
    }

    public function getCar($id)
    {
        if ($id) {
            $carInfo = $this->client->getCarInfo($id);
            $carInfoRes = array();
            array_push($carInfoRes, $carInfo->item[0]->item);
            array_push($carInfoRes, $carInfo->item[1]->item);
            //var_dump($carInfoRes);
            return $carInfoRes;
        } else {
            return "error";
        }
    }

    public function getSearchResult($brand, $model, $year, $engine, $speed, $color, $priceFrom, $priceTo)
    {
        $searchResult = array();
        $search = $this->client->getSearchResult($brand, $model, $year, $engine, $speed, $color, $priceFrom, $priceTo);
        //echo '<br><br><br>';
        //var_dump($search->item);
        if (!$search) {
            return "There is no cars with this parameters. Try again!";
        } else {
            foreach ($search->item as $item) {
                if(count($item->item)>1){
                    $temp = array();
                    array_push($temp, $item->item[0]->value);
                    array_push($temp, $item->item[1]->value);
                    array_push($temp, $item->item[2]->value);
                    array_push($searchResult, $temp);
                    unset($temp);
                }else{
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

}