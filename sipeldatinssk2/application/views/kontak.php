<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/head.php") ?>
</head>

<body class="d-flex flex-column">
    <?php $this->load->view("_partials/navbar2.php") ?>
    
    <!-- Navigation-->
    <?php $this->load->view("_partials/navbar.php") ?>
    
    <?php if ($this->session->flashdata('success')) { ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
        </div>
        
    <?php } else if ($this->session->flashdata('error')) { ?>
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
        </div>
    
    <?php } else if ($this->session->flashdata('warning')) { ?>
        <div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); ?>
        </div>
        
    <?php } else if ($this->session->flashdata('info')) { ?>
        <div class="alert alert-info">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Info!</strong> <?php echo $this->session->flashdata('info'); ?>
        </div>
    <?php } ?>

    <!--  Contact START  -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12 col-md-12">
                    <div class="mb-5"><br><br>
                    <h2 class="mb-2 text-primary">Hubungi Kami</h2>
                    <p>Punya Pertanyaan, Keluhan, Pesan dan Saran untuk peningkatan Layanan kami atau apapun itu, silahkan isi formulir berikut!</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="alert alert-success contact__msg" role="alert">
                    Your message was sent successfully.
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-7 col-sm-12">
                <form action="<?php echo site_url('kontak/add') ?>" method="post" enctype="multipart/form-data">

                    <!-- end message -->
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input name="nama" id="nama" type="text" class="form-control" placeholder="Name" required>
                        </div>

                        <div class="col-md-6 form-group">
                            <input name="email" id="email" type="email" class="form-control" placeholder="nama@example.com" required>
                        </div>

                        <div class="col-md-12 form-group">
                            <input class="form-control" id="no_telpon" name="no_telpon" type="tel" placeholder="(123) 456-7890" value="+62" required>
                        </div>

                        <div class="col-12 form-group">
                            <textarea name="pesan" id="pesan" class="form-control" type="text" rows="6" placeholder="Enter your message here..." required></textarea>
                        </div>
                        <div class="col-12 mt-4">
                            <input name="btn" type="submit" class=" btn btn-primary btn-circled" value="KIRIM PESAN">
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-5 pl-4 mt-4 mt-lg-0">
                <h4>Alamat Kantor</h4>
                <p class="mb-3">Bandar Udara Sultan Syarif Kasim II Pekanbaru (28284)</p>
                <h4>Telepon</h4>
                <p class="mb-3">(0761) 73701</p>
                <h4>Email</h4>
                <p class="mb-3">stamet.ssk2pku@bmkg.go.id</p>
                <h4>Website</h4>
                <p>www.stametssk2pku.bmkg.go.id</p>
            </div>
        </div>
    </div>
</section>


<?php $this->load->view("_partials/footer.php") ?>

    <script type="application/javascript">
        /** After windod Load */
        $(window).bind("load", function() {
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 500);
        });
    </script>

    <!--  FOOTER AREA END  -->
   

    <!-- 
    Essential Scripts
    =====================================-->

    
    <!-- Main jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4.3.1 -->
    <script src="plugins/bootstrap/js/popper.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
   <!-- Woow animtaion -->
    <script src="plugins/counterup/wow.min.js"></script>
    <script src="plugins/counterup/jquery.easing.1.3.js"></script>
     <!-- Counterup -->
    <script src="plugins/counterup/jquery.waypoints.js"></script>
    <script src="plugins/counterup/jquery.counterup.min.js"></script>

    <!-- Google Map -->
    <script src="plugins/google-map/gmap3.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>   
    <!-- Contact Form -->
    <script src="plugins/jquery/contact.js"></script>
    <script src="js/custom.js"></script>
    


</body>
</html>