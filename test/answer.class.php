<?php
    declare(strict_type=1);

    class Answer{
        private int $id;
        private int $reviewID;
        private string $comment;
        private string $answerDate;

        public function __construct(int $id, int $reviewID, 
                    string $comment, string $answerDate){
            $this->id=$id;
            $this->reviewID=$reviewID;
            $this->comment=$comment;
            $this->answerDate=$answerDate;
        }

        static function get_all(PDO $db){
            $stmt=$db->prepare('SELECT * FROM Answer');
            $stmt->execute();
            $answers=array();
            while($answer=$stmt->fetch()){
                $answer[]=new Answer(
                    $answer['answerID'],
                    $answer['reviewID'],
                    $answer['comment'],
                    $answer['answerDate']
                );
            }
            return $answers;
        }

        static function get_answer_to(PDO $db, int $reviewID){
            $stmt=$db->prepare('SELECT * 
                                FROM Answer
                                WHERE reviewID=?');
            $stmt->execute($reviewID);
            $answers=array();
            while($answer=$stmt->fetch()){
                $answer[]=new Answer(
                    $answer['answerID'],
                    $answer['reviewID'],
                    $answer['comment'],
                    $answer['answerDate']
                );
            }
            return $answers;
        }

        static function get_one(PDO $db, int $id){
            $stmt=$db->prepare('SELECT *
                                FROM Answer
                                where answerID=?');
            $stmt->execute($id);
            $answer=$stmt->fetch();
            return $answer;
        }
    }
?>