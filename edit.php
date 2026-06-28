<?php
// edit.php - Halaman Edit Data (UPDATE)
require "koneksi.php";

$judul_halaman = "Edit Data";
$pesan = "";

// Mengambil ID dari URL menggunakan GET
if (!isset($_GET['id'])) {
    header("Location: daftar.php");
    exit();
}

$id = (int) $_GET['id'];

// Jika form di-submit (Form Processing POST untuk update)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul     = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $kategori  = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $deadline  = mysqli_real_escape_string($koneksi, $_POST['deadline']);
    $prioritas = mysqli_real_escape_string($koneksi, $_POST['prioritas']);
    $status    = mysqli_real_escape_string($koneksi, $_POST['status']);
    $idPost    = (int) $_POST['id'];

    if (empty($judul) || empty($deadline)) {
        $pesan = "<div class='alert alert-danger'>Judul dan tanggal deadline wajib diisi!</div>";
    } else {
        // Query UPDATE
        $query = "UPDATE tugas SET
                    judul = '$judul',
                    deskripsi = '$deskripsi',
                    kategori = '$kategori',
                    tanggal_deadline = '$deadline',
                    prioritas = '$prioritas',
                    status = '$status'
                  WHERE id = $idPost";

        if (mysqli_query($koneksi, $query)) {
            header("Location: daftar.php?status=edit_sukses");
            exit();
        } else {
            $pesan = "<div class='alert alert-danger'>Gagal memperbarui data: " . mysqli_error($koneksi) . "</div>";
        }
    }
}

// Mengambil data lama berdasarkan ID untuk ditampilkan di form
$query = "SELECT * FROM tugas WHERE id = $id";
$hasil = mysqli_query($koneksi, $query);

// Percabangan: cek apakah data ditemukan
if (mysqli_num_rows($hasil) == 0) {
    header("Location: daftar.php");
    exit();
}

$data = mysqli_fetch_assoc($hasil);

require "header.php";
?>

    <div class="card">
        <h2 style="margin-bottom: 20px;">Edit Tugas</h2>

        <?php echo $pesan; ?>

        <form action="edit.php?id=<?php echo $data['id']; ?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

            <label for="judul">Judul Tugas</label>
            <input type="text" id="judul" name="judul" value="<?php echo htmlspecialchars($data['judul']); ?>" required>

            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="4"><?php echo htmlspecialchars($data['deskripsi']); ?></textarea>

            <label for="kategori">Kategori</label>
            <input type="text" id="kategori" name="kategori" value="<?php echo htmlspecialchars($data['kategori']); ?>">

            <label for="deadline">Tanggal Deadline</label>
            <input type="date" id="deadline" name="deadline" value="<?php echo $data['tanggal_deadline']; ?>" required>

            <label for="prioritas">Prioritas</label>
            <select id="prioritas" name="prioritas">
                <?php
                $opsiPrioritas = ["Rendah", "Sedang", "Tinggi"];
                foreach ($opsiPrioritas as $opsi) {
                    $selected = ($data['prioritas'] == $opsi) ? "selected" : "";
                    echo "<option value='$opsi' $selected>$opsi</option>";
                }
                ?>
            </select>

            <label for="status">Status</label>
            <select id="status" name="status">
                <?php
                $opsiStatus = ["Belum Selesai", "Selesai"];
                foreach ($opsiStatus as $opsi) {
                    $selected = ($data['status'] == $opsi) ? "selected" : "";
                    echo "<option value='$opsi' $selected>$opsi</option>";
                }
                ?>
            </select>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="daftar.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>

<?php require "footer.php"; ?>
