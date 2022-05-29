<?php
    declare(strict_types=1);
    class OrderDish{
        private int $orderId;
        private int $dishId;
        private int $quantity;

        public function __constructor(int $orderId, int $dishId, int $quantity){
            $this->orderId= $orderId;
            $this->dishId=$dishId;
            $this->quantity=$quantity;
        }

        static function get_all(PDO $db){
            $stmt=$db->prepare('SELECT * FROM OrderDish');
            $stmt->execute(array());
            $orderDishes=array();
            while($orderDish=$stmt->fetch()){
                $orderDishes[] = new OrderDish(
                    $orderDish['orderID'],
                    $orderDish['dishID'],
                    $orderDish['quantity']
                );
            }
            return $orderDishes;
        }

        static function get_one(PDO $db, int $orderId, int $dishId){
            $stmt=$db->prepare('SELECT * FROM OrderDish o
                                WHERE o.orderID=? AND o.dishID=?');

            $stmt->execute(array($orderId, $dishId));
            $orderDish=$stms->fect();
            return $orderDish;
        }
    }
?>