<div class="card">
    <div class="card-header">
        <h3>Tambah Pemilih</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <?= form_open('/Auth_Admin/Pemilih/tambahPemilih') ?>
                    <div class="form-group">
                        <label for="nopemilih">Nomor Pemilih</label>
                        <input type="text" name="nopemilih" class="form-control" value="<?= set_value('nopemilih') ?>">
                        <div style="color:red"><?= form_error('nopemilih') ?></div>
                    </div>
                    <div class="form-group">
                        <label for="namapemilih">Nama Pemilih</label>
                        <input type="text" name="namapemilih" class="form-control" value="<?= set_value('namapemilih') ?>">
                        <div style="color:red"><?= form_error('namapemilih') ?></div>
                    </div>
                    <input type="submit" class="btn btn-md btn-primary" value="Simpan" name="simpan-pemilih">
                <?= form_close() ?>
            </div>
            <div class="col-md-6">
                <div class="card-title"><h5>Import Excel</h5></div>
                <a href="<?= base_url() ?>/assets/template/template_data_pemilih.xlsx" class="btn btn-sm btn-success">Download Template Excel</a><br><br>
                <?= form_open_multipart('/Auth_Admin/Pemilih/importExcel') ?>
                    <div class="form-group">
                        <label for="fileexcel">Import File Excel</label>
                        <input type="file" name="fileexcel">
                        <div style="color:red"><?= form_error('fileexcel') ?></div>
                        <input type="checkbox" name="hapus" value="1"> <label for="">Hapus Semua Data</label>
                    </div>
                    <input type="submit" name="import-excel" class="btn btn-md btn-primary" value="Import Excel">
                <?= form_close() ?>
            </div>
        </div>
        
    </div>
</div>