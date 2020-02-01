<div class="container-fluid" style="background-color: #252424">
    <div class="row">
        <div class="col col-lg-6 my-2 mx-auto" >
            <div class="block">
                <div class="content bg-white p-4 mb-5 mt-5">
                    <?php $hasil = $result ?>
                    <form action="<?php echo site_url("pesanSekarang/{$hasil['id_user']}"); ?>" method="post">
                        <div class="row">
                            <div class="col col-md-8 mb-3">
                                <p class="text-dark">Your ID : <?php echo $hasil['id_user'] ?></p>
                                <p class="text-dark">Nama : <?php echo $hasil['nama'] ?></p>
                                <p class="text-dark">Alamat : <?php echo $hasil['alamat'] ?></p>
                                <p class="text-dark">Tanggal : <?php echo $hasil['tanggal'] ?></p>
                            </div>
                            <div class="col col-md-4 d-inline-flex">
                                No Invoice : &nbsp<h5 class="text-primary"><?php echo $hasil['invoiceNumber'] ?></h5>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Pesanan (id)</th>
                                    <th scope="col">Nama Layanan</th>
                                    <th scope="col">Harga</th>
                                </tr>
                            </thead>
                            <?php $no = 0;
							foreach ($hasil['pesan'] as $key => $value) :
								$no++; ?>
                            <tbody>
                                <tr>
                                    <td scope="row"><?php echo $no; ?></td>
                                    <td><?php echo $hasil['pesan'][$key]['id_layanan'] ?></td>
                                    <td><?php echo $hasil['pesan'][$key]['nama'] ?></td>
                                    <td class="text-right"><?php echo $hasil['pesan'][$key]['harga'] ?></td>
                                </tr>
                                <?php endforeach ?>
                                <tr>
                                    <td colspan="3" class="text-right">Layanan</td>
                                    <td class="text-right"><?php echo $hasil['layananTotal'] ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-right">Ongkos</td>
                                    <td class="text-right"><?php echo $hasil['ongkos'] ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-right">Total Harga</td>
                                    <td class="text-right"><?php echo $hasil['total'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col mt-2">
                                <input type="submit" class="btn btn-sm btn-outline-success float-right" value="Pesan Sekarang">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
