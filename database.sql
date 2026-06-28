-- =========================================
-- DATABASE: db_todolist
-- Project UAS Pemrograman Web - To-Do List
-- =========================================

CREATE DATABASE IF NOT EXISTS db_todolist;
USE db_todolist;

-- =========================================
-- TABEL: tugas
-- =========================================
CREATE TABLE IF NOT EXISTS tugas (
    id INT(11) NOT NULL AUTO_INCREMENT,
    judul VARCHAR(100) NOT NULL,
    deskripsi TEXT NOT NULL,
    kategori VARCHAR(50) NOT NULL,
    tanggal_deadline DATE NOT NULL,
    prioritas ENUM('Rendah', 'Sedang', 'Tinggi') NOT NULL DEFAULT 'Sedang',
    status ENUM('Belum Selesai', 'Selesai') NOT NULL DEFAULT 'Belum Selesai',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- =========================================
-- DATA AWAL (Minimal 5 Record)
-- =========================================
INSERT INTO tugas (judul, deskripsi, kategori, tanggal_deadline, prioritas, status) VALUES
('Mengerjakan Tugas UAS Pemrograman Web', 'Membuat aplikasi To-Do List menggunakan HTML, CSS, PHP, dan MySQL', 'Kuliah', '2026-07-05', 'Tinggi', 'Belum Selesai'),
('Belajar Framework Laravel', 'Mempelajari dasar-dasar Laravel untuk persiapan semester depan', 'Belajar', '2026-07-10', 'Sedang', 'Belum Selesai'),
('Membeli Bahan Masakan', 'Belanja bulanan untuk kebutuhan dapur di rumah', 'Pribadi', '2026-06-30', 'Rendah', 'Selesai'),
('Revisi Laporan Praktikum', 'Memperbaiki laporan praktikum basis data sesuai catatan dosen', 'Kuliah', '2026-07-02', 'Tinggi', 'Belum Selesai'),
('Olahraga Pagi', 'Lari pagi keliling komplek selama 30 menit', 'Kesehatan', '2026-06-29', 'Sedang', 'Selesai'),
('Membayar Tagihan Listrik', 'Membayar tagihan listrik bulan ini sebelum jatuh tempo', 'Pribadi', '2026-07-01', 'Tinggi', 'Belum Selesai');
