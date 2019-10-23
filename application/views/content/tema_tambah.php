<div class="card">
    <div class="card-header">
        Tambah Tema Pemilihan
    </div>
    <div class="card-body">
        <?= form_open_multipart('/Auth_Admin/Tema/tambahTema') ?>
            <div class="form-group">
                <label for="">Nama Tema</label>
                <input type="text" name="nama" class="form-control">
                <div style="color: red"><?= form_error('nama') ?></div>
            </div>
            <div class="form-group">
                <label for="">Batas Pemilihan</label>
                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="date" value="<?= set_value('date'); ?>"/>
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
                <div style="color: red"><?= form_error('date') ?></div>
            </div>
            <div class="form-group">
                <label for="foto">Logo</label><br>
                <input type="file" name="foto">
            </div>
            <input type="submit" name="simpan-tema" class="btn btn-md btn-primary" value="Simpan">
        <?= form_close() ?>
    </div>
</div>