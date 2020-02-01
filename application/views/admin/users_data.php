<div class="content mt-3">
    <div class="container-fluid">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 4%" scope="col">#</th>
                        <th style="width: 10%">Username</th>
                        <th style="width: 10%">Nama</th>
                        <th style="width: 10%">Email</th>
                        <th style="width: 10%">Alamat</th>
                        <th style="width: 11%">Kelurahan</th>
                        <th style="width: 20%">Kecamatan</th>
                        <!-- <th style="width: 20%">Option</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;
					foreach ($user as $obj) :
						$no++; ?>
                    <tr>
                        <td><?php echo ($no) ?></td>
                        <td><?php echo $obj->username ?></td>
                        <td><?php echo $obj->nama ?></td>
                        <td><?php echo $obj->email ?></td>
                        <td><?php echo $obj->alamat ?></td>
                        <td><?php echo $obj->kelurahan ?></td>
                        <td><?php echo $obj->kecamatan ?></td>
                        <!-- <td>
                            <a href="<?php echo site_url("deluser/{$obj->id_user}"); ?>" class="btn btn-danger text-white">Delete</a>
                        </td> -->
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
