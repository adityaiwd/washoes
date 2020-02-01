<div class="sitecontent">
    <div class="pesananlayout">
        <img src="<?php echo base_url('assets/image/carapesan.png'); ?>" class="carapesan">
        <p>cara memesan:</p>
    </div>
</div>
<div class="container-fluid" style="background-color: #252424">
    <div class="row">
        <div class="col col-lg-6 my-2 mx-auto">
            <div class="block">
                <div class="content bg-white p-4 mb-5">
                    <form>
                        <?php foreach ($users->result() as $value) : ?>
                        <label>Nama : </label>
                        <p class="text-dark" id="namaPesanan" data-id="<?php echo $value->id_user; ?>"><?php echo $value->nama; ?></p>
                        <label>Alamat : </label>
                        <p class="text-dark" id="alamatPesanan"><?php echo "{$value->alamat} {$value->kelurahan} {$value->kecamatan}" ?></p>
                        <?php endforeach ?>
                        <?php 
						$ongkos = 0;
						if ($value->pesanan % 3 == 0 && $value->pesanan > 0) {
							$ongkos = 0;
						} else {
							$ongkos = $value->kel_harga + $value->kec_harga;
						} ?>
                        <input type="hidden" value="<?php echo $ongkos; ?>" id="ongkos">
                        <br>
                        <div class="form-group">
                            <label>Jumlah Pasang Sepatu :
                                <select class="standardSelect" id="jmlSepatu" tabindex="1">
                                    <option value="0">Pilih</option>
                                    <?php for ($i = 1; $i <= 10; $i++) : ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?> Sepatu</option>
                                    <?php endfor; ?>
                                </select>
                            </label>
                        </div>
                        <div class="Sepatus"></div>
                        <hr>
                        <div class="text-dark">
                            <a class="btn btn-sm btn-primary text-white float-right" id="submitPesan">Proses Pembayaran</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
