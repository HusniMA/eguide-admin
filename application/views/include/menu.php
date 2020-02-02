<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-3">Admin</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item <?php if($this->uri->segment(1) == "index.php/home"){echo 'active';} ?>">
  <a class="nav-link" href="<?=base_url();?>index.php/home">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item <?php if($this->uri->segment(1) == "index.php/lokasi"){echo 'active';} ?>">
  <a class="nav-link" href="<?=base_url();?>index.php/lokasi">
    <i class="fas fa-fw fa-map-marked-alt"></i>
    <span>Lokasi</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item <?php if($this->uri->segment(1) == "index.php/wisata"){echo 'active';} ?>">
  <a class="nav-link" href="<?=base_url();?>index.php/wisata">
    <i class="fas fa-fw fa-hot-tub"></i>
    <span>Wisata</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item <?php if($this->uri->segment(1) == "index.php/penginapan"){echo 'active';} ?>">
  <a class="nav-link" href="<?=base_url();?>index.php/penginapan">
    <i class="fas fa-fw fa-hotel"></i>
    <span>Penginapan</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item <?php if($this->uri->segment(1) == "index.php/destinasi"){echo 'active';} ?>">
  <a class="nav-link" href="<?=base_url();?>index.php/destinasi">
    <i class="fas fa-fw fa-table"></i>
    <span>Destinasi</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item <?php if($this->uri->segment(1) == "index.php/rating"){echo 'active';} ?>">
  <a class="nav-link" href="<?=base_url();?>index.php/rating">
    <i class="fas fa-fw fa-star"></i>
    <span>Rating</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item <?php if($this->uri->segment(1) == "index.php/user"){echo 'active';} ?>">
  <a class="nav-link" href="<?=base_url();?>index.php/user">
    <i class="fas fa-fw fa-user"></i>
    <span>User</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->