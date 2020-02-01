<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/font-awesome/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/reset.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/chosen/chosen.min.css'); ?>">

    <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'> -->
    <title>Washoes</title>
</head>

<body class="admincontainer">
    <a class="admintopbar"></a>
    <div class="adminblackbar">
        <img src="<?php echo base_url('assets/image/user.png'); ?>" class="adminpp">
        <p class="tulisanadmin"><?php echo $this->session->userdata('admin_id') ?></p>
        <a class="indikatoronline"></a>
        <p class="tulisanonlineoffline">online</p>
        <div class="tulisandalamblackbar">
            <a class="tulisandashboard" style="color: white;" href="<?php echo site_url('admin'); ?>">Dashboard</a>
            <a class="tulisanuser" style="color: white;" href="<?php echo site_url('users'); ?>">Users</a>
            <a class="tulisanorder" style="color: white;" href="<?php echo site_url('order'); ?>">Orders</a>
            <a href="<?php echo site_url('daerah');?>" style="position: absolute; left: 22px; top: 305px; color: white;">Daerah</a>
            <a href="<?php echo site_url('adie');?>" style="position: absolute; color: red; left: 22px; top: 540px;">Log Out</a>
        </div>
    </div>
    <div class="tablebar">
