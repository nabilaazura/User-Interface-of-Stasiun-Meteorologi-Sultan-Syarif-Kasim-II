<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/head.php") ?>
</head>

<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <?php $this->load->view("_partials/navbar2.php") ?><br><br><br><br>
        <!-- Pricing section-->
        <section class=" py-1">
            <div class="container px-1 my-1">
                <div class="text-center mb-1">
                <br><h3 class="fw-bolder text-primary">TARIF LAYANAN DATA & INFORMASI METEOROLOGI</h3>
                <p class="lead fw-normal text-muted mb-0">Berikut adalah tarif yang dikenakan untuk setiap pelayanan informasi Meteorologi.</p><br>
                <img src="<?php echo base_url('aset_login/images/tarifs.jpg') ?>" alt="Imag" class="img-fluid" width="800">
                </div>
        </section>
    </main>
    <br><br>
    <?php $this->load->view("_partials/footer.php") ?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>