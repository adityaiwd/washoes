<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <table class="table ">
                            <thead>
                                <th>No</th>
                                <th>Identitas</th>
                                <th>Kecamatan</th>
                                <th>Harga</th>
                            </thead>
                            <tbody>
                                <?php 
								$row = 0;
								foreach ($kecamatan->result() as $value) :
									$row++;
									?>
                                <tr>
                                    <td>
                                        <?php echo $row; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->id_kecamatan; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->nama; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->harga; ?>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>No</th>
                                <th>Kelurahan</th>
                                <th>ID Kecamatan</th>
                                <th>ID Kelurahan</th>
                                <th>Harga</th>
                            </thead>
                            <tbody>
                                <?php 
								$row = 0;
								foreach ($kelurahan->result() as $value) :
									$row++;
									?>
                                <tr>
                                    <td>
                                        <?php echo $row; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->nama; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->id_kelurahan; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->id_kecamatan; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->harga; ?>
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
        </div>
    </div>
</div> 
