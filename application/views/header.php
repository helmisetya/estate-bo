<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Estate - BO</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>/assets/build/images/kag.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="<?= base_url()?>/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url()?>/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url()?>/assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?= base_url()?>/assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	<!-- Datatables -->
    
    <link href="<?= base_url()?>/assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>/assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>/assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>/assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>/assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="<?= base_url()?>/assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- sweet alert 2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendors/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendors/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- JQVMap -->
    <link href="<?= base_url()?>/assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- TOOGLE -->
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?= base_url()?>/assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- switchery -->
    <link href="<?= base_url()?>/assets/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?= base_url()?>/assets/build/css/custom.min.css" rel="stylesheet">
    <style>
      .vertical-center {
        margin-top: 4px;
        position: absolute;
        top: 60%;
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
      }
      .jumbotron {
        background-image:url('<?= base_url('/assets/build/images/est-house2.jpg')?>');
        height:300px;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
        border-bottom:1px solid #ff6a00
      }
      .jumbotron .container {
        position:relative;
        top:50px;
      }
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?= site_url()?>" class="site_title"><i class="fa fa-building"></i> <span>Estate - BO</span></a>
            </div>

            <div class="clearfix"></div>
            <input type="hidden" id="valBaseUrl" value="<?= site_url(); ?>">
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?= base_url()?>/assets/build/images/icon_gfriend.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                
                <h2><?= $_SESSION['nama']?></h2>
                <h5><small><?= $_SESSION['role']?></small></h5>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Master <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= site_url('master/lokasi_kav')?>">Lokasi Kavling</a></li>
                      <li><a href="<?= site_url('master/kavling')?>">Kavling</a></li>
                      <li><a href="<?= site_url('master/barang')?>">Barang</a></li>
                      <li><a href="<?= site_url('master/customer')?>">Customer</a></li>
                      <li><a href="<?= site_url('master/supplier')?>">Supplier</a></li>
                      <li><a href="index3.html">Sales</a></li>
                      <li><a href="<?= site_url('master/coa')?>">COA</a></li>
                      <li><a href="<?= site_url('master/pesentase')?>">Pesentase Income</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-money"></i> Accounting <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a>Jurnal<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Jurnal Umum</a>
                            </li>
                            <li><a href="#level2_1">Kas Masuk</a>
                            </li>
                            <li><a href="#level2_2">Kas Keluar</a>
                            </li>
                            <li><a href="#level2_2">Kas Harian</a>
                            </li>
                          </ul>
                      </li>
                      <li><a>Pembayaran<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Pelunasan Hutang</a>
                            </li>
                            <li><a href="#level2_1">Saldo Piutang</a>
                            </li>
                            <li><a href="#level2_2">Kas Keluar</a>
                            </li>
                            <li><a href="#level2_2">Penjualan InHouse</a>
                            </li>
                          </ul>
                      </li>
                      <li><a>Modul Accounting<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Update HPP</a>
                            </li>
                            <li><a href="#level2_1">Closing</a>
                            </li>
                            <li><a href="#level2_2">Check GL</a>
                            </li>
                          </ul>
                      </li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Logistik <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">General Elements</a></li>
                      <li><a href="media_gallery.html">Media Gallery</a></li>
                      <li><a href="typography.html">Typography</a></li>
                      <li><a href="icons.html">Icons</a></li>
                      <li><a href="glyphicons.html">Glyphicons</a></li>
                      <li><a href="widgets.html">Widgets</a></li>
                      <li><a href="invoice.html">Invoice</a></li>
                      <li><a href="inbox.html">Inbox</a></li>
                      <li><a href="calendar.html">Calendar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Tables</a></li>
                      <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?= base_url()?>/assets/build/images/icon_gfriend.png" alt=""><?= $_SESSION['nama']?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    
                    <a class="dropdown-item"  href="<?= site_url('/login/logout')?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">0</span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->