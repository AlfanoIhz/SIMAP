<?php
include 'koneksi.php';

$id = $_POST['id'];
$status = $_POST['status'];

// Update status di database
$query = "UPDATE pengajuan_pemeliharaan SET status='$status' WHERE idPengajuanPemeliharaan=$id";
$result = mysqli_query($mysqli, $query);

if ($result) {
    echo 'Success';
} else {
    echo 'Error: ' . mysqli_error($mysqli);
}
?>