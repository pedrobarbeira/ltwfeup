<?php
    declare(strict_types=1);

    class Category{
        private int $categoryId;
        private string $name;

        public function __constructor(int $catId, string $name){
            $this->dishCategoryId=$catId;
            $this->dishId=$dishId;
            $this->name=$name;
        }

        static function get_all(PDO $db){
            $stmt=$db->prepare('SELECT * FROM Category');
            $stmt->execute(array());
            $dishCategories = array();
            while($dishCategory=$stmt->fetch()){
                $dishCategories[]=new DishCategory(
                    $dishCategory['categoryID'],
                    $dishCategory['name']
                );
            }
            return $dishCategories;
        }

        static function get_one(PDO $db, int $id){
            $stmt=$db->prepare('SELECT * FROM Category WHERE categoryID=?');
            $stmt->execute($id);
            $dishCategory=$stmt->fecth();
            return $dishCategory;
        }
    }
?>