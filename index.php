<?php
// index.php - Halaman Beranda
require "koneksi.php";
require "functions.php";

$judul_halaman = "Beranda";

// Variabel untuk menyimpan statistik (Variabel)
$totalTugas = 0;
$totalSelesai = 0;
$totalBelum = 0;
$totalPrioritasTinggi = 0;

// Mengambil semua data dari tabel tugas
$query = "SELECT * FROM tugas ORDER BY tanggal_deadline ASC";
$hasil = mysqli_query($koneksi, $query);

if ($hasil) {
    $totalTugas = mysqli_num_rows($hasil);

    // Perulangan: menghitung statistik dari setiap baris data
    while ($baris = mysqli_fetch_assoc($hasil)) {
        // Percabangan untuk mengecek status
        if ($baris['status'] == "Selesai") {
            $totalSelesai++;
        } else {
            $totalBelum++;
        }

        // Percabangan untuk mengecek prioritas tinggi
        if ($baris['prioritas'] == "Tinggi" && $baris['status'] != "Selesai") {
            $totalPrioritasTinggi++;
        }
    }
}

// Mengambil 5 tugas terbaru/terdekat deadline untuk ditampilkan di beranda
$queryTerbaru = "SELECT * FROM tugas ORDER BY tanggal_deadline ASC LIMIT 5";
$hasilTerbaru = mysqli_query($koneksi, $queryTerbaru);

require "header.php";
?>

    <div class="hero">
        <h1>Selamat Datang di To-Do List App</h1>
        <p>Kelola dan pantau seluruh aktivitas serta tugasmu dengan lebih mudah dan terorganisir.</p>

        <div class="stats">
            <div class="stat-box">
                <h2><?php echo $totalTugas; ?></h2>
                <p>Total Tugas</p>
            </div>
            <div class="stat-box">
                <h2><?php echo $totalSelesai; ?></h2>
                <p>Selesai</p>
            </div>
            <div class="stat-box">
                <h2><?php echo $totalBelum; ?></h2>
                <p>Belum Selesai</p>
            </div>
            <div class="stat-box">
                <h2><?php echo $totalPrioritasTinggi; ?></h2>
                <p>Prioritas Tinggi</p>
            </div>
        </div>
    </div>

    <div class="card">
        <h2 style="margin-bottom: 15px;">5 Tugas dengan Deadline Terdekat</h2>

        <?php if (mysqli_num_rows($hasilTerbaru) > 0) { ?>
            <table>
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Deadline</th>
                        <th>Sisa Waktu</th>
                        <th>Prioritas</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($hasilTerbaru)) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['judul']); ?></td>
                            <td><?php echo htmlspecialchars($row['kategori']); ?></td>
                            <td><?php echo formatTanggal($row['tanggal_deadline']); ?></td>
                            <td><?php echo hitungSisaHari($row['tanggal_deadline']); ?></td>
                            <td><?php echo labelPrioritas($row['prioritas']); ?></td>
                            <td><?php echo labelStatus($row['status']); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>Belum ada data tugas. <a href="tambah.php">Tambah tugas baru</a>.</p>
        <?php } ?>

        <div style="margin-top: 20px;">
            <a href="tambah.php" class="btn btn-primary">+ Tambah Tugas Baru</a>
            <a href="daftar.php" class="btn btn-secondary">Lihat Semua Data</a>
        </div>
    </div>

<?php require "footer.php"; ?>
