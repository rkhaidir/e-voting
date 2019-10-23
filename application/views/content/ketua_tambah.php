<div class="card">
    <div class="card-header">
        <h3>Tambah Calon Ketua</h3>
    </div>
    <div class="card-body">
        <?= form_open_multipart('/Auth_Admin/Ketua/tambahKetua') ?>
            <div class="form-group">
                <label for="nama">Nama Calon Ketua</label>
                <input type="text" name="nama" class="form-control" value="<?= set_value('nama') ?>">
                <div style="color: red"><?= form_error('nama') ?></div>
            </div>
            <div class="form-group">
                <label for="nourut">Nomor Urut Calon Ketua</label>
                <input type="text" name="nourut" class="form-control" value="<?= set_value('nourut') ?>">
                <div style="color: red"><?= form_error('nourut') ?></div>
            </div>
            <div class="form-group">
                <label for="tema">Jenis Pemilihan</label>
                <select name="jenis" id="" class="form-control">
                    <option value="">------</option>
                    <?php
                    foreach($tema as $t) {
                        echo "<option value=".$t['tema_id'].">".$t['tema_nama']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="foto">Foto Calon Ketua</label><br>
                <input type="file" name="foto">
            </div>
            <div class="form-group">
                <label for="visimisi">Visi dan Misi</label>
                <textarea name="visimisi" id="summernote"><?= set_value('visimisi') ?></textarea>
            </div>
            <input type="submit" class="btn btn-md btn-primary" value="Simpan" name="simpan_ketua">
        <?= form_close() ?>
    </div>
</div>