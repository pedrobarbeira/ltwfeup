<?php
    declare(strict_types=1);

    class User{
        public int $userID;
        private string $address;
        public string $name;
        private int $phoneNumber;
        private int $profilePic;

        public function __construct(int $id,string $name, string $address, int $phoneNumber, int $profilePic){
            $this->userID = $id;
            $this->address = $address;
            $this->name = $name;
            $this->phoneNumber = $phoneNumber;
            $this->profilePic = $profilePic;
        }

        static function get_all(PDO $db){
            $stmt = $db->prepare('SELECT * FROM User');
            $stmt->execute(array());

            $users = array();

            while($user = $stmt->fecth()){
                $users[] = new User(
                    $user['userID'],
                    $user['address'],
                    $user['name'],
                    $user['phoneNumber'],
                    $user['profilePic']
                );
            }   
            return $users;
        }

        static function get_one(PDO $db, int $id) : User{
            $stmt = $db->prepare('SELECT * FROM User WHERE userID = ?');
            $stmt->execute(array($id));

            $user = $stmt->fetch();

            $pic=$user['profilePic'];

            return new User(
                $user['userID'],
                $user['name'],
                $user['address'],
                (int)$user['phoneNumber'],
                $user['profilePic']
            );
        }

        public function get_id() : int{
            return $this->$userID;
        }

        public function get_address() : string{
            return $address;
        }

        public function get_name() : string{
            return $this->name;
        }

        public function get_phone() : int{
            return $this->phoneNumber;
        }

        public function get_pic(PDO $db) : string{
            $stmt=$db->prepare('SELECT photoURL
                                FROM Photo
                                WHERE photoID = ?');
            $stmt->execute(array($this->profilePic));
            $photo=$stmt->fetch();
            return $photo['photoURL'];
        }

        public function is_owner(PDO $db) : bool{
            $stmt=$db->prepare('SELECT userID
                                FROM RestaurantOwner
                                WHERE userID=?');
            $stmt->execute(array($this->userID));
            $owner=$stmt->fetch();
            return !empty($owner);
        }
    }
?>