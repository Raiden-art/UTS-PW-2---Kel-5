<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Harga Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 20px;
        }
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .summary {
            width: 80%;
            margin: 20px auto;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
        }
        h2, h3 {
            text-align: center;
        }
    </style>
</head>
<body>

    <h2>Tabel Harga Barang</h2>

    <?php
    // Array multidimensi untuk barang
    $barang = [
        ["id" => 1, "produk" => "Pepsodent", "stok" => 30, "harga" => 11980],
        ["id" => 2, "produk" => "Sunlight", "stok" => 15, "harga" => 12880],
        ["id" => 3, "produk" => "baygon", "stok" => 10, "harga" => 16779],
        ["id" => 4, "produk" => "Dove", "stok" => 20, "harga" => 22688],
        ["id" => 5, "produk" => "Rinso", "stok" => 20, "harga" => 20769],
        ["id" => 6, "produk" => "Downy", "stok" => 15, "harga" => 12880],
        ["id" => 7, "produk" => "Le Mineral", "stok" => 25, "harga" => 5650]
    ];

    // Fungsi untuk menghitung total harga per produk
    function hitungJumlah($barang) {
        return $barang['stok'] * $barang['harga'];
    }

    // Menampilkan tabel barang
    echo "<table>";
    echo "<tr><th>ID</th><th>Produk</th><th>Stok</th><th>Harga</th><th>Jumlah</th></tr>";
    $totalSemua = 0;

    foreach ($barang as $item) {
        $jumlah = hitungJumlah($item);
        $totalSemua += $jumlah;

        echo "<tr>
                <td>{$item['id']}</td>
                <td>{$item['produk']}</td>
                <td>{$item['stok']}</td>
                <td>" . number_format($item['harga'], 0, ',', '.') . "</td>
                <td>" . number_format($jumlah, 0, ',', '.') . "</td>
              </tr>";
    }

    echo "</table>";

    // Menghitung diskon berdasarkan total belanja
    $diskon = 0;
    if ($totalSemua >= 300000) {
        $diskon = 0.20 * $totalSemua;
    } elseif ($totalSemua >= 200000) {
        $diskon = 0.10 * $totalSemua;
    }

    $totalPembayaran = $totalSemua - $diskon;
    ?>

   <div class="summary">
        <h3>Detail Transaksi</h3>
        <p>Tanggal Transaksi: <?php echo date('d F Y'); ?></p>
        <p>Produk           : </p>
        <p>Pepsodent   (30) : Rp. 359.400</p>
        <p>Rinso       (20) : Rp. 415.380</p>
        <p>Downy       (15) : Rp. 193.200</p>
        <p>Dove        (20) : Rp. 453.760</p>
        <p>Le Mineral  (25) : Rp. 141.250</p>
        <p>Total Belanja    : Rp <?php echo number_format($totalSemua, 0, ',', '.'); ?></p>
        <p>Diskon           : Rp <?php echo number_format($diskon, 0, ',', '.'); ?></p>
        <p>Total Pembayaran : Rp <?php echo number_format($totalPembayaran, 0, ',', '.'); ?></p>
    </div>

</body>
</html>

<?php
// Array multidimensi untuk menyimpan data produk (nama, stok, harga satuan)
$produk = [
  ["nama" => "Pepsodent", "stok" => 30, "harga" => 11980],
  ["nama" => "Sunlight", "stok" => 15, "harga" => 12880],
  ["nama" => "baygon", "stok" => 10, "harga" => 16779],
  ["nama" => "Dove", "stok" => 20, "harga" => 22688],
  ["nama" => "Rinso", "stok" => 20, "harga" => 20769],
  ["nama" => "Downy", "stok" => 15, "harga" => 12880],
  ["nama" => "Le Mineral", "stok" => 25, "harga" => 5650]
];

// Menghitung jumlah total per produk dan total keseluruhan
$totalKeseluruhan = 0;
foreach ($produk as &$item) {
    $item["jumlah"] = $item["stok"] * $item["harga"];
    $totalKeseluruhan += $item["jumlah"];
}

// Menghitung diskon
$diskon = 0;
if ($totalKeseluruhan > 400000) {
    $diskon = 0.30 * $totalKeseluruhan;
} elseif ($totalKeseluruhan > 200000) {
    $diskon = 0.15 * $totalKeseluruhan;
}
$totalPembayaran = $totalKeseluruhan - $diskon;

// Tanggal transaksi
$tanggalTransaksi = date("d F Y");

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 400px;
            margin: auto;
            border: 1px solid #ddd;
            padding: 20px;
        }
        .header, .footer {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
            font-size: 20px;
        }
        .line-item {
            display: flex;
            justify-content: space-between;
            padding: 5px 0;
        }
        .line-item strong {
            font-weight: bold;
        }
        .total, .discount, .payment-total {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>

<div class="header">
    <h2>Struk Pembayaran</h2>
    <p>Tanggal Transaksi: <?= $tanggalTransaksi; ?></p>
</div>

<!-- Daftar Produk -->
<?php foreach ($produk as $item): ?>
<div class="line-item">
    <span><?= $item["nama"]; ?> (<?= $item["stok"]; ?> x <?= number_format($item["harga"], 0, ',', '.'); ?>)</span>
    <span><?= number_format($item["jumlah"], 0, ',', '.'); ?></span>
</div>
<?php endforeach; ?>

<!-- Total, Diskon, dan Total Pembayaran -->
<div class="total">
    <strong>Total:</strong>
    <span><?= number_format($totalKeseluruhan, 0, ',', '.'); ?></span>
</div>

<div class="discount">
    <strong>Diskon:</strong>
    <span><?= number_format($diskon, 0, ',', '.'); ?></span>
</div>

<div class="payment-total">
    <strong>Total Pembayaran:</strong>
    <span><?= number_format($totalPembayaran, 0, ',', '.'); ?></span>
</div>

<div class="footer">
    <p>Terima Kasih telah berbelanja!</p>
</div>

</body>
</html>