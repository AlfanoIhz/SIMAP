<?php
include 'php/koneksi.php'; // Database connection

// Fetch report details based on ID
$id = (int)$_GET['id'];
$sql_fetch_report = "SELECT * FROM laporan_aset WHERE id = $id";
$result_report = mysqli_query($mysqli, $sql_fetch_report);
$report = mysqli_fetch_assoc($result_report);

// Fetch assets based on report details
$sql_fetch_assets = "SELECT * FROM aset WHERE departemen = '{$report['departemen']}' AND MONTH(tanggalMasuk) = {$report['bulan']} AND YEAR(tanggalMasuk) = {$report['tahun']}";
$result_assets = mysqli_query($mysqli, $sql_fetch_assets);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Laporan Aset</title>
</head>
<body>
    <h1>Detail Laporan Aset</h1>
    <h2><?php echo $report['judul']; ?></h2>
    <p>Departemen: <?php echo $report['departemen']; ?></p>
    <p>Bulan: <?php echo $report['bulan']; ?></p>
    <p>Tahun: <?php echo $report['tahun']; ?></p>

    <table border="1">
        <tr>
            <th>ID Aset</th>
            <th>Nama Aset</th>
            <th>Kategori Aset</th>
            <th>Jumlah</th>
            <th>Departemen</th>
            <th>Tanggal Masuk</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result_assets)) { ?>
            <tr>
                <td><?php echo $row['idAset']; ?></td>
                <td><?php echo $row['namaAset']; ?></td>
                <td><?php echo $row['kategoriAset']; ?></td>
                <td><?php echo $row['jumlah']; ?></td>
                <td><?php echo $row['departemen']; ?></td>
                <td><?php echo $row['tanggalMasuk']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
