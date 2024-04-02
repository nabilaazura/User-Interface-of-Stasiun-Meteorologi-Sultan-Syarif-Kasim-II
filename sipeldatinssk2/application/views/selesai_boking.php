<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/head.php") ?>
</head>

<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <?php $this->load->view("_partials/navbar.php") ?>
        <!-- Header-->
        <header class="py-5">
            <div class="container px-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xxl-6">
                        <div class="text-center my-5">
                            <h1 class="fw-bolder mb-3">Terimakasih atas Permintaan Layanan anda...</h1>
                            <p class="lead fw-normal text-muted mb-4">Kami Akan Segera Menghubungi Anda Secepatnya Melalui Whatsapp Untuk Konfirmasi Lebih Lanjut, Terima Kasih</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="<?php echo base_url('index.php/home') ?>">Kembali Ke Home</a>
                                    <a class="btn btn-success btn-lg px-4 me-sm-3" href="<?php echo base_url('index.php/booking') ?>">Lanjut Booking</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </main>
    <!-- Footer-->
    <?php $this->load->view("_partials/footer.php") ?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>