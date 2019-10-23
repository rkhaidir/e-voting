<div class="container">
    <h4 class="text-center mt-3 text-light">Silahkan Lakukan Pemilihan</h4>
    <div class="row justify-content-center mt-2">
        
        <?php foreach($calon as $c) { ?>
        <div class="col-4">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body text-center">
                    <h4 class="card-title"><?= $c['calon_ketua_nourut'] ?></h4>
                    <a href="<?= base_url('PemilihAuth/memilih/'.$c['calon_ketua_id']) ?>"><img src="<?= base_url('/assets/img/'.$c['calon_ketua_foto']) ?>" alt="" class="img-thumbnail" width="200"></a>
                    <hr>
                    <h4 class="card-title"><?= $c['calon_ketua_nama'] ?></h4>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>