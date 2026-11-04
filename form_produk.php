<?php
// No 5 + 6 + 7 digabung - form_produk.php

$nama_produk = "";
$harga = "";
$error_nama = "";
$error_harga = "";
$pesan_sukses = "";

// No 6: Validasi saat tombol Simpan dipencet
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_produk = $_POST["nama_produk"] ?? "";
    $harga = $_POST["harga"] ?? "";

    // Validasi Nama wajib diisi
    if (trim($nama_produk) == "") {
        $error_nama = "Nama produk wajib diisi!";
    }

    // Validasi Harga harus angka dan lebih dari 0
    if (trim($harga) == "" || !is_numeric($harga) || $harga <= 0) {
        $error_harga = "Harga harus angka dan lebih dari 0!";
    }

    // No 7: Jika valid, tampilkan pesan sukses dengan htmlspecialchars
    if ($error_nama == "" && $error_harga == "") {
        $pesan_sukses = "Produk " . htmlspecialchars($nama_produk, ENT_QUOTES, 'UTF-8') . " berhasil ditambahkan";
        // Kosongkan form setelah sukses
        $nama_produk = "";
        $harga = "";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Produk - Kedai Kopi</title>
</head>
<body>
    <h2>Tambah Produk Baru</h2>

    <!-- No 7: Pesan sukses -->
    <?php if ($pesan_sukses != ""): ?>
        <p style="color:green;"><?= $pesan_sukses; ?></p>
    <?php endif; ?>

    <!-- No 5: Form POST -->
    <form method="POST" action="">
        Nama Produk:<br>
        <input type="text" name="nama_produk" value="<?= htmlspecialchars($nama_produk); ?>">
        <div style="color:red;"><?= $error_nama; ?></div>
        <br>

        Harga:<br>
        <input type="text" name="harga" value="<?= htmlspecialchars($harga); ?>">
        <div style="color:red;"><?= $error_harga; ?></div>
        <br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>