<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Estate</title>
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
    <!-- inputmask -->
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
      .cv-spinner {
          height: 100%;
          display: flex;
          justify-content: center;
          align-items: center;
      }

      .spinner {
          width: 40px;
          height: 40px;
          border: 4px #ddd solid;
          border-top: 4px #2e93e6 solid;
          border-radius: 50%;
          animation: sp-anime 0.8s infinite linear;
      }
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?= site_url()?>" class="site_title"><i class="fa fa-building"></i> <span>SistemEstate</span></a>
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
                <h5><small><?= $_SESSION['role']?><br>
                Periode : <?= date('m/Y')?></small></h5>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
              <h3>Accounting</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Master <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= site_url('master/lokasi_kav')?>">Lokasi Kavling</a></li>
                      <li><a href="<?= site_url('master/kavling')?>">Kavling</a></li>
                      <!-- <li><a href="<?= site_url('master/barang')?>">Barang</a></li> -->
                      <!-- <li><a href="<?= site_url('master/customer')?>">Customer</a></li> -->
                      <li><a href="<?= site_url('master/supplier')?>">Supplier</a></li>
                      <li><a href="<?= site_url('master/sales')?>">Sales</a></li>
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
                  <li><a><i class="fa fa-truck"></i> Logistik <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">Pembelian</a></li>
                      <li><a>Transaksi Logistik<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Transfer Barang</a>
                            </li>
                            <li><a href="#level2_1">Konfirmasi Transfer</a>
                            </li>
                          </ul>
                      </li>
                      <li><a href="typography.html">Adjustment</a></li>
                      <li><a href="icons.html">Pemakaian</a></li>
                      <li><a href="glyphicons.html">Laporan Stok</a></li>
                      <li><a href="widgets.html">Laporan Transfer Barang</a></li>
                      <li><a href="invoice.html">Laporan Pembelian</a></li>
                      <li><a href="inbox.html">Laporan Retur Pembelian</a></li>
                      <li><a href="calendar.html">Laporan Hutang</a></li>
                      <li><a href="calendar.html">Laporan Adjustment</a></li>
                      <li><a href="calendar.html">Laporan Pemakaian</a></li>
                      <li><a href="calendar.html">Closing Barang</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a>Laporan Keuangan<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="tables_dynamic.html">Buku Besar</a></li>
                            <li><a href="tables_dynamic.html">Neraca</a></li>
                            <li><a href="tables_dynamic.html">Penjelasan Neraca</a></li>
                            <li><a href="tables_dynamic.html">Laba Rugi</a></li>
                            <li><a href="tables_dynamic.html">Penjelasan Laba Rugi</a></li>
                            <li><a href="tables_dynamic.html">Cashflow</a></li>
                            <li><a href="tables_dynamic.html">Laporan Kas</a></li>
                            <li><a href="tables_dynamic.html">Laporan Ratio</a></li>
                            <li><a href="tables_dynamic.html">Alokasi COA</a></li>
                            <li><a href="tables_dynamic.html">Cashflow Detail</a></li>
                          </ul>
                      </li>
                      <li><a>Laporan Piutang<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="tables_dynamic.html">Laporan Piutang per Kavling</a></li>
                            <li><a href="tables_dynamic.html">Laporan Piutang Aging</a></li>
                            <li><a href="tables_dynamic.html">Laporan Pembayaran Piutang</a></li>
                          </ul>
                      </li>
                      <li><a>Laporan Marketing<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                          <li><a href="#">Laporan Income</a></li>
                          <li><a href="#">Laporan Data Kavling</a></li>
                          <li><a href="#">Grafik Penjualan</a></li>
                          <li><a href="#">Laporan Realisasi</a></li>
                          </ul>
                      </li>
                      <li><a>Laporan Tagihan<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                        <li><a href="#">Nota Rekening</a></li>
                        <li><a href="#">Rekap Tagihan</a></li>
                        </ul>
                      </li>
                      <li><a href="typography.html">Laporan Persediaan Kavling</a></li>
                      <li><a href="tables_dynamic.html">Buku LM</a></li>
                      <li><a>Laporan Manajamen<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="tables_dynamic.html">Rekap Rugi Laba</a></li>
                            <li><a href="tables_dynamic.html">Laporan Rugi Laba</a></li>
                            <li><a href="tables_dynamic.html">Laporan Rugi Laba Cashflow</a></li>
                            <li><a href="tables_dynamic.html">Laporan Rugi Laba Detail</a></li>
                            <li><a href="tables_dynamic.html">Laporan Per Unit Usaha</a></li>
                            <li><a href="tables_dynamic.html">Laporan Per Unit Usaha Rekap</a></li>
                            <li><a href="tables_dynamic.html">Grafik Rugi Laba Tahunan</a></li>
                            <li><a href="tables_dynamic.html">Grafik Pendapatan Tahunan</a></li>
                            <li><a href="tables_dynamic.html">Laporan Ration</a></li>
                            
                          </ul>
                      </li> 
                      <li><a>Laporan RK Antar Divisi<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="tables_dynamic.html">Rekap RK Piutang</a></li>
                            <li><a href="tables_dynamic.html">Rekap RK Hutang</a></li>
                          </ul>
                      </li> 
                    </ul>
                    
                  </li>
                </ul>
              </div>
              <!-- section marketing -->
              <div class="menu_section">
                <h3>Marketing</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-dollar"></i> Penjualan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Penjualan</a></li>
                      <li><a href="#">Laporan Penjualan</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-money"></i> Payment <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Payment</a></li>
                      <li><a href="#">Daftar Payment per Tanggal</a></li>
                    </ul>
                  </li>
                  <!-- <li><a><i class="fa fa-line-chart"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Laporan Income</a></li>
                      <li><a href="#">Laporan Data Kavling</a></li>
                      <li><a href="#">Laporan Piutang</a></li>
                      <li><a href="#">Grafik Penjualan</a></li>
                      <li><a href="#">Laporan Realisasi</a></li>
                    </ul>
                  </li> -->
                </ul>
              </div>
              <!-- end section marketing -->
              <!-- section global -->
              <div class="menu_section">
                <h3>Tagihan</h3>
                <ul class="nav side-menu">
                  <li><a href="<?= site_url('tagihan/kalkulasi_air')?>"><i class="fa fa-calculator"></i>Master Kalkulasi Air</a></li>
                  <li><a href="<?= site_url('tagihan/transaksi')?>"><i class="fa fa-dollar"></i>Tagihan Rekening</a></li>
                  <li><a href="#"><i class="fa fa-book"></i>Closing</a></li>
                  <!-- <li><a><i class="fa fa-line-chart"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Nota Rekening</a></li>
                      <li><a href="#">Rekap Tagihan</a></li>
                    </ul>
                  </li> -->
                </ul>
              </div>

              <!-- end section global -->
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <!-- <div id="top_load_overlay" class="loadingoverlay"> 
              <div class="cv-spinner">
                  <span class="spinner"></span>
              </div>
          </div> -->
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a class="dropdown-item"  href="<?= site_url('/login/logout')?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->