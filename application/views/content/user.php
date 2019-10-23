<div class="card">
    <div class="card-header">
        <h4>User Management</h4>
    </div>
    <div class="card-body">
        <a href="<?= base_url('/Auth_Admin/UserAuth/tambahUser') ?>" class="btn btn-sm btn-primary">Tambah User</a>
        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($userdata as $u) { ?>
                    <tr>
                        <td><?= $u['admin_nama'] ?></td>
                        <td><?= $u['admin_username'] ?></td>
                        <td><?= $u['role_name'] ?></td>
                        <td>
                            <a href="<?= base_url('/Auth_Admin/UserAuth/resetUser/'.$u['admin_id']) ?>" class="btn btn-sm btn-success">Reset</a>
                            <a href="<?= base_url('/Auth_Admin/UserAuth/deleteUser'.$u['admin_id']) ?>" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>