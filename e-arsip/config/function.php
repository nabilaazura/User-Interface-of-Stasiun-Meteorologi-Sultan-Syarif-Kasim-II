<?php
    //Persiapan Function Untuk Upload File atau Foto
    function upload() {
        //Deklarasikan Variabel Kebutuhan
        $namafile   = $_FILES['file']['name'];
        $ukuranfile = $_FILES['file']['size'];
        $error      = $_FILES['file']['error'];
        $tmpname    = $_FILES['file']['tmp_name'];

        //Cek apakah yang diupload file atau gambar
        $eksfilevalid = ['jpg', 'jpeg', 'png', 'pdf'];
        $eksfile = explode('.', $namafile);
        $eksfile = strtolower(end($eksfile));
        if(!in_array($eksfile, $eksfilevalid)){
            echo "<script> alert('Yang Anda Upload Bukan Gambar/File PDF..!') </script>";
            return false;
        }

        //Cek jika ukuran file terlalu besar (Disini ditentukan Max 2 MB/2048 Kb)
        if($ukuranfile > 2097152){
            echo "<script> alert('Ukuran file anda terlalu besar!') </script>";
            return false;
        }

        //Jika lolos pengecekan, file siap diupload
        //Generate nama file baru
        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $eksfile;

        move_uploaded_file($tmpname, 'file/'.$namafilebaru);
        return $namafilebaru;
    }
?>