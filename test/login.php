<?php
    require_once('connection.db.php');
    require_once('user.class.php');
    require_once('authenticate.php');

    session_start();

    $db=db_init();

    $username=$_POST["username"];
    $password=$_POST["password"];

    $userID=authenticate($db, $username, $password);
    if($userID === 0){
        echo "Invalid credentials";
        echo "<br><a href=\"index.php\">BACC</a>";
    }
    else{
        $user=User::getUser($db, $userID);
        $_SESSION['username']=$username;
        $profilePic=$user->getPic($db);
        echo "<img src=\"$profilePic\" alt=userPic>";
    }   
    
?>