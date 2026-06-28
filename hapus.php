<?php
// hapus.php - Proses Hapus Data (DELETE)
require "koneksi.php";

// Mengambil ID dari URL menggunakan GET
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    // Query DELETE
    $query = "DELETE FROM tugas WHERE id = $id";

    if (mysqli_query($koneksi, $query)) {
        header("Location: daftar.php?status=hapus_sukses");
        exit();
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
} else {
    header("Location: daftar.php");
    exit();
}
?>
