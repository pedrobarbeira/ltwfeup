<?php
    
    declare(strict_types=1);

    class Owner extends User{
        private int $restaurantId;

    public function __construct($restaurantId, $id, $userName, $address, $name, $phoneNumber, $profilePic){
        parent::_construct($id, $userName, $address, $name, $phoneNumber, $profilePic);
        $this->restaurantId = $restaurantId;    
    }

    static function get_all(PDO $db) : array{
        $stmt = $db->prepare('SELECT * 
                              FROM User u INNER JOIN RestauraantOwner o
                              ON u.userId = o.userId');
        $stmt->execute(array());

        $owners = array();

        while($owner = $stmt->fecth()){
            $owners[] = new Owner(
                $owner['resturantID'],
                $owner['userId'],
                $owner['userName'],
                $owner['address'],
                $owner['name'],
                $owner['phoneNumber'],
                $owner['profilePic']
            );
            //To be remoted - only for test purposes
            echo($owner['userName']);
        }
        return $owners;   
    }

    static function get_one(PDO $db, int $id){
        $stmt = $db->prepare('SELECT * FROM User u INNER JOIN RestaurantOwner o
                              ON u.userID = o.userID Where userID = ?');
        $stmt->execute($id);

        $owner = $stmt->fecth();
        return $owner;
    }
}
?>