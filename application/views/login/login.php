<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Washoes - Login</title>
    <link rel="stylesheet" href="<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css'); ?>">

    <!-- Font -->
    <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/reset.css'); ?>">

</head>

<body>
    <div class="jumbotron">
        <img class="logologin" src="<?php echo base_url('assets/image/logo_ws.png'); ?>" onclick="location.href='<?php echo site_url(''); ?>'" alt="wash shoes">
        <img class="userlogin" src="<?php echo base_url('assets/image/user.png'); ?>" alt="user">
        <form action="<?php echo base_url('login'); ?>" method="post">
            <div class="form-group">
                <!-- <label>Username :</label> -->
                <img class="boxusernamelogin" src="<?php echo base_url('assets/image/uname.png'); ?>" alt="Username">
                <input class="usernamelogin" type="text" name="username" placeholder="Username" required>
                <div class="text-danger" style="position:absolute; top:390px; left:500px;">
                    <?php echo form_error('username', '<div class="error bg-white">', '</div>'); ?>
                </div>
            </div>
            <div class="form-group">
                <!-- <label>Password :</label> -->
                <img class="boxpasslogin" src="<?php echo base_url('assets/image/pass.png'); ?>" alt="Password">
                <input class="passlogin" type="password" name="password" placeholder="Password" required>
                <div class="text-danger" style="position:absolute; top:460px; left:500px;">
                    <?php echo form_error('password', '<div class="error bg-white">', '</div>'); ?>
                </div>
            </div>
            <br>
            <input class="col col-12 boxlogin" type="submit" value="Login">
        </form>
        <a class="gapunyaakun" href="<?php echo site_url('regis'); ?>">belum punya akun? daftar disini</a>
    </div>

    <script src="<?php echo base_url('vendors/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/popper.js/dist/umd/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
</body>

</html> 
