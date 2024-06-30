<?php
session_start();
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);

    // Mengecek kondisi jika user ada atau tidak
    $sql_user = mysqli_query($mysqli, "SELECT * FROM admin_perusahaan WHERE username='$username' AND password='$password'");
    $cek_user = mysqli_num_rows($sql_user);

    if ($cek_user > 0) {
        // Jika login berhasil, simpan ID pengguna ke dalam session
        $user_data = mysqli_fetch_assoc($sql_user);
        $_SESSION['user_id'] = $user_data['id'];
        
        // Atur session login menjadi true
        $_SESSION['login'] = true;
        
        // Arahkan pengguna ke halaman beranda
        header('Location: ../page-Beranda.php');
        exit();
    } else {
        // Jika login gagal, arahkan pengguna kembali ke halaman login dengan pesan kesalahan
        $_SESSION['error'] = "Login failed: Incorrect username or password.";
        header('Location: ../login-Perusahaan.php');
        exit();
    }
} else {
    // Jika metode request bukan POST, arahkan pengguna kembali ke halaman login
    header('Location: ../login-Perusahaan.php');
    exit();
}
?>

