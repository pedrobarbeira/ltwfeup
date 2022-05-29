<!DOCTYPE html>
<?php session_start()?>
<html>
    <body>
        <form action="login.php" method="post">
            Username: <input type="text" name="username">
            Password: <input type="text" name="password">
            <input type="submit">
            <?php
                echo "<br> Username: " . $_SESSION['username'];
            ?>
        </form>
    </body>

</html>