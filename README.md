# To-Do List App

## 1. Identitas
- **Nama:** [Isi Nama Lengkap Anda]
- **NIM:** [Isi NIM Anda]

## 2. Judul Aplikasi
**To-Do List App** — Aplikasi pendataan tugas/aktivitas sehari-hari berbasis web.

## 3. Deskripsi Singkat
Aplikasi ini merupakan sistem To-Do List sederhana yang dibuat menggunakan **HTML, CSS, PHP Native, dan MySQL**. Aplikasi memungkinkan pengguna untuk mencatat, melihat, mengubah, dan menghapus daftar tugas, lengkap dengan kategori, tanggal deadline, tingkat prioritas, dan status pengerjaan. Halaman beranda juga menampilkan ringkasan statistik tugas (total, selesai, belum selesai, dan prioritas tinggi) untuk membantu pengguna memantau progres pekerjaannya.

## 4. Fitur Utama
- Halaman **Beranda** — menampilkan statistik dan 5 tugas dengan deadline terdekat.
- Halaman **Tambah Data** — form untuk menambahkan tugas baru (Create).
- Halaman **Daftar Data** — menampilkan seluruh tugas beserta fitur pencarian (Read).
- Halaman **Edit Data** — form untuk mengubah data tugas yang sudah ada (Update).
- Fitur **Hapus Data** dengan konfirmasi sebelum data dihapus (Delete).

## 5. Screenshot Aplikasi
> Tambahkan screenshot aplikasi Anda di folder `img/` lalu tampilkan di sini, contoh:
>
> ![Beranda](img/screenshot-beranda.png)
> ![Tambah Data](img/screenshot-tambah.png)
> ![Daftar Data](img/screenshot-daftar.png)
> ![Edit Data](img/screenshot-edit.png)

## 6. Struktur Database

**Nama Database:** `db_todolist`

**Tabel:** `tugas`

| Kolom            | Tipe Data                          | Keterangan                         |
|------------------|-------------------------------------|-------------------------------------|
| id               | INT(11), AUTO_INCREMENT, PRIMARY KEY| ID unik tugas                       |
| judul            | VARCHAR(100)                        | Judul tugas                         |
| deskripsi        | TEXT                                 | Deskripsi detail tugas              |
| kategori         | VARCHAR(50)                         | Kategori tugas (Kuliah, Pribadi, dll)|
| tanggal_deadline | DATE                                 | Batas waktu pengerjaan tugas        |
| prioritas        | ENUM('Rendah','Sedang','Tinggi')    | Tingkat prioritas tugas             |
| status           | ENUM('Belum Selesai','Selesai')     | Status pengerjaan tugas             |
| created_at       | TIMESTAMP                           | Waktu data dibuat                   |

File struktur dan data awal database tersedia di file `database.sql` (berisi minimal 5 record data awal).

## 7. Cara Menjalankan Aplikasi

1. **Clone repository ini**
   ```bash
   git clone https://github.com/username/UAS-PWEB-2526G-NIM.git
   cd UAS-PWEB-2526G-NIM
   ```

2. **Pindahkan folder project** ke direktori server lokal, contoh untuk XAMPP:
   ```
   C:/xampp/htdocs/UAS-PWEB-2526G-NIM
   ```

3. **Jalankan Apache dan MySQL** melalui XAMPP/Laragon Control Panel.

4. **Buat database**, lalu impor file `database.sql`:
   - Buka **phpMyAdmin** (`http://localhost/phpmyadmin`)
   - Buat database baru, atau langsung impor `database.sql` (database `db_todolist` akan otomatis dibuat)
   - Klik tab **Import**, pilih file `database.sql`, lalu klik **Go**

5. **Sesuaikan konfigurasi koneksi** pada file `koneksi.php` jika diperlukan (host, user, password sesuai konfigurasi lokal Anda):
   ```php
   $host    = "localhost";
   $user    = "root";
   $pass    = "";
   $dbname  = "db_todolist";
   ```

6. **Akses aplikasi** melalui browser:
   ```
   http://localhost/UAS-PWEB-2526G-NIM/index.php
   ```

## 8. Pernyataan Penggunaan GenAI
Project ini dikembangkan dengan bantuan **Generative AI (Claude - Anthropic)** untuk membantu penulisan kode, struktur project, dan dokumentasi. Penjelasan lebih lanjut mengenai penggunaan GenAI dijelaskan pula dalam video YouTube penjelasan project.
