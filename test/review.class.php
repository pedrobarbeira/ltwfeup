<?php
    declare(strict_types=1);

    class Review{
        private int $id;
        private string $comment;
        private int $score;
        private string $date;
        private int $userID;
        private int $restaurantID;

        public function __construct(int $id, string $comment, 
                int $score, string $date, int $userID, int $restaurantID){
            $this->$id=$id;
            $this->comment=$comment;
            $this->score=$score;
            $this->date=$date;
            $this->userID=$userID;
            $this->restaurantID=$restaurantID;
        }

        static function get_all(PDO $db){
            $stmt=$db->prepare('SELECT * FROM Review');
            $stmt->execute();
            $reviews=array();
            while($review=$stmt->fetch()){
                $reviews[]=new Review(
                    $review['reviewID'],
                    $review['comment'],
                    $review['score'],
                    $review['date'],
                    $review['userID'],
                    $review['restaurantID']                    
                );
            }
            return $reviews;
        }

        static function get_all_restaurant(PDO $db, int $restaurantID){
            $stmt=$db->prepare('SELECT * 
                                FROM Review
                                WHERE restaurantID=?');
            $stmt->execute($restaurantID);
            $reviews=array();
            while($review=$stmt->fetch()){
                $reviews[]=new Review(
                    $review['reviewID'],
                    $review['comment'],
                    $review['score'],
                    $review['date'],
                    $review['userID'],
                    $review['restaurantID']                    
                );
            }
            return $reviews;
        }

        static function get_all_user(PDO $db, $userID){
            $stmt=$db->prepare('SELECT * 
                                FROM Review
                                WHERE userID=?');
            $stmt->execute($userID);
            $reviews=array();
            while($review=$stmt->fetch()){
                $reviews[]=new Review(
                    $review['reviewID'],
                    $review['comment'],
                    $review['score'],
                    $review['date'],
                    $review['userID'],
                    $review['restaurantID']                    
                );
            }
            return $reviews;
        }

        static function get_all_user_restaurant(PDO $db, $userID, $restaurantID){
            $stmt=$db->prepare('SELECT * 
                                FROM Review
                                WHERE userID=? AND restaurantID=?');
            $stmt->execute(array($userID, $restaurantID));
            $reviews=array();
            while($review=$stmt->fetch()){
                $reviews[]=new Review(
                    $review['reviewID'],
                    $review['comment'],
                    $review['score'],
                    $review['date'],
                    $review['userID'],
                    $review['restaurantID']                    
                );
            }
            return $reviews;
        }

        static function get_one(PDO $db, int $id){
            $stmt=$db->prepare('SELECT *
                                FROM Review
                                WHERE reviewID=?');
            $stmt->execute($id);
            $review=$stmt->fetch();
            return $review;
        }
    }
?>