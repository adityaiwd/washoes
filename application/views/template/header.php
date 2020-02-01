<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wash Shoes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="css/bootstrap-responsive.css"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/reset.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/chosen/chosen.min.css'); ?>">

</head>

<body>
    <div class="navbar">
        <img class="logonavbar" src="<?php echo base_url('assets/image/home.png'); ?>" onclick="location.href='<?php echo site_url(''); ?>'">
        <button class="pelayanannavbar" onclick="location.href='<?php echo site_url('#pelayanan'); ?>'">pelayanan.</button>
        <button class="pesanannavbar" onclick="location.href='<?php echo site_url('#cekpesanan'); ?>'">cek pesanan.</button>
        <button class="aboutnavbar" onclick="location.href='<?php echo site_url('#about'); ?>'">about.</button>
        <?php if ($this->session->userdata('type') === 'user' && $this->session->userdata('status') === 'login') : ?>
        <img onclick="location.href='<?php echo site_url('profile'); ?>'" class="usernavbar dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" src="<?php echo base_url('assets/image/user.png'); ?>">

        <!-- <div class="dropdown">
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="<?php echo site_url('profile'); ?>">Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo site_url('die'); ?>">Logout</a>
            </div>
        </div> -->
        <?php elseif ($this->session->userdata('type') === 'admin' && $this->session->userdata('status') === 'login') : ?>

        <?php else : ?>
        <button class="loginnavbar" onclick="location.href='<?php echo site_url('login'); ?>'">login.</button>
        <?php endif ?>
    </div> 
