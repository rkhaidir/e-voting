<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Hasil_Suara_Pemilihan.xlsx");
	?>
    <div class="container"> 
        <center>
            <h4><?= $tema['tema_nama'] ?></h4>
        </center>
        <br>
        <br>
        <table border="1">
                <tr>
                    <th>Nama Pemilih</th>
                    <th>Jumlah Suara yang diperoleh</th>
                </tr>
            <?php foreach($suara as $s) { ?>
                <tr>
                    <td><?= $s['calon_ketua_nourut'].". ".$s['calon_ketua_nama'] ?></td>
                    <td><?= $s['calon_ketua_suara'] ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>