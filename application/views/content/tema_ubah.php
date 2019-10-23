<div class="card">
    <div class="card-header">
        Ubah Tema Pemilihan
    </div>
    <div class="card-body">
        <?= form_open_multipart('/Auth_Admin/Tema/ubahTema/'.$tema['tema_id']) ?>
            <div class="form-group">
                <label for="">Nama Tema</label>
                <input type="text" name="nama" class="form-control" value="<?= $tema['tema_nama']?>">
                <div style="color: red"><?= form_error('nama') ?></div>
            </div>
            <div class="form-group">
                <label for="">Batas Pemilihan</label>
                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="date" value="<?= date('m/d/Y h:i A', $tema['tema_batas']) ?>"/>
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
                <div style="color: red"><?= form_error('date') ?></div>
            </div>
            <div class="form-group">
                <label for="foto">Logo</label><br>
                <img src="<?= base_url('/assets/img/'.$tema['tema_logo']) ?>" width="100" alt="" class="img-thumbnail"><br>
                <input type="file" name="foto">
            </div>
            <input type="submit" name="simpan-tema" class="btn btn-md btn-primary" value="Simpan">
        <?= form_close() ?>
    </div>
</div>