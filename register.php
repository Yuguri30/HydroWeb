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
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="bg-main-picture">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-12 bg-main text-white p-5 overflow-y-scroll" style="max-height:100vh">

                    <!-- Logo Area -->
                    <div class="d-flex justify-content-center align-item-center">
                        <img class="w-50 mx-5" src="image/logo.png" alt="hydro fluid logo">
                    </div>


                    <form action="#" class="mt-5" method="POST">

                        <h1 class="fw-light fs-4 mb-3">Register Now</h1>

                        <div class="mb-3">
                            <label class="form-label" for="name">Name</label>
                            <input class="form-control" type="text" name="name" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input class="form-control" type="email" name="email" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input class="form-control" type="password" name="password" id="password" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="confirm_pass">Confirm Password</label>
                            <input class="form-control" type="confirm_pass" name="confirm_pass" id="confirm_pass" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="role">Role</label>
                            <select class="form-select" aria-label="Default select role" id="role">
                                <option value="">Select Role</option>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input class="btn btn-lb w-100" type="submit" name="submit" value="Register now" class="form-btn">
                        </div>
                        <p>Already have an account? <a href="login_form.php" class="link-light">Login now</a></p>
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
    </div>
</body>

</html>