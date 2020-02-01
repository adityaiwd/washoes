    <?php if ($this->session->flashdata('orderDel')) : ?>
    <div class="content mt-3">
        <div class="col-sm-12">
            <div class="alert alert-success alert-dismissible fade show">
                <?php echo $this->session->flashdata('orderDel'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
	<?php elseif ($this->session->flashdata('orderEdit')) : ?>
    <div class="content mt-3">
        <div class="col-sm-12">
            <div class="alert alert-success alert-dismissible fade show">
                <?php echo $this->session->flashdata('orderEdit'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php endif ?>
    <div class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 4%" scope="col">#</th>
                            <th style="width: 10%">Order ID</th>
                            <th style="width: 10%">User ID</th>
                            <th style="width: 10%">Status</th>
                            <th style="width: 10%">Tanggal</th>
                            <th style="width: 11%">Total Harga</th>
                            <th style="width: 20%">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
						foreach ($order as $obt) :
							$no++; ?>
                        <tr>
                            <td><?php echo ($no) ?></td>
                            <td><?php echo $obt->id_order ?></td>
                            <td name="uid"><?php echo $obt->id_user ?></td>
                            <td><?php echo $obt->status ?></td>
                            <td><?php echo $obt->tanggal ?></td>
                            <td class="text-right"><?php echo $obt->total_harga ?></td>
                            <td>
                                <a href="<?php echo site_url("editorder/{$obt->id_order}"); ?>" class="btn btn-info text-white">Edit</a>
								<button onClick="javascript:var str = '<?php echo $obt->id_order ;?>'; if(confirm('Apakah anda ingin menghapus order ' + str + '?')){document.location='<?php echo site_url("delorder/{$obt->id_order}/{$obt->id_user}"); ?>'}" class="btn btn-danger"></i>Hapus</button>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
				</table>
            </div>
			<br>
			<br>
			<br>
        </div>
    </div> 
