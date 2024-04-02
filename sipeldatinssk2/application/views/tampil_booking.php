<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/head.php") ?>
</head>

<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <?php $this->load->view("_partials/navbar2.php") ?>
        <!-- Pricing section-->
        <section class="bg-light py-5">
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <br><h3 class="fw-bolder text-primary">PEMESANAN LAYANAN DATA DAN INFORMASI MKG</h3>
                    <p class="lead fw-normal text-muted mb-0">Silahkan buat dan pesan layanan data MKG sesuai dengan spesifikasi anda!</p>
                </div>
                <!-- Tampilkan semua produk -->
                <div class="row">
                    <!-- looping services -->
                    <?php foreach ($services as $service) : ?>
                        <div class="col-sm-4 col-md-4 align text-center border border-5">
                            <br><div class="thumbnail">
                                <img src="<?php echo base_url('upload/' . $service->image) ?>" width="200" height="200" />
                                <div class="caption">
                                    <br>
                                    <h4><?= $service->name ?></h4>
                                    <p><?= $service->description ?></p>
                                    <p><b>MULAI DARI:</b></p>
                                    <h3><?= $service->price ?></h3><br>
                                    <p>
                                        <?= anchor('booking/form_booking/' . $service->service_id, 'Buat Permintaan', [
                                            'class'    => 'btn btn-primary',
                                            'role'    => 'button'
                                        ]) ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- end looping -->
                </div>
            </div>
        </section>
    </main>
    <?php $this->load->view("_partials/footer.php") ?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>