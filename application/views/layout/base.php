<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This Project Made by Akira Digital Creative with CLIENT ID AWS005">
    <meta name="keywords" content="akira.id adalah softwarehouse terkemuka di dalam dunia digital yang fokus memberikan solusi bagi pelaku bisnis untuk transisi dalam dunia digital">
    <meta name="author" content="akira.id">
    <link rel="icon" href="<?=base_url()?>assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?=base_url()?>assets/images/favicon.png" type="image/x-icon">
    <title>LVA - ONEHOLDS | Akira System</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/vendors/slick.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/vendors/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/vendors/animate.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css">
    <link id="color" rel="stylesheet" href="<?=base_url()?>assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/responsive.css">
    <?php echo $css; ?>
  </head>
  <body> 
    <!-- loader starts-->
    <div class="loader-wrapper">
      <div class="loader-index"> <span></span></div>
      <svg>
        <defs></defs>
        <filter id="goo">
          <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
          <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
        </filter>
      </svg>
    </div>
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper modern-type" id="pageWrapper">
      <!-- Page Header Start-->
      <div class="page-header">
        <div class="header-wrapper row m-0">
          <!-- Logo -->
          <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper">
              <a href="<?=base_url()?>">
                <img class="img-fluid" src="<?=base_url()?>assets/images/logo/logo.png" alt="logohope" loading="lazy">
              </a>
            </div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
          </div>
          <!-- End Logo -->
          <div class="left-header col-xxl-5 col-xl-6 col-lg-5 col-md-4 col-sm-3 p-0">
            <div class="notification-slider">
              <div class="d-flex h-100"> <img src="<?=base_url()?>assets/images/giftools.gif" alt="gif">
                <h6 class="mb-0 f-w-400"><span class="font-primary">Hey, Founder! </span> <span class="f-light"> Welcome to Akira Creative System.</span></h6><i class="icon-arrow-top-right f-light"></i>
              </div>
              <div class="d-flex h-100"><img src="<?=base_url()?>assets/images/giftools.gif" alt="gif">
                <h6 class="mb-0 f-w-400"><span class="f-light">Regrats from me </span></h6><a class="ms-1" href="https://www.akira.id/" target="_blank">AKIRA Official !</a>
              </div>
            </div>
          </div>
          <div class="nav-right col-xxl-7 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
            <ul class="nav-menus">
              <!-- Dark Mode -->
              <li>
                <div class="mode">
                  <svg>
                    <use href="<?=base_url()?>assets/svg/icon-sprite.svg#moon"></use>
                  </svg>
                </div>
              </li>
              <!-- Notifikasi -->
              <!-- <li class="onhover-dropdown">
                <div class="notification-box">
                  <svg>
                    <use href="<?=base_url()?>assets/svg/icon-sprite.svg#notification"></use>
                  </svg>
                </div>
                <div class="onhover-show-div notification-dropdown">
                  <h6 class="f-18 mb-0 dropdown-title">Notifikasi</h6>
                  <ul>
                    <li class="b-l-primary border-4">
                      <p>Delivery processing <span class="font-danger">10 min.</span></p>
                    </li>
                    <li class="b-l-success border-4">
                      <p>Order Complete<span class="font-success">1 hr</span></p>
                    </li>
                    <li class="b-l-secondary border-4">
                      <p>Tickets Generated<span class="font-secondary">3 hr</span></p>
                    </li>
                    <li class="b-l-warning border-4">
                      <p>Delivery Complete<span class="font-warning">6 hr</span></p>
                    </li>
                    <li><a class="f-w-700" href="javascript:void(0)">Check all</a></li>
                  </ul>
                </div>
              </li> -->
              <li class="profile-nav onhover-dropdown pe-0 py-0">
                <div class="media profile-media">
                    <img class="b-r-10" src="<?=base_url()?>assets/images/dashboard/profile.png" alt="gambar-principle" loading="lazy">
                  <div class="media-body"><span><?php echo $this->session->userdata('nama_karyawan'); ?></span>
                    <p class="mb-0"> 
                      <?php echo $this->session->userdata('role_user'); ?>
                      <i class="middle fa fa-angle-down"></i>
                    </p>
                  </div>
                </div>
                <ul class="profile-dropdown onhover-show-div">
                  <!-- <li><a href="javascript:void(0)"><i data-feather="settings"></i><span>Pengaturan</span></a></li> -->
                  <li><a href="<?=base_url()?>logout/"><i data-feather="log-in"> </i><span>Keluar</span></a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Header Ends -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper" sidebar-layout="stroke-svg">
          <div>
            <div class="logo-wrapper">
                <a href="<?=base_url()?>">
                    <img class="img-fluid for-light" src="<?=base_url()?>assets/images/logo/logo.png" alt="logodeha">
                    <img class="img-fluid for-dark" src="<?=base_url()?>assets/images/logo/logo_dark.png" alt="logodeha">
                </a>
              <div class="back-btn"><i class="fa fa-angle-left"></i></div>
              <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
            </div>
            <div class="logo-icon-wrapper">
                <a href="<?=base_url()?>">
                    <img class="img-fluid" src="<?=base_url()?>assets/images/logo/logo-icon.png" alt="">
                </a>
            </div>
            <nav class="sidebar-main">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                  <li class="back-btn"><a href="<?=base_url()?>"><img class="img-fluid" src="<?=base_url()?>assets/images/logo/logo-icon.png" alt=""></a>
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                  </li>
                  <li class="pin-title sidebar-main-title">
                    <div> 
                      <h6>Pinned</h6>
                    </div>
                  </li>
                  <li class="sidebar-main-title">
                    <div>
                      <h6 class="lan-1">General</h6>
                    </div>
                  </li>
                  <!-- Menu Dashboard General -->
                  <li class="sidebar-list dash">
                    <i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav dash" href="<?=base_url()?>">
                    <svg class="stroke-icon">
                      <use href="<?=base_url()?>assets/svg/icon-sprite.svg#stroke-home"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="<?=base_url()?>assets/svg/icon-sprite.svg#fill-home"></use>
                    </svg><span>Home</span></a>
                  </li>
                  <!-- Menu Master Menu -->
                  <li class="sidebar-list master"><i class="fa fa-thumb-tack"></i>
                      <a class="sidebar-link sidebar-title master" href="javascript:void(0)">
                      <svg class="stroke-icon">
                        <use href="<?=base_url()?>assets/svg/icon-sprite.svg#stroke-animation"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="<?=base_url()?>assets/svg/icon-sprite.svg#fill-animation"></use>
                      </svg><span>Data Master</span></a>
                    <ul class="sidebar-submenu">
                      <li class="mag"><a class="mag" href="<?=base_url()?>master-agen">Master Agen</a></li>
                      <li class="mta"><a class="mta" href="<?=base_url()?>master-tipe-agen">Master Tipe Agen</a></li>
                      <li class="mbnk"><a class="mbnk" href="<?=base_url()?>master-bank">Master Bank</a></li>
                      <li class="mkar"><a class="mkar" href="<?=base_url()?>master-karyawan">Master Karyawan</a></li>
                      <li class="mtrl"><a class="mtrl" href="<?=base_url()?>master-material">Master Material</a></li>
                      <li class="msup"><a class="msup" href="<?=base_url()?>master-supplier">Master Supplier</a></li>
                      <li class="msize"><a class="msize" href="<?=base_url()?>master-size">Master Size Chart</a></li>
                    </ul>
                  </li>
                  <li class="sidebar-list katalog"><i class="fa fa-thumb-tack"></i>
                    <a class="sidebar-link sidebar-title katalog" href="javascript:void(0)">
                    <svg class="stroke-icon">
                      <use href="<?=base_url()?>assets/svg/icon-sprite.svg#stroke-gallery"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="<?=base_url()?>assets/svg/icon-sprite.svg#fill-gallery"></use>
                    </svg><span>Katalog</span></a>
                    <ul class="sidebar-submenu">
                      <li class="kbb"><a class="kbb" href="<?=base_url()?>katalog/buat-baru">Buat Baru</a></li>
                      <li class="kcon"><a class="kcon" href="<?=base_url()?>katalog/condiments">Condiments</a></li>
                      <li class="klva"><a class="klva" href="<?=base_url()?>katalog/daftar">Katalog LVA</a></li>
                    </ul>
                  </li>
                  <!-- <li class="sidebar-list customer"><i class="fa fa-thumb-tack"></i>
                    <a class="sidebar-link sidebar-title customer" href="javascript:void(0)">
                    <svg class="stroke-icon">
                      <use href="<?=base_url()?>assets/svg/icon-sprite.svg#stroke-user"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="<?=base_url()?>assets/svg/icon-sprite.svg#fill-user"></use>
                    </svg><span>Customer</span></a>
                    <ul class="sidebar-submenu">
                      <li class="cbb"><a class="cbb" href="<?=base_url()?>customer/buat-baru">Buat Baru</a></li>
                      <li class="cdac"><a class="cdac" href="<?=base_url()?>customer/daftar-customer">Daftar Customer</a></li>
                    </ul>
                  </li> -->
                  <!-- Menu Aplikasi-->
                  <li class="sidebar-main-title">
                    <div>
                        <h6 class="lan-8">Applications</h6>
                    </div>
                  </li>
                  <!-- Status Order -->
                  <li class="sidebar-list">
                    <i class="fa fa-thumb-tack"></i>
                    <a class="sidebar-link sidebar-title link-nav" href="index.html">
                        <svg class="stroke-icon">
                            <use href="<?=base_url()?>assets/svg/icon-sprite.svg#stroke-task"></use>
                        </svg>
                        <svg class="fill-icon">
                            <use href="<?=base_url()?>assets/svg/icon-sprite.svg#fill-task"></use>
                        </svg>
                        <span>Status Order</span>
                    </a>
                  </li>
                  <!-- Menu Penjualan -->
                  <li class="sidebar-list penjualan"><i class="fa fa-thumb-tack"></i>
                    <label class="badge badge-light-primary"></label>
                    <a class="sidebar-link sidebar-title penjualan" href="javascript:void(0)">
                        <svg class="stroke-icon">
                            <use href="<?=base_url()?>assets/svg/icon-sprite.svg#stroke-ecommerce"></use>
                        </svg>
                        <svg class="fill-icon">
                            <use href="<?=base_url()?>assets/svg/icon-sprite.svg#fill-ecommerce"></use>
                        </svg>
                        <span>Penjualan</span>
                    </a>
                    <ul class="sidebar-submenu">
                      <!-- <li><a href="<?=base_url()?>penjualan/data-customer">Data Customer</a></li> -->
                      <li class="pjor"><a class="pjor" href="<?=base_url()?>penjualan/kasir">Kasir Penjualan</a></li>
                      <li><a href="<?=base_url()?>penjualan/pengiriman">Pengiriman</a></li>
                      <li><a href="<?=base_url()?>penjualan/riwayat">Riwayat Penjualan</a></li>
                      <li><a href="<?=base_url()?>penjualan/transaksi">Transaksi Customer</a></li>
                    </ul>
                  </li>
                  <!-- Menu Pembelian -->
                  <li class="sidebar-list pembelian"><i class="fa fa-thumb-tack"></i>
                    <label class="badge badge-light-primary"></label>
                    <a class="sidebar-link sidebar-title pembelian" href="javascript:void(0)">
                        <svg class="stroke-icon">
                            <use href="<?=base_url()?>assets/svg/icon-sprite.svg#stroke-social"></use>
                        </svg>
                        <svg class="fill-icon">
                            <use href="<?=base_url()?>assets/svg/icon-sprite.svg#fill-social"></use>
                        </svg>
                        <span>Pembelian</span>
                    </a>
                    <ul class="sidebar-submenu">
                      <li class="pbm"><a class="pbm" href="<?=base_url()?>pembelian/pembelian-material">Pembelian Material</a></li>
                      <!-- <li class="prm"><a class="prm" href="<?=base_url()?>pembelian/print-material">Printing Material</a></li> -->
                    </ul>
                  </li>                  
                  <!-- Menu Produksi -->
                  <li class="sidebar-list produksi"><i class="fa fa-thumb-tack"></i>
                    <label class="badge badge-light-primary"></label>
                    <a class="sidebar-link sidebar-title produksi" href="javascript:void(0)">
                        <svg class="stroke-icon">
                            <use href="<?=base_url()?>assets/svg/icon-sprite.svg#stroke-board"></use>
                        </svg>
                        <svg class="fill-icon">
                            <use href="<?=base_url()?>assets/svg/icon-sprite.svg#fill-board"></use>
                        </svg>
                        <span>Produksi</span>
                    </a>
                    <ul class="sidebar-submenu">
                      <li class="prb"><a class="prb" href="<?=base_url()?>produksi/order-baru">Order Baru</a></li>
                      <li class="prj"><a class="prj" href="<?=base_url()?>produksi/proses-jahit">Proses Jahit</a></li>
                      <li class="prf"><a class="prf" href="<?=base_url()?>produksi/finishing">Finishing</a></li>
                      <li class="prs"><a class="prs" href="<?=base_url()?>produksi/stok">Stok</a></li>
                    </ul>
                  </li>
                  <!-- Menu Gudang -->
                  <li class="sidebar-list gudang"><i class="fa fa-thumb-tack"></i>
                    <label class="badge badge-light-primary"></label>
                    <a class="sidebar-link sidebar-title gudang" href="javascript:void(0)">
                        <svg class="stroke-icon">
                            <use href="<?=base_url()?>assets/svg/icon-sprite.svg#stroke-widget"></use>
                        </svg>
                        <svg class="fill-icon">
                            <use href="<?=base_url()?>assets/svg/icon-sprite.svg#fill-widget"></use>
                        </svg>
                        <span>Gudang</span>
                    </a>
                    <ul class="sidebar-submenu">
                      <li class="gdlva"><a class="gdlva" href="<?=base_url()?>gudang/lva">Gudang LVA</a></li>
                      <li class="gdldp"><a class="gdldp" href="<?=base_url()?>gudang/ldp">Gudang LDP</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </nav>
          </div>
        </div>

        <?=$content;?>

        <?=$modal;?>

        <!-- footer start-->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 footer-copyright text-center">
                <p class="mb-0">Copyright <span class="copyright-year"></span> © touch by AKIRA DIGITAL CREATIVE | akira.id</p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="<?=base_url()?>assets/js/jquery-3.6.0.min.js"></script>
    <?php echo $js; ?>
    <!-- latest jquery-->
    <!-- Bootstrap js-->
    <script src="<?=base_url()?>assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="<?=base_url()?>assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="<?=base_url()?>assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <script src="<?=base_url()?>assets/js/scrollbar/simplebar.js"></script>
    <script src="<?=base_url()?>assets/js/scrollbar/custom.js"></script>
    <!-- Sidebar jquery-->
    <script src="<?=base_url()?>assets/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="<?=base_url()?>assets/js/sidebar-menu.js"></script>
    <script src="<?=base_url()?>assets/js/sidebar-pin.js"></script>
    <script src="<?=base_url()?>assets/js/slick/slick.min.js"></script>
    <script src="<?=base_url()?>assets/js/slick/slick.js"></script>
    <script src="<?=base_url()?>assets/js/header-slick.js"></script>
    <script src="<?=base_url()?>assets/js/height-equal.js"></script>
    <!-- etc -->
    <script src="<?=base_url()?>assets/js/script.js"></script>
    <script>
      var segment1 = "<?php echo $this->uri->segment(1); ?>";
      var segment2 = "<?php echo $this->uri->segment(2); ?>";
    </script>
    <script src="<?=base_url()?>assets/js/additional-js/base.js?v=1.1"></script>
  </body>
</html>        