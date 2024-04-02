<?php

//Identitas Server
$server = "localhost"; //nama server
$user   = "root"; //username database
$pass   = ""; //password database server
$database = "db_arsip"; //nama database

//koneksi database
$koneksi = mysqli_connect($server, $user, $pass, $database) or die (mysqli_error(koneksi));

?>