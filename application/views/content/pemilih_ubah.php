<div class="card">
    <div class="card-header">
        <h4>Ubah Pemilih</h4>
    </div>
    <div class="card-body">
        <?= form_open('/Auth_Admin/Pemilih/ubahPemilih/'.$pemilih['pemilih_id']) ?>
            <div class="form-group">
                <label for="nopemilih">Nomor Pemilih</label>
                <input type="text" name="nopemilih" class="form-control" value="<?= $pemilih['pemilih_nomor'] ?>">
                <div style="color:red"><?= form_error('nopemilih') ?></div>
            </div>
            <div class="form-group">
                <label for="namapemilih">Nama Pemilih</label>
                <input type="text" name="namapemilih" class="form-control" value="<?= $pemilih['pemilih_nama'] ?>">
                <div style="color:red"><?= form_error('namapemilih') ?></div>
            </div>
            <div class="form-group">
                <label for="verifikasi">Status Verifikasi</label><br>
                <input type="radio" name="verifikasi" value="0"<?php if($pemilih['pemilih_verifikasi'] == 0){echo "checked";} ?>> <label>Belum Verifikasi</label>
                <input type="radio" name="verifikasi" value="1"<?php if($pemilih['pemilih_verifikasi'] == 1){echo "checked";} ?>> <label>Sudah Verifikasi</label>
            </div>
            <div class="form-group">
                <label for="verifikasi">Status Memilih</label><br>
                <input type="radio" name="memilih" value="0"<?php if($pemilih['pemilih_status'] == 0){echo "checked";} ?>> <label>Belum Memilih</label>
                <input type="radio" name="memilih" value="1"<?php if($pemilih['pemilih_status'] == 1){echo "checked";} ?>> <label>Sudah Memilih</label>
            </div>
            <input type="submit" class="btn btn-md btn-primary" value="Simpan" name="ubah-pemilih">
        <?= form_close() ?>
    </div>
</div>