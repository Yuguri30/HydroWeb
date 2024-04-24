<?php

@include_once './connections/config.php';

if(isset($_POST['submit'])){

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = md5($_POST['password']);
$confirm_pass = md5($_POST['confirm_pass']);
$user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$password' ";

$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) > 0){

    $error[] = 'user already exist!';

}else{

    if($password != $confirm_pass){
        $error[] = 'password not matched!';
    }else{
        $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$password','$user_type')";
        mysqli_query($conn, $insert);
        header('location:login_form.php');
    }
}

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register form</title>

    <!-- custom css file link  -->
    <!-- Bootstrap -->
    <link href="vendor/css/bootstrap.min.css" rel="stylesheet">
    <script src="vendor/js/bootstrap.bundle.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="register.css">

</head>
<body>

<div class="form-container">

    <form action="#" method="POST">
        <h3>register now</h3>
        <?php
            if(isset($error)){
                foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
                };
            };
        ?>
        <input type="text" name="name" required placeholder="enter your name">
        <input type="email" name="email" required placeholder="enter your email">
        <input type="password" name="password" required placeholder="enter your password">
        <input type="password" name="confirm_pass" required placeholder="confirm your password">
        <select name="user_type">
        <option value="user">user</option>
    <!-- <option value="admin">admin</option> -->
        </select>
        <input type="submit" name="submit" value="register now" class="form-btn">
        <p>already have an account? <a href="login_form.php">login now</a></p>
    </form>

</div>
</body>
</html>