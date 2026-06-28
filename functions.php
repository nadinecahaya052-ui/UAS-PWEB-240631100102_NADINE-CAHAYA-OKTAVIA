<?php
/**
 * functions.php
 * Kumpulan function yang digunakan di berbagai halaman
 */

/**
 * Function 1: formatTanggal
 * Mengubah format tanggal dari YYYY-MM-DD menjadi format Indonesia (DD Bulan YYYY)
 */
function formatTanggal($tanggal) {
    $bulan = array(
        1 => "Januari", 2 => "Februari", 3 => "Maret", 4 => "April",
        5 => "Mei", 6 => "Juni", 7 => "Juli", 8 => "Agustus",
        9 => "September", 10 => "Oktober", 11 => "November", 12 => "Desember"
    );

    $pecah = explode("-", $tanggal); // [0] = tahun, [1] = bulan, [2] = tanggal
    $tahun = $pecah[0];
    $bulanAngka = (int) $pecah[1];
    $hari = $pecah[2];

    return $hari . " " . $bulan[$bulanAngka] . " " . $tahun;
}

/**
 * Function 2: labelPrioritas
 * Mengembalikan class CSS badge sesuai tingkat prioritas (Percabangan)
 */
function labelPrioritas($prioritas) {
    if ($prioritas == "Tinggi") {
        $class = "badge-tinggi";
    } elseif ($prioritas == "Sedang") {
        $class = "badge-sedang";
    } else {
        $class = "badge-rendah";
    }

    return '<span class="badge ' . $class . '">' . $prioritas . '</span>';
}

/**
 * Function 3: labelStatus
 * Mengembalikan class CSS badge sesuai status tugas (Percabangan)
 */
function labelStatus($status) {
    if ($status == "Selesai") {
        $class = "badge-selesai";
    } else {
        $class = "badge-belum";
    }

    return '<span class="badge ' . $class . '">' . $status . '</span>';
}

/**
 * Function 4: hitungSisaHari
 * Menghitung selisih hari dari hari ini sampai deadline (Perulangan tidak relevan disini,
 * tapi function ini dipakai untuk menunjukkan logika percabangan tambahan)
 */
function hitungSisaHari($deadline) {
    $hariIni = new DateTime(date("Y-m-d"));
    $tglDeadline = new DateTime($deadline);
    $selisih = $hariIni->diff($tglDeadline);

    if ($tglDeadline < $hariIni) {
        return "Lewat deadline";
    } elseif ($selisih->days == 0) {
        return "Hari ini";
    } else {
        return $selisih->days . " hari lagi";
    }
}
?>
