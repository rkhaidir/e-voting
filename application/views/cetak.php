<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Suara</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/css/sb-admin-2.min.css">
</head>
<body>
    <div class="container">
        <div class="card mt-3 mb-3">
            <div class="m-5">
                <h4 class="text-center mt-4"><?= $tema['tema_nama'] ?></h4>
                <br><br>
                <b>DATA PEMILIHAN</b>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Uraian</th>
                            <th width="100">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>DATA PEMILIH YANG TERDAFTAR</td>
                            <td><?= $countall ?></td>
                        </tr>
                        <tr>
                            <td>DATA PEMILIH YANG MELAKUKAN PEMILIHAN</td>
                            <td><?= $count ?></td>
                        </tr>
                    </tbody>
                </table>
                <br><br><br>
                <b>DATA PEROLEHAN SUARA CALON</b>
                <table class="table table-bordered">
                    <thead>
                        <th>NAMA CALON</th>
                        <th width="400">JUMLAH SUARA DIPEROLEH</th>
                    </thead>
                    <tbody>
                        <?php foreach($suara as $s) { ?>
                            <tr>
                                <td><?= $s['calon_ketua_nourut'].". ".$s['calon_ketua_nama'] ?></td>
                                <td class="text-center"><?= $s['calon_ketua_suara'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <br><br><br>
                <b>KELOMPOK PENYELENGGARA PEMUNGUTAN SUARA</b>
                <table class="table table-bordered text-center">
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>KETUA</td>
                        <td>ANGGOTA</td>
                        <td>ANGGOTA</td>
                        <td>ANGGOTA</td>
                        <td>ANGGOTA</td>
                    </tr>
                    <tr>
                        <td><br><br><p>(..................................)</p></td>
                        <td><br><br><p>(..................................)</p></td>
                        <td><br><br><p>(..................................)</p></td>
                        <td><br><br><p>(..................................)</p></td>
                        <td><br><br><p>(..................................)</p></td>
                    </tr>
                </table>
                <br><br>
                <b>SAKSI</b>
                <table class="table table-bordered">
                    <tr>
                        <td>Nama Lengkap Saksi : <br><br> .....................................</td>
                        <td>Nama Lengkap Saksi : <br><br> .....................................</td>
                        <td>Nama Lengkap Saksi : <br><br> .....................................</td>
                        <td>Nama Lengkap Saksi : <br><br> .....................................</td>
                        <td>Nama Lengkap Saksi : <br><br> .....................................</td>
                    </tr>
                    <tr class="text-center">
                        <td><br><br></td>
                        <td><br><br></td>
                        <td><br><br></td>
                        <td><br><br></td>
                        <td><br><br></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>assets/vendor/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>assets/vendor/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>assets/vendor/js/sb-admin-2.min.js"></script>
</body>
</html>