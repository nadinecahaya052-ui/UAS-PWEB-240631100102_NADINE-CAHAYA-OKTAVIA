<?php
// tambah.php - Halaman Tambah Data (CREATE)
require "koneksi.php";

$judul_halaman = "Tambah Data";
$pesan = "";

// Form Processing menggunakan method POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form (Variabel)
    $judul     = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $kategori  = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $deadline  = mysqli_real_escape_string($koneksi, $_POST['deadline']);
    $prioritas = mysqli_real_escape_string($koneksi, $_POST['prioritas']);
    $status    = mysqli_real_escape_string($koneksi, $_POST['status']);

    // Percabangan: validasi sederhana sebelum data disimpan
    if (empty($judul) || empty($deadline)) {
        $pesan = "<div class='alert alert-danger'>Judul dan tanggal deadline wajib diisi!</div>";
    } else {
        // Query INSERT (Create)
        $query = "INSERT INTO tugas (judul, deskripsi, kategori, tanggal_deadline, prioritas, status)
                  VALUES ('$judul', '$deskripsi', '$kategori', '$deadline', '$prioritas', '$status')";

        if (mysqli_query($koneksi, $query)) {
            // Redirect ke halaman daftar data setelah berhasil menambah
            header("Location: daftar.php?status=tambah_sukses");
            exit();
        } else {
            $pesan = "<div class='alert alert-danger'>Gagal menyimpan data: " . mysqli_error($koneksi) . "</div>";
        }
    }
}

require "header.php";
?>

    <div class="card">
        <h2 style="margin-bottom: 20px;">Tambah Tugas Baru</h2>

        <?php echo $pesan; ?>

        <form action="tambah.php" method="POST">
            <label for="judul">Judul Tugas</label>
            <input type="text" id="judul" name="judul" placeholder="Contoh: Mengerjakan Laporan" required>

            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="4" placeholder="Jelaskan detail tugas..."></textarea>

            <label for="kategori">Kategori</label>
            <input type="text" id="kategori" name="kategori" placeholder="Contoh: Kuliah, Pribadi, Kerja">

            <label for="deadline">Tanggal Deadline</label>
            <input type="date" id="deadline" name="deadline" required>

            <label for="prioritas">Prioritas</label>
            <select id="prioritas" name="prioritas">
                <option value="Rendah">Rendah</option>
                <option value="Sedang" selected>Sedang</option>
                <option value="Tinggi">Tinggi</option>
            </select>

            <label for="status">Status</label>
            <select id="status" name="status">
                <option value="Belum Selesai" selected>Belum Selesai</option>
                <option value="Selesai">Selesai</option>
            </select>

            <button type="submit" class="btn btn-primary">Simpan Tugas</button>
            <a href="daftar.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>

<?php require "footer.php"; ?>
