<?php

@include_once './connections/config.php';

session_start();

if(isset($_POST['submit'])){

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = md5($_POST['password']);
$confirm_pass = md5($_POST['confirm_pass']);
$user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$password' ";

$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) > 0){

    $row = mysqli_fetch_array($result);

    if($row['user_type'] == 'user'){

        $_SESSION['user_name'] = $row['name'];
        header('location:dashboard.php');

    }
      // elseif($row['user_type'] == 'admin'){

      //    $_SESSION['user_name'] = $row['name'];
      //    header('location:admin_page.php');

      // }
}else{
    $error[] = 'incorrect email or password!';
}

};
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hydro Web</title>

    <!-- Bootstrap -->
    <link href="vendor/css/bootstrap.min.css" rel="stylesheet">
    <script src="vendor/js/bootstrap.bundle.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="bg-main-picture">
        <div class="row m-0">
            <div class="col-lg-4 col-sm-12 bg-main py-5 text-white" style="min-height: 100vh;">

                <!-- Logo Area -->
                <div class="d-flex justify-content-center align-item-center">
                    <img class="w-50 mx-5" src="image/logo.png" alt="hydro fluid logo">
                </div>

                <!-- Login Form -->
                <form action="#" class="px-5 mt-5" method="post">
                    <h1 class="fw-light fs-4 mb-3">Welcome to our website!</h1>
                    <div class="mb-3">
                        <label for="emailForm" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="emailForm" placeholder="johndoe@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="passwordForm" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="passwordForm">
                        <!-- <a href="forgot_password.php" class="link-light">Forgot Password</a> -->
                    </div>

                    <div class="col-12">
                        <!-- <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Remember me
                            </label>
                        </div> -->
                    </div>

                    <div class="col-12 mt-3 mb-3">
                        <button type="submit" name="submit" class="btn btn-lb w-100 shadow">Log In</button>
                    </div>
                    <div class="col-12">
                        <p>You don't have account? <a href="register.php" class="link-light">Sign In</a></p>
                    </div>

                </form>

                <!-- Company Logos -->
                <div class="mx-5 mt-5 d-flex gap-3 justify-content-center align-items-center">
                    <img class="w-25" src="image/cpe.png" alt="CPE Logo">
                    <img class="w-25" src="image/snc.png" alt="SNC Logo">
                </div>
            </div>
            <div class="col-8 d-none d-lg-flex justify-content-center align-items-center">
                <img class="w-75" src="image/Hydroponics.png" alt="Hydroponics Vector Art">
            </div>
        </div>
    </div>

</body>

</html>