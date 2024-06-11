<?php
include '../php/koneksi.php'; // Database connection

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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;;
            background-color: #ededed; 
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 900px;
            padding: 20px;
        }
        h1, h2 {
            text-align: center;
            color: #333;
        }
        .report-details {
            margin-bottom: 20px;
        }
        .report-details h2, .report-details p {
            margin: 0;
            padding: 5px 0;
            color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 14px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #4a55a2;
            color: white;
            font-weight: 500;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }
        .form-group label {
            margin-bottom: 5px;
            font-weight: 500;
        }
        .form-group input {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-actions {
            text-align: right;
        }
        .form-actions button {
            padding: 10px 20px;
            background-color: #4facfe;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Laporan Aset</h1>
        <div class="report-details">
            <h2><?php echo $report['judul']; ?></h2>
            <p>Departemen: <?php echo $report['departemen']; ?></p>
            <p>Tahun: <?php echo $report['tahun']; ?></p>
        </div>
        <table>
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
    </div>
</body>
</html>