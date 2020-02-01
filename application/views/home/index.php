<?php if ($this->session->flashdata('pesanBerhasil')) : ?>
<div class="flash-data" data-flash="<?php echo $this->session->flashdata('pesanBerhasil'); ?>"></div>
<?php endif ?>
<?php if ($this->session->flashdata('invoiceInfo')) : ?>
<?php 
$var = $this->session->flashdata('invoiceInfo');
echo '<script>alert("' . $var .'")</script>'; ?>
<?php endif ?>
<!-- <span class="text-danger"><small><?php echo $this->session->flashdata('invoiceInfo') ?></small></span> -->
<div class="content">
    <div class="dashboardlayout">
        <p>"we clean shoes for a living."</p>
        <input type="submit" onclick="location.href='<?php echo site_url('pemesanan'); ?>'" value="Cuci Sekarang!">
    </div>
    <div class="dashboardlayout2" id="about">
        <img class="about" src="<?php echo base_url('assets/image/about.png'); ?>">
    </div>
    <div class="dashboardlayout3" id="pelayanan">
        <img class="layanan" src="<?php echo base_url('assets/image/layanan.png'); ?>">
    </div>
    <div class="dashboardlayout4" id="cekpesanan">
        <img class="qnacekpesan" src="<?php echo base_url('assets/image/qnacekpesan.png'); ?>">
        <img class="boxnopesan" src="<?php echo base_url('assets/image/nomorpesanan.png'); ?>">
        <form action="<?php echo site_url('cekInvoice'); ?>" method="get">
            <input type="text" class="col col-md-3 nopesan" name="invoice" maxlength="10" placeholder="Masukkan No. Invoice" required>
            <input type="submit" class="boxcekpesan" value="Cekidot">
        </form>
    </div>
</div> 
