<div class="card">
    <div class="card-header">
        <h3>Ubah Calon Ketua</h3>
    </div>
    <div class="card-body">
        <?= form_open_multipart('/Auth_Admin/Ketua/ubahKetua/'.$ketua->calon_ketua_id) ?>
            <div class="form-group">
                <label for="nama">Nama Calon Ketua</label>
                <input type="text" name="nama" class="form-control" value="<?= $ketua->calon_ketua_nama ?>">
                <div style="color: red"><?= form_error('nama') ?></div>
            </div>
            <div class="form-group">
                <label for="nourut">Nomor Urut Calon Ketua</label>
                <input type="text" name="nourut" class="form-control" value="<?= $ketua->calon_ketua_nourut ?>">
                <div style="color: red"><?= form_error('nourut') ?></div>
            </div>
            <div class="form-group">
                <label for="tema">Jenis Pemilihan</label>
                <select name="jenis" id="" class="form-control">
                    <option value="<?= $ketua->tema_id ?>"><?= $ketua->tema_nama ?></option>
                    <?php
                    foreach($tema as $t) {
                        echo "<option value=".$t['tema_id'].">".$t['tema_nama']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="foto">Foto Calon Ketua</label><br>
                <img src="<?= base_url('/assets/img/'.$ketua->calon_ketua_foto) ?>" width="100" alt="" class="img-thumbnail"><br>
                <input type="file" name="foto">
            </div>
            <div class="form-group">
                <label for="visimisi">Visi dan Misi</label>
                <textarea name="visimisi" id="summernote"><?= $ketua->calon_ketua_visimisi ?></textarea>
            </div>
            <input type="submit" class="btn btn-md btn-primary" value="Simpan" name="ubah_ketua">
        <?= form_close() ?>
    </div>
</div>