<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">
    <?php $this->load->view("admin/_partials/modal.php") ?>
    <?php $this->load->view("admin/_partials/navbar.php") ?>
    <div id="wrapper">

        <?php $this->load->view("admin/_partials/sidebar.php") ?>

        <div id="content-wrapper">

            <div class="container-fluid">

                <?php $this->load->view("admin/_partials/breadcrumb.php") ?>

                <!-- DataTables -->
                <div class="card mb-3">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No HP/WA</th>
                                        <th>Pesan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1;
                                    foreach ($pesan_saran as $service) : ?>
                                        <tr>
                                            <td>
                                                <?php echo $no++; ?>
                                            </td>
                                            <td width="150">
                                                <?php echo $service->nama ?>
                                            </td>
                                            <td width="100">
                                                <?php echo $service->email ?>
                                            </td>
                                            <td>
                                                <?php echo $service->no_telpon ?>
                                            </td>
                                            <td>
                                                <?php echo $service->pesan ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

            <!-- Sticky Footer -->
            <?php $this->load->view("admin/_partials/footer.php") ?>

        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->


    <?php $this->load->view("admin/_partials/scrolltop.php") ?>

    <?php $this->load->view("admin/_partials/js.php") ?>

    <script>
        function deleteConfirm(url) {
            console.log(url);
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>

</body>

</html>