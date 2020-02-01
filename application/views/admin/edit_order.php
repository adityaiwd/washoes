<div class="content mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo site_url('doeditorder'); ?>" method="POST">
                            <?php $hasil = $result ?>
                            <div class="form-row">
                                <div class="form-group col-sm-4">
                                    <label>Nama User</label>
                                    <input type="text" class="form-control" value="<?php echo $hasil['nama'] ?>" readonly>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>Order ID</label>
                                    <input type="text" class="form-control" name="id_order" value="<?php echo $hasil['invoiceNumber'] ?>" readonly>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>Status</label>
                                    <select class="standardSelect" tabindex="1" name="status">
                                        <?php foreach ($status->result() as $st) : ?>
                                        <?php if ($st->stat == $hasil['status']) : ?>
                                        <option value="<?php echo $st->id_status ?>" selected="selected"><?php echo $st->stat; ?></option>
                                        <?php else : ?>
                                        <option value="<?php echo $st->id_status ?>"><?php echo $st->stat; ?></option>
                                        <?php endif ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" value="<?php echo $hasil['alamat']; ?>" readonly>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Kecamatan</label>
                                    <input type="text" class="form-control" value="<?php echo $hasil['kecamatan']; ?>" readonly>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Kelurahan</label>
                                    <input type="text" class="form-control" value="<?php echo $hasil['kelurahan']; ?>" readonly>
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table table-striped table-bordered" style="width : 100%">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Pesanan (id)</th>
                                                        <th scope="col">Nama Layanan</th>
                                                        <th scope="col">Harga</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
													$no = 0;
													foreach ($hasil['pesan'] as $key => $value) :
														$no++; ?>
                                                    <tr>
                                                        <td><?php echo $no; ?></td>
                                                        <td><?php echo $hasil['pesan'][$key]['id_layanan'] ?></td>
                                                        <td><?php echo $hasil['pesan'][$key]['nama'] ?></td>
                                                        <td class="text-right"><?php echo $hasil['pesan'][$key]['harga'] ?></td>
                                                    </tr>
                                                    <?php endforeach; ?>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Update</button>
							</div>
							<br>
							<br>
							<br>
							<br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
