<?php

    @$halaman = $_GET['halaman'];
    if($halaman == "departemen") {
        //tampilkan halaman departemen
        // echo "Tampil Halaman Modul Departemen";
        include "modul/departemen/departemen.php";
    } elseif ($halaman == "pengirim_surat") {
        //tampilkan halaman pengirim
        include "modul/pengirim_surat/pengirim_surat.php";
    } elseif ($halaman == "arsip_surat") {
        //tampilkan halaman arsip surat
        if(@$_GET['hal'] == "tambahdata" || @$_GET['hal'] == "edit" || @$_GET['hal'] == "hapus") {
            include "modul/arsip/form.php";
        } else {
            include "modul/arsip/data.php";
        }
    } elseif ($halaman == "dokumen") {
        //tampilkan halaman dokumen
        if(@$_GET['hal'] == "tambahdokumen" || @$_GET['hal'] == "edit" || @$_GET['hal'] == "hapus") {
            include "modul/dokumen/form.php";
        } else {
            include "modul/dokumen/data.php";
        }
    } else {
        // echo "Tampil Halaman Home";
        include "modul/home.php";
    }

?>