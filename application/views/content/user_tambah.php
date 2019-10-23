<div class="card">
    <div class="card-header">
        <h4>Tambah User</h4>
    </div>
    <div class="card-body">
        <?= form_open('/Auth_Admin/UserAuth/tambahUser') ?>
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" class="form-control" name="nama" value="<?= set_value('nama') ?>">
                <div style="color: red"><?= form_error('nama') ?></div>
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" class="form-control" name="username" value="<?= set_value('username') ?>">
                <div style="color: red"><?= form_error('username') ?></div>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" class="form-control" id="">
                    <option value="">---</option>
                    <?php foreach($role as $r) {?>
                        <option value="<?= $r['role_id'] ?>"><?= $r['role_name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
                <div style="color: red"><?= form_error('role') ?></div>
            </div>
            <input type="submit" value="Simpan" name="simpan-user" class="btn btn-md btn-primary">
        <?= form_close() ?>
    </div>
</div>