<div class="container">
    <h4 class="text-center mt-5 text-light">Silahkan Lakukan Pemilihan</h4>
    <div class="row justify-content-center mt-5">
        
        <?php foreach($tema as $t) { ?>
        <div class="col-4">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body text-center">
                    <h4 class="card-title"><?= $t['tema_nama'] ?></h4>

                    <?php
                    $query = $this->db->get_where('tb_suara', ['pemilih_id' => $user, 'tema_id' => $t['tema_id']]);
                    $cek = $query->num_rows();
                    if($cek > 0) {
                        echo "Sudah Memilih";
                    } else {
                    ?>
                    <a href="<?= base_url('PemilihAuth/pemilihMemilih/'.$t['tema_id']) ?>" class="btn btn-lg btn-primary">Pilih</a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>