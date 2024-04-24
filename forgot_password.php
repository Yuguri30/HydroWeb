<?php 




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
    <h1>Forgot Password</h1>
        <form action="send_password_reset.php" method="POST">
            <label for="email">Email </label>
            <input type="email" id="email" name="email" value="<?=htmlspecialchars($POST["email"]??"")?>">

            <!-- <label for="password"> Password: </label>
            <input type="password" name="password" id="password"> -->
            <!-- <input type="button" name="send"value="send">s -->
            <button>SEND</button>





        </form>


</body>
</html>