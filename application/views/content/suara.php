<h3>Hasil Suara Pemilihan</h3>

<div class="card">
    <div class="card-header">
        <h5>Daftar Jenis Pemilihan</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Pemilihan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach($tema as $t) { ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $t['tema_nama'] ?></td>
                        <td>
                            <a href="<?= base_url('/Auth_Admin/Suara/detailSuara/'.$t['tema_id']) ?>" class="btn btn-sm btn-success">Detail</a>
                        </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>
    </div>
</div>