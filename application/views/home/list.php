    <section class="h-100">
        <div class="container">
            <div class="content mt-3 mb-4">
                <div class="animated fadeIn">
                    <div class="text-center mb-5 mt-3">
                        <h1>Jenis Layanan</h1>
                    </div>
                    <div class="row justify-content-center">
                        <?php foreach ($load->result() as $value) : ?>
                        <div class="col-lg-3 mr-5">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="<?php echo base_url('assets/image/cleaner.jpg'); ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $value->nama; ?></h5>
                                    <p class="card-text"><?php echo $value->deskripsi; ?></p>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <h4>Rp. <?php echo $value->harga; ?></h4>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section> 
