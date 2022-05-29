<?php

    declare(strict_types=1);

    class UserOrder{
        private int $orderId;
        private int $userId;

        public function __constructor(int $orderId, int $userId){
            $this->orderId = $orderId;
            $this->userId = $userId;
        }

        static function getAll(PDO $db){
            $stmt = $db->prepare('SELECT * FROM UserOrder');
            $stmt->execute(array());
            $userOrders = array();
            while($userOrder = $stmt->fetch()){
                $userOrders[] = new UserOrder(
                    $userOrder['orderID'],
                    $userOrder['userID']
                );
            }
            return $userOrders;
        }

        static function getOrder(PDO $db, int $id){
            $stmt=$db->prepare('SELECT * FROM UserOrder WHERE orderID=?');
            $stmt->execute($id);
            $order=$stmt->fecth();
            return $order;
        }

    }
    ?>