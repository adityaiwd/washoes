<div class="content mt-5" >
    <div class="row">
        <div class="col-lg-9 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <?php $profile = $user[0]; ?>
                        <div class="col-lg-10">
                            <form>
                                <p>Nama : <?php echo $profile->nama; ?></p>
                                <p>Username : <?php echo $profile->username; ?></p>
                                <p>Email : <?php echo $profile->email; ?></p>
                                <p>Alamat : <?php echo $profile->alamat . " " . $profile->kelurahan . " " . $profile->kecamatan ?></p>
                            </form>
						</div>
						<div class="col-lg-2">
						<a class="btn btn-danger" href="<?php echo site_url('die'); ?>">Logout</a>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="row">
        <div class="col-lg-9 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col p-1 mx-auto">
                            <h3 class="text-center">Riwayat Pencucian</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col p-3">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Order ID</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
									$no = 0;
									foreach ($order as $key => $value) :
										$no++; ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $order[$key]->id_order; ?></td>
                                        <td><?php echo $order[$key]->status; ?></td>
                                        <td><?php echo $order[$key]->tanggal; ?></td>
                                        <td><?php echo $order[$key]->total_harga; ?></td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
