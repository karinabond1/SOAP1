<?php

class DB
{
    public function getAllCars()
    {
        $cars = array();
        $result = array();

        try {

            $mysql = new PDO("mysql:host=" . HOST . ";port=" . PORT . ";dbname=" . DATABASE , USER_NAME, USER_PASS);
            $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $selectCars = $mysql->prepare("SELECT autoshop_cars.model, autoshop_brand.brand FROM autoshop_cars inner join autoshop_brand on autoshop_cars.brand_id=autoshop_brand.id;");
            $selectCars->execute();

            $indexCars = 0;
            while ($row = $selectCars->fetch(PDO::FETCH_ASSOC)) {
                $cars[$indexCars] = $row;
                $indexCars++;
            }
            
            /*foreach($cars as $keyCar => $valueCar){
                foreach($brands as $keyBrand => $valueBrand){
                    if($valueCar[brand_id]==$valueBrand[id]){
                        array_push($valueCar, $valueBrand[brand]);
                    }                    
                }
                array_push($result, $valueCar);
            }*/
            //var_dump($cars);

        } catch (PDOException $e) {
            echo $str = 'Error:+ ' . $e->getMessage();
        }
        return $cars;
    }

    public function getCarInfo($id)
    {
        //$id = 2;
        $cars = array();
        //$brand = array();
        $result = array();
        //$colorId = array();
        $color = array();
        try {

            $mysql = new PDO("mysql:host=" . HOST . ";port=" . PORT . ";dbname=" . DATABASE , USER_NAME, USER_PASS);
            $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //select autoshop_cars.model, autoshop_cars.year_issue, autoshop_brand.brand from autoshop_cars inner join autoshop_brand on autoshop_cars.brand_id=autoshop_brand.id
            
            $selectCarinfo = $mysql->prepare("SELECT autoshop_cars.model, autoshop_cars.year_issue, autoshop_cars.engin_capacity, autoshop_cars.max_speed, autoshop_cars.price, autoshop_brand.brand FROM autoshop_cars inner join autoshop_brand on autoshop_cars.brand_id=autoshop_brand.id WHERE autoshop_cars.id = ".$id);
            $selectCarinfo->execute();
            /*$selectCarinfo = $mysql->prepare("SELECT id, brand_id, model, year_issue, engin_capacity, max_speed, price FROM autoshop_cars WHERE id = ".$id);
            $selectCarinfo->execute();*/

            $indexCar = 0;
            while ($row = $selectCarinfo->fetch(PDO::FETCH_ASSOC)) {
                $cars[$indexCar] = $row;
                $indexCar++;
            }

            /*$selectBrand = $mysql->prepare("SELECT brand FROM autoshop_brand WHERE id = ".$cars[0][brand_id]);
            $selectBrand->execute();         
            
            $indexBrand = 0;
            while ($row = $selectBrand->fetch(PDO::FETCH_ASSOC)) {
                $brand[$indexBrand] = $row;
                $indexBrand++;
            }            
*/
            $selectColor = $mysql->prepare("SELECT autoshop_color.color FROM autoshop_color INNER JOIN autoshop_car_color ON autoshop_color.id=autoshop_car_color.color_id WHERE autoshop_car_color.car_id = ".$id.";");
            $selectColor->execute(); 
            //$indexColor = 0;
            while ($row = $selectColor->fetch(PDO::FETCH_ASSOC)) {
                $cars[$indexCar] = $row;
                $indexCar++;
            }
            /*array_push($result,$cars);
            //array_push($result,$brand);
            array_push($result,$color);*/
            //var_dump($cars);

        } catch (PDOException $e) {
            echo $str = 'Error:+ ' . $e->getMessage();
        }
        return $cars;
    }

    public function find($arr)
    {

    }
}