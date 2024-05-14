<?php
$servername = "localhost";
$usename = "root";
$password = "";
$dbname = "penggajian";

$connection = mysqli_connect($servername, $usename, $password, $dbname);
if (!$connection) {
    die("gagal koneksi: " .  mysqli_connect_error());
}