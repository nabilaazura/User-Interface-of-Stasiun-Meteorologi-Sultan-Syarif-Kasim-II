<?php
    session_start();
    include "config/koneksi.php";

    //Contoh Login Sederhana, Bisa Dikembangkan Lagi

    //Password diamankan dengan enkripsi Kriptografi md5
    @$pass = md5($_POST['password']);
    
    //MySQLI_escape_string fungsinya untuk mengamankan karakter aneh yang diinputkan user, seperti SQL Injection
    @$username = mysqli_escape_string($koneksi, $_POST['username']);
    @$password = mysqli_escape_string($koneksi, $pass);

    $login = mysqli_query($koneksi, "SELECT * FROM tbl_user
                                     WHERE username='$username' and password = '$password' ");

    $data = mysqli_fetch_array($login);
    if($data){
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['username'] = $data['username'];
        header('location:admin.php');
    }else{
        echo "<script>
                alert ('Maaf, Login Gagal. Username atau Password yang anda masukkan salah...!');
                document.location='index.php';
              </script>";
    }

?>