<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="<?php echo base_url('aset_login/fonts/icomoon/style.css') ?>" rel="stylesheet">

    <link href="<?php echo base_url('aset_login/css/owl.carousel.min.css') ?>" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url('aset_login/css/bootstrap.min.css') ?>" rel="stylesheet">
    
    <!-- Style -->
    <link href="<?php echo base_url('aset_login/css/style.css') ?>" rel="stylesheet">

    <title>Login | SiPelDatInMet</title>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/bmkgps.png') ?>" />  
  </head>
  <body>
  

  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="<?php echo base_url('aset_login/images/cover.png') ?>" alt="Imag" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">

              <div class="mb-4">
              <h3>Log In</h3>
              <p class="mb-4">Selamat Datang di Portal Sistem Pelayanan Data dan Informasi Stasium Meteorologi SSK II Pekanbaru</p>
            </div>

            <?php 
				      if($this->session->flashdata('error') !='')
				      {
					      echo '<div class="alert alert-danger" role="alert">';
					      echo $this->session->flashdata('error');
					      echo '</div>';
				      }
				    ?>
 
				    <?php 
				      if($this->session->flashdata('success_register') !='')
				      {
				      	echo '<div class="alert alert-info" role="alert">';
					      echo $this->session->flashdata('success_register');
					      echo '</div>';
				      }
				    ?>

            <form action="<?php echo base_url(); ?>index.php/login/proses" method="post">
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username">

              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password">                
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="<?php echo base_url('index.php/home') ?>" class="text-primary"><b>Kembali Ke Home</b></a></span> 
              </div>

              <input type="submit" value="Log In" class="btn btn-block btn-primary">

              
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

    <script src="<?php echo base_url('aset_login/js/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?php echo base_url('aset_login/js/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('aset_login/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('aset_login/js/main.js') ?>"></script>

  </body>
</html>