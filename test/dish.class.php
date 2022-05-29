<?php

    declare(strict_types=1);

    class Dish{
        private int $dishId;
        private int $restaurantId;
        private string $name;
        private int $price;
        private int $photoId;

        public function __constructor(int $id, int $restaurantid, string $name, int $price, int $photoId){
            $this->dishId = $id;
            $this->restaurantId = $restaurantId;
            $this->name = $name;
            $this->price = $price;
            $this ->photoId = $photoId;
        }

        static function get_all(PDO $db){
            $stmt = $db->prepare('SELECT * FROM Dish');
            $stmt->execute(array());

            $dishes = array();

            while($dish = $stmt->fect()){
                $dishes[] = new Dish(
                    $dish['dishID'],
                    $dish['restaurantID'],
                    $dish['name'],
                    $dish['price'],
                    $dish['photoID']
                );
            }
            return $dishes;
        }

        static function get_one(PDO $db, string $id){
            $stmt = $db->prepare('SELECT * from Dish where dishID = ?');
            $stmt = $db->execute($id);
            $dish = $stmt->fetch();
            return $dish;
        }
    }
    ?>