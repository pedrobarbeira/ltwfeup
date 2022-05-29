<?php
    declare(strict_types=1);
    
    function authenticate(PDO $db, string $username, string $password) : int{
        $stmt=$db->prepare('SELECT userID 
                            FROM Authenticate 
                            WHERE username=? AND password=?');
        $stmt->execute(array($username, $password));
        $userID=$stmt->fetch();
        if(empty($userID)) return 0;
        else return $userID['userID'];
    }
?>