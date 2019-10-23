<h4>Hasil <?= $tema['tema_nama'] ?></h4>
<div class="card mb-5">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Jumlah Suara Masuk</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if(time() <= $tema['tema_batas']) {echo "disabled";} else { } ?>" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Hasil Suara Pemilihan</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h3 class="text-center mt-4">Jumlah Suara Masuk</h3>
                <h1 class="text-center mt-5 display-1"><?= $count ?></h1>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <a href="<?= base_url('Auth_Admin/Cetak/cetakPemilih/'.$tema['tema_id']) ?>" class="btn btn-sm btn-success"  target="__blank">Cetak Daftar Pemilih</a>
                <a href="<?= base_url('Auth_Admin/Cetak/cetakSuara/'.$tema['tema_id']) ?>" class="btn btn-sm btn-success" target="__blank">Cetak Hasil Pemilihan</a>
                <br>
                <br>
                <h3>Hasil Akhir</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Foto Calon</th>
                            <th>Nama Calon</th>
                            <th>Suara diperoleh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($suara as $s) { ?>
                            <tr>
                                <td><img src="<?= base_url('/assets/img/'.$s['calon_ketua_foto']) ?>" alt="" class="img-thumbnail" width="150"></td>
                                <td><h2><?= $s['calon_ketua_nourut'].". ".$s['calon_ketua_nama'] ?></h2></td>
                                <td><h2><?= $s['calon_ketua_suara'] ?></h2></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <br>
                <br>
                <h4>Grapik Hasil Suara Pemilihan</h4>
                <br>
                <!-- <canvas id="myPieChart"></canvas> -->
                <div id="piechart" width="400"></div>
            </div>
        </div>
    </div>
</div>