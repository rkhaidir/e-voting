<div class="card">
    <div class="card-header">
        <h3>Verifikasi Pemilih</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <label for="">Nomor Pemilih</label>
            </div>
            <div class="col-md-1">:</div>
            <div class="col-md-3">
                <label for=""><?= $pemilih['pemilih_nomor'] ?></label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label for="">Nama Pemilih</label>
            </div>
            <div class="col-md-1">:</div>
            <div class="col-md-3">
                <label for=""><?= $pemilih['pemilih_nama'] ?></label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label for="">Status Pemilih</label>
            </div>
            <div class="col-md-1">:</div>
            <div class="col-md-3">
                <label for="">
                    <?php
                    if($pemilih['pemilih_status'] == 0) {
                        echo 'Belum memilih';
                    } else {
                        echo "Sudah memilih";
                    }
                    ?>
                </label>
            </div>
        </div>
        <?php
        if($pemilih['pemilih_verifikasi'] == 0) {
        ?>
            <a href="<?= base_url('/Auth_Admin/Pemilih/verifikasi/'.$pemilih['pemilih_id']) ?>" class="btn btn-sm btn-primary">Verifikasi</a>
        <?php
        } else {
            echo "Sudah Diverifikasi";
        }
        ?>
    </div>
</div>