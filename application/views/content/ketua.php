<div class="card">
    <div class="card-header">
        <h3>Daftar Calon Ketua</h3>
    </div>
    <div class="card-body">
        <?php if($user['role_id'] == 1) { ?>
            <a href="<?= base_url('/Auth_Admin/Ketua/tambahKetua') ?>" class="btn btn-sm btn-primary">Tambah Calon Ketua</a>
        <?php } else {} ?>
        <br>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Calon Ketua</th>
                    <th width="30">Nomor Urut</th>
                    <th>Jenis Pemilihan</th>
                    <th>Foto</th>
                    <th>Detail</th>
                    <?php if($user['role_id'] == 1) { ?>
                    <th>Aksi</th>
                    <?php } else {} ?>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($ketua as $k) {
                ?>
                <tr>
                    <td><?= $k['calon_ketua_nama'] ?></td>
                    <td><?= $k['calon_ketua_nourut'] ?></td>
                    <td><?= $k['tema_nama'] ?></td>
                    <td><img src="<?= base_url('/assets/img/'.$k['calon_ketua_foto']) ?>" alt="" width="100" class="img-thumbnail"></td>
                    <td><a href="<?= base_url('/Auth_Admin/Ketua/detailKetua/'.$k['calon_ketua_id']) ?>" class="btn btn-sm btn-success">Detail</a></td>
                    <?php if($user['role_id'] == 1) { ?>
                    <td>
                        <a href="<?= base_url('/Auth_Admin/Ketua/ubahKetua/'.$k['calon_ketua_id']) ?>" class="btn btn-sm btn-warning">Ubah</a>
                        <a href="<?= base_url('/Auth_Admin/Ketua/hapusKetua/'.$k['calon_ketua_id']) ?>" class="btn btn-sm btn-danger tombol-hapus">Hapus</a>
                    </td>
                    <?php } else {} ?>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>