<?php
session_start();
include "koneksi.php";

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header('Location: ../login-manager.php');
    exit();
}

// Periksa apakah ID pengguna disimpan dalam sesi
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login-manager.php');
    exit();
}

// Ambil ID pengguna dari sesi
$user_id = $_SESSION['user_id'];

// Periksa apakah metode request adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirimkan dari formulir
    $role = mysqli_real_escape_string($mysqli, $_POST['role']);
    $nama = mysqli_real_escape_string($mysqli, $_POST['name']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $kontak = mysqli_real_escape_string($mysqli, $_POST['kontak']);

    // Query update untuk mengupdate data profil pengguna
    $query = "UPDATE manager SET role='$role', nama='$nama', email='$email', kontak='$kontak' WHERE id='$user_id'";

    // Eksekusi query
    if (mysqli_query($mysqli, $query)) {
        header('Location: ../manager-page/profil.php');
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }
} else {
    header('Location: ../manager-page/profil.php');
    exit();
}
?>
