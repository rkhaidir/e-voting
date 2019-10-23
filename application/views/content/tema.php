<div class="card">
    <div class="card-header">
        <h4>Daftar Tema Pemilihan</h4>
    </div>
    <div class="card-body">
        <a href="<?= base_url('/Auth_Admin/Tema/tambahTema') ?>" class="btn btn-sm btn-primary">Tambah Tema Pemilihan</a>
        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th>Nama Tema</th>
                    <th>Batas Pemilihan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($tema as $t) { ?>
                    <tr>
                        <td><?= $t['tema_nama'] ?></td>
                        <td><?= date('m-d-Y h:i A', $t['tema_batas'])?></td>
                        <td>
                            <?php
                            if($t['tema_is_active'] == 0) {
                                ?>
                                <a href="<?= base_url('/Auth_Admin/Tema/activeTema/'.$t['tema_id']) ?>" class="btn btn-sm btn-success">Aktifkan Tema</a>
                                <?php
                            } else {
                                ?>
                                <a href="<?= base_url('/Auth_Admin/Tema/activeTema/'.$t['tema_id']) ?>" class="btn btn-sm btn-danger">Non-Aktifkan Tema</a>
                                <?php
                            }
                            ?>
                        </td>
                        <td>
                            <a href="<?= base_url('/Auth_Admin/Tema/ubahTema/'.$t['tema_id']) ?>" class="btn btn-sm btn-warning">Ubah</a>
                            <a href="<?= base_url('/Auth_Admin/Tema/hapusTema/'.$t['tema_id']) ?>" class="btn btn-sm btn-danger tombol-hapus">Hapus</a>
                        </td>
                    </tr>
                <?php } ?> 
            </tbody>
        </table>
    </div>
</div>