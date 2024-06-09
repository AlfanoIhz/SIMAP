<?php
session_start();
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);

    // Mengecek kondisi jika user ada atau tidak
    $sql_user = mysqli_query($mysqli, "SELECT * FROM admin_departemen WHERE username='$username' AND password='$password'");
    $cek_user = mysqli_num_rows($sql_user);

    if ($cek_user > 0) {
        $_SESSION['login'] = true;
        header('Location: ../departemen-page/page-berandaDepartemen.php');
        exit();
    } else {
        header('Location: ../departemen-page/login-Departemen.php');
        exit();
    }
} else {
    header('Location: ../departemen-page/login-Departemenindex.php');
    exit();
}
?>
