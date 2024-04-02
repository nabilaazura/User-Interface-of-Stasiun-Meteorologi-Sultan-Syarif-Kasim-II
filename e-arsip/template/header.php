<?php
    session_start();
    //mengatasi jika langsung masuk menggunakan link tanpa login
    if(empty($_SESSION['id_user']) or empty($_SESSION['username'])){
    echo  "<script>
            alert ('Maaf Untuk mengakses halaman ini silakan login terlebih dahulu...!!!');
            document.location='index.php';
           </script>";
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="shortcut icon" href="assets/img/logo2.png">
    <title>E-ARSIP STAMET PKU</title>
  </head>
  <body>

    <!--  AWAL NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="?"><i class="fas fa-folder-open"></i> e-Arsip</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-dark bg-warning" href="?">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark bg-warning" href="?halaman=departemen">Departemen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark bg-warning" href="?halaman=pengirim_surat">Pengirim</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark bg-warning" href="?halaman=arsip_surat">Surat Masuk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark bg-warning" href="?halaman=dokumen">Surat Keluar</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Cari Data . . ." aria-label="Search">
            <button class="btn btn-outline-warning my-2 my-sm-0 text-white" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<!-- AKHIR NAVBAR -->

<!--  AWAL CONTAINER -->
<div class="container">