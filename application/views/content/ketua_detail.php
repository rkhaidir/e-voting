<h4>Detail <?= $ketua['calon_ketua_nama'] ?></h4>

<div class="card mb-3" style="max-width: 600px;">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="<?= base_url('/assets/img/'.$ketua['calon_ketua_foto']) ?>" class="card-img" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h4 class="card-title"><?= $ketua['calon_ketua_nourut'] ?>. <?= $ketua['calon_ketua_nama'] ?></h4>
                <h5 class="card-text"><?= $ketua['tema_nama'] ?></h5>
                <p class="card-text"><?= $ketua['calon_ketua_visimisi'] ?></p>
            </div>
        </div>
    </div>
</div>