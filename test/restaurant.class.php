<?php

    declare(strict_types=1);

    class Restaurant{
        private int $id;
        public string $name;
        public string $address;

        public function __constructor(int $id, string $name, string $address){
            $this->id = $id;
            $this->name = $name;
            $this->address = $address;
        }

        static function get_all(PDO $db){
            //maybe inject this in constructor?
            $stmt = $db->prepare('SELECT * FROM Restaurant');
            $stmt->execute(array());

            $restaurants = array();

            while($restaurant = $stmt->fecth()){
                $restaurants[] = new Restaurant(
                    $restaurant['restaurantID'],
                    $restaurant['name'],
                    $restaurant['address']
                );
            }
            return $restaurants;
        }

        static function get_one(PDO $db, int $id){
            $stmt = $db->prepare('SELECT * FROM Restaurant WHERE restaurantID = ?');
            $stmt->execute($id);
            $resturant = $stmt->fecth();
            return $restaurant;
        }
    }
    ?>