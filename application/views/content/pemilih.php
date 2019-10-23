<div class="card">
    <div class="card-header">
        <h4>Daftar Pemilih</h4>
    </div>
    <div class="card-body">
        <?php if($user['role_id'] == 1) { ?>
        <a href="<?= base_url('/Auth_Admin/Pemilih/tambahPemilih') ?>" class="btn btn-sm btn-primary">Tambah Pemilih</a>
        <a href="<?= base_url('/Auth_Admin/Pemilih/resetPemilih') ?>" class="btn btn-sm btn-warning">Reset Pemilih</a>
        <?php } else {} ?>
        <br><br>
        <table class="table table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th>Nomor Pemilih</th>
                    <th>Nama Pemilih</th>
                    <th>Status Verifikasi</th>
                    <th>Status Memilih</th>
                    <?php if($user['role_id'] == 1) { ?>
                    <th>Aksi</th>
                    <?php } else {} ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pemilih as $p) { ?>
                    <tr>
                        <td><?= $p['pemilih_nomor'] ?></td>
                        <td><?= $p['pemilih_nama'] ?></td>
                        <td>
                            <?php
                            if($p['pemilih_verifikasi'] == 0) {
                            ?>
                                <?php if($user['role_id'] == 3) {
                                    echo "Belum Diverifikasi";
                                }  else { ?>
                                <a href="<?= base_url('/Auth_Admin/Pemilih/pemilihVerifikasi/'.$p['pemilih_id']) ?>" class="btn btn-sm btn-primary">Verifikasi</a>
                            <?php
                                } 
                            } else {
                                echo "Sudah Diverifikasi";
                            }
                            ?>
                        </td>
                        <td>
                        <?php
                            if($p['pemilih_status'] == 0) {
                                echo 'Belum memilih';
                            } else {
                                echo "Sudah memilih";
                            }
                            ?>
                        </td>
                        <?php if($user['role_id'] == 1) { ?>
                        <td>
                            <a href="<?= base_url('/Auth_Admin/Pemilih/ubahPemilih/'.$p['pemilih_id']) ?>" class="btn btn-sm btn-warning">Ubah</a>
                            <a href="<?= base_url('/Auth_Admin/Pemilih/hapusPemilih/'.$p['pemilih_id']) ?>" class="btn btn-sm btn-danger tombol-hapus">Hapus</a>
                        </td>
                        <?php } else {} ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
    </div>
</div>