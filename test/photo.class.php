<?php
    declare(strict_types=1);

    class Photo{
        private int $photoId;
        private string $photoUrl;

        public function __constructor(int $id, string $url){
            $this->photoId=$id;
            $this->photoUrl=$url;
        }

        static function get_all(PDO $db){
            $stmt=$db->prepare('SELECT * FROM Photo');
            $stmt->execute(array());
            $photos = array();
            while($photo=$stmt->fetch()){
                $photos[] = new Photo(
                    $photo['photoID'],
                    $photo['photoUrl']
                );
            }
            return $photos;
        }

        static function get_one(PDO $db, int $id){
            $stmt=$db->prepare('SELECT * FROM Photo WHERE photoID=?');
            $stmt->execute($id);
            $photo = $stmt->fetch();
            return $photo;
        }
    }
?>