<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Admin') ?>">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-vote-yea"></i>
  </div>
  <div class="sidebar-brand-text mx-3">E-voting</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="<?= base_url('/Auth_Admin/Beranda') ?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Beranda</span></a>
</li>

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="<?= base_url('/Auth_Admin/Ketua') ?>">
    <i class="fas fa-user-tie"></i>
    <span>Calon Ketua</span></a>
</li>

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="<?= base_url('/Auth_Admin/Pemilih') ?>">
    <i class="fas fa-users"></i>
    <span>Pemilih</span></a>
</li>

<hr class="sidebar-divider d-none d-md-block">
<?php if($user['role_id'] == 1 || $user['role_id'] == 3) { ?>
<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="<?= base_url('/Auth_Admin/Suara') ?>">
    <i class="fas fa-chart-bar"></i>
    <span>Hasil Suara Pemilihan</span></a>
</li>
<?php } if ($user['role_id'] == 1) { ?>
<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="<?= base_url('/Auth_Admin/Tema') ?>">
    <i class="fas fa-vote-yea"></i>
    <span>Tema Pemilihan</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="<?= base_url('/Auth_Admin/UserAuth') ?>">
    <i class="fas fa-user"></i>
    <span>User Management</span></a>
</li>

<hr class="sidebar-divider d-none d-md-block">
<?php }?>
<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->