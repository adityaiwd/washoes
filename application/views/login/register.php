<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Washoes - Register</title>

    <link rel="stylesheet" href="<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/reset.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/chosen/chosen.min.css'); ?>">

</head>

<body>
    <div class="jumbotron">
        <form action="<?php echo site_url('regis'); ?>" method="post">
            <div class="form-group">
                <img src="<?php echo base_url('assets/image/email.png'); ?>" class="boxemaildaftar" alt="Email">
                <input type="text" class="emaildaftar" id="Email" name="email" placeholder="email" required>
                <div class="text-danger" style="position: absolute; top: 140px; left: 500px;">
                    <?php echo form_error('email', '<div class="error bg-white">', '</div>'); ?>
                </div>
            </div>
            <div class="form-group">
                <img src="<?php echo base_url('assets/image/uname.png'); ?>" class="boxusernamedaftar" alt="Username">
                <input type="text" class="usernamedaftar" id="Username" name="username" placeholder="username" required>
                <div class="text-danger" style="position: absolute; top: 210px; left: 500px;">
                    <?php echo form_error('username', '<div class="error bg-white">', '</div>'); ?>
                </div>
            </div>
            <div class="form-group">
                <img src="<?php echo base_url('assets/image/uname.png'); ?>" class="boxpassdaftar" alt="nama">
                <input type="text" class="passdaftar" id="nama" name="nama" placeholder="nama" required>
                <div class="text-danger" style="position: absolute; top: 287px; left: 500px;">
                    <?php echo form_error('nama', '<div class="error bg-white">', '</div>'); ?>
                </div>
            </div>
            <div class="form-group">
                <img src="<?php echo base_url('assets/image/pass.png'); ?>" class="boxpassdaftar2" alt="Password">
                <input type="password" class="passdaftar2" id="password" name="password" placeholder="password" required>
                <div class="text-danger" style="position: absolute; top: 360px; left: 500px;">
                    <?php echo form_error('password', '<div class="error bg-white">', '</div>'); ?>
                </div>
            </div>
            <div class="form-group">
                <img src="<?php echo base_url('assets/image/alamat.png'); ?>" class="boxalamatdaftar" alt="address">
                <input type="text" class="alamatdaftar" id="address" name="alamat" placeholder="alamat malang" required>
                <div class="text-danger" style="position: absolute; top: 430px; left: 500px;">
                    <?php echo form_error('alamat', '<div class="error bg-white">', '</div>'); ?>
                </div>
            </div>
            <div class="daerah" style="">
                <select class="" id="kelurahanSelect" name="kelurahan" tabindex="1">
                    <option value="0">Pilih kelurahan</option>
                    <?php foreach ($kelurahan->result() as $value) : ?>
                    <option value="<?php echo $value->id_kelurahan; ?>"><?php echo $value->nama; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <img src="<?php echo base_url('assets/image/kecamatan.png'); ?>" class="boxcamatdaftar">
            <p type="text" id="kecamatanOption" class="camatdaftar" placeholder="kecamatan" style="font-size: 2em">Kecamatan</p>
            <input type="hidden" name="kecamatan" id="idKecamatan">
            <input class="boxdaftar" type="submit" value="Daftar.">
        </form>
        <a class="punyaakun" href="<?php echo site_url('login'); ?>">sudah punya akun? login disini</a>
    </div>
    
    <script src="<?php echo base_url('vendors/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/popper.js/dist/umd/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/chosen/chosen.jquery.min.js'); ?>"></script>

    <script type="text/javascript">
        $(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Maaf, data tidak ditemukan!",
            width: "100%"
        });
    </script>

    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
    <script type="text/javascript">
        $(window).on("load", () => {
            $(document).ready(() => {
                App.init()
            })
        })
    </script>

</body>

</html> 
