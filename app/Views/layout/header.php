<?php

use App\Models\Konfigurasi_model;
use App\Models\Menu_model;

$konfigurasi  = new Konfigurasi_model;
$menu         = new Menu_model();
$site         = $konfigurasi->listing();
$menu_berita  = $menu->berita();
$menu_profil  = $menu->profil();
$menu_layanan  = $menu->layanan();
?>
<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center fixed-top">
  <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
    <div class="align-items-center d-none d-md-flex">
      <i class="fa fa-home"></i> <?php echo tagline(); ?>
    </div>
    <div class="d-flex align-items-center">
      <i class="bi bi-phone"></i> <?php echo telepon() ?>
    </div>
  </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">

    <a href=" <?php echo base_url('') ?>" class="logo me-auto"><img src="<?php echo base_url('assets/upload/image/' . $site['logo']) ?>" alt="<?php echo $site['namaweb'] ?>"></a>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <h1 class="logo me-auto"><a href="index.html">Angel Group Indonesia</a></h1> -->

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto " href="<?php echo base_url() ?>">Home</a></li>
        <li class="dropdown"><a href="#"><span>Profile</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <?php foreach ($menu_profil as $menu_profil) { ?>
              <li><a href="<?php echo base_url('profile/' . $menu_profil['slug_berita']) ?>"><?php echo $menu_profil['judul_berita'] ?></a></li>
            <?php } ?>
            <!-- <li><a href="<?php echo base_url('staff') ?>">Our Team</a></li> -->
          </ul>
        </li>

        <li class="dropdown"><a href="<?php echo base_url('news') ?>"><span>News</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <?php foreach ($menu_berita as $menu_berita) { ?>
              <li><a href="<?php echo base_url('news/' . $menu_berita['slug_kategori']) ?>"><?php echo $menu_berita['nama_kategori'] ?></a></li>
            <?php } ?>
          </ul>
        </li>
        <!--  <li class="dropdown"><a href="#"><span>Service</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <?php foreach ($menu_layanan as $menu_layanan) { ?>
              <li><a href="<?php echo base_url('news/layanan/' . $menu_layanan['slug_berita']) ?>"><?php echo $menu_layanan['judul_berita'] ?></a></li>
            <?php } ?>
          </ul>
        </li> -->

        <li class="dropdown"><a href="#"><span>Gallery &amp; Video</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="<?php echo base_url('galeri') ?>">Image Gallery</a></li>
            <li><a href="<?php echo base_url('video') ?>">Video Gallery</a></li>
          </ul>
        </li>
        <!-- <li><a class="nav-link scrollto" href="<?php echo base_url('download') ?>">Download</a></li> -->
        <li><a class="nav-link scrollto" href="<?php echo base_url('contact') ?>">Contact Us</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

    <!-- <a href="<?php echo base_url('login') ?>" class="appointment-btn scrollto">
      Login <span class="d-none d-md-inline">Admin</span>
    </a> -->

  </div>
</header><!-- End Header -->