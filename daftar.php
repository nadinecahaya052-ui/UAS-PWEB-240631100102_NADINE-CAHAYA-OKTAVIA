<?php
// daftar.php - Halaman Daftar Data (READ)
require "koneksi.php";
require "functions.php";

$judul_halaman = "Daftar Data";

// Mengecek pesan status dari proses sebelumnya (GET)
$pesan = "";
if (isset($_GET['status'])) {
    if ($_GET['status'] == "tambah_sukses") {
        $pesan = "<div class='alert alert-success'>Data berhasil ditambahkan!</div>";
    } elseif ($_GET['status'] == "edit_sukses") {
        $pesan = "<div class='alert alert-success'>Data berhasil diperbarui!</div>";
    } elseif ($_GET['status'] == "hapus_sukses") {
        $pesan = "<div class='alert alert-success'>Data berhasil dihapus!</div>";
    }
}

// Fitur pencarian sederhana menggunakan GET
$keyword = isset($_GET['cari']) ? mysqli_real_escape_string($koneksi, $_GET['cari']) : "";

if (!empty($keyword)) {
    $query = "SELECT * FROM tugas WHERE judul LIKE '%$keyword%' OR kategori LIKE '%$keyword%' ORDER BY tanggal_deadline ASC";
} else {
    $query = "SELECT * FROM tugas ORDER BY tanggal_deadline ASC";
}

$hasil = mysqli_query($koneksi, $query);

require "header.php";
?>

    <div class="card">
        <h2 style="margin-bottom: 20px;">Daftar Seluruh Tugas</h2>

        <?php echo $pesan; ?>

        <!-- Form pencarian menggunakan method GET -->
        <form action="daftar.php" method="GET" style="display:flex; gap:10px; margin-bottom:20px;">
            <input type="text" name="cari" placeholder="Cari judul atau kategori..." value="<?php echo htmlspecialchars($keyword); ?>" style="margin-bottom:0;">
            <button type="submit" class="btn btn-primary">Cari</button>
            <a href="daftar.php" class="btn btn-secondary">Reset</a>
        </form>

        <?php if (mysqli_num_rows($hasil) > 0) { ?>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Deadline</th>
                        <th>Prioritas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    // Perulangan menampilkan seluruh data tugas
                    while ($row = mysqli_fetch_assoc($hasil)) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo htmlspecialchars($row['judul']); ?></td>
                            <td><?php echo htmlspecialchars($row['kategori']); ?></td>
                            <td><?php echo formatTanggal($row['tanggal_deadline']); ?></td>
                            <td><?php echo labelPrioritas($row['prioritas']); ?></td>
                            <td><?php echo labelStatus($row['status']); ?></td>
                            <td class="action-links">
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                                <a href="hapus.php?id=<?php echo $row['id']; ?>"
                                   class="btn btn-danger"
                                   onclick="return confirm('Yakin ingin menghapus tugas ini?');">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>Tidak ada data yang ditemukan.</p>
        <?php } ?>

        <div style="margin-top: 20px;">
            <a href="tambah.php" class="btn btn-primary">+ Tambah Tugas Baru</a>
        </div>
    </div>

<?php require "footer.php"; ?>
