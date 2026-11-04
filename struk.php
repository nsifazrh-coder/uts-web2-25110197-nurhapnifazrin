<?php
// NO 1: Array multidimensi
$keranjang = [
    ['nama' => 'Kopi Susu', 'harga' => 18000, 'jumlah' => 2],
    ['nama' => 'Teh Manis', 'harga' => 8000, 'jumlah' => 3],
    ['nama' => 'Roti Bakar', 'harga' => 15000, 'jumlah' => 1],
];

// NO 2: Fungsi hitungSubtotal
function hitungSubtotal(int $harga, int $jumlah): int {
    return $harga * $jumlah;
}

// NO 2: Fungsi formatRupiah
function formatRupiah(int $angka): string {
    return "Rp " . number_format($angka, 0, ',', '.');
}

// NO 4: Hitung Total, Diskon, Total Bayar
$total = 0;
foreach ($keranjang as $item) {
    $total += hitungSubtotal($item['harga'], $item['jumlah']);
}

$diskon = 0;
if ($total > 50000) {
    $diskon = (int)($total * 0.10);
}

$totalBayar = $total - $diskon;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kedai Kopi</title>
</head>
<body>
    <h2>STRUK KASIR KEDAI KOPI</h2>
    <p>Tanggal: <?= date('d-m-Y'); ?></p>

    <!-- NO 3: Tampil pakai foreach -->
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
        </tr>
        <?php foreach ($keranjang as $item): ?>
        <tr>
            <td><?= $item['nama']; ?></td>
            <td><?= formatRupiah($item['harga']); ?></td>
            <td><?= $item['jumlah']; ?></td>
            <td><?= formatRupiah(hitungSubtotal($item['harga'], $item['jumlah'])); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!-- NO 4: Hasil Perhitungan -->
    <p>Total: <b><?= formatRupiah($total); ?></b></p>
    <p>Diskon 10%: <b><?= formatRupiah($diskon); ?></b></p>
    <p>Total bayar: <b><?= formatRupiah($totalBayar); ?></b></p>
</body>
</html>