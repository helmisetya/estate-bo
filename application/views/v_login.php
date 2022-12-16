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
    <!-- Bootstrap -->
    <link href="<?= base_url()?>/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url()?>/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url()?>/assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url()?>/assets/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url()?>/assets/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      
      <div class="login_wrapper">
        <div class="animate form login_form">
        <?php if ($this->session->flashdata('login_admin_gagal')) { ?>
        <div class="alert alert-warning alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong>Note : </strong> <?= $this->session->flashdata('login_admin_gagal');?>
        </div>
    <?php } ?>
          <section class="login_content">
            <img src="<?= base_url()?>/assets/build/images/kag.png" height="100"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="<?= base_url()?>/assets/build/images/estate.ico" height="60">
            <form method="POST" action="<?= site_url('login/check_login')?>">
              <h1>Login</h1>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                
                <button class="btn btn-info submit d-grid w-100" type="submit">Masuk</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Belum punya akun ?
                  <a href="#signup" class="to_register"> Daftar </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1> Estate - Back Office</h1>
                  <p>©2022 All Rights Reserved. KAG IT Programmer</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    <script src="<?= base_url()?>/assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url()?>/assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
