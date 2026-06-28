<?php
/**
 * koneksi.php
 * File koneksi ke database MySQL menggunakan mysqli (PHP Native)
 */

// Konfigurasi Database
$host    = "localhost";
$user    = "root";
$pass    = "";
$dbname  = "db_todolist";

// Membuat koneksi
$koneksi = mysqli_connect($host, $user, $pass, $dbname);

// Mengecek koneksi
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Set charset agar tidak ada masalah dengan karakter khusus
mysqli_set_charset($koneksi, "utf8");
?>
