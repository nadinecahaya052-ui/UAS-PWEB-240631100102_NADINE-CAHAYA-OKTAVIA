<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($judul_halaman) ? $judul_halaman . " - To-Do List App" : "To-Do List App"; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <nav class="navbar">
        <a href="index.php" class="brand">📝 To-Do List App</a>
        <div class="nav-links">
            <a href="index.php">Beranda</a>
            <a href="tambah.php">Tambah Data</a>
            <a href="daftar.php">Daftar Data</a>
        </div>
    </nav>

    <div class="container">
