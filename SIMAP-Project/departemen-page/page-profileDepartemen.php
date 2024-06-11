<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="icon" href="../assets/simap.png">
    <link rel="stylesheet" href="../departemen-style/style-formAjukan.css">
    <script src="https://kit.fontawesome.com/97216fb713.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="daftarAset">
        <div class="container"> 
        <nav class="sidebar">
                <div class="logo"> 
                    <a href="page-berandaDepartemen.php"> <img src="../assets/simap.png" class="logo" alt="Logo SIMAP"></a>
                </div>
                <ul>
                    <li><a href="page-berandaDepartemen.php">Beranda</a></li>
                    <li><a href="page-daftarAset.php">Daftar Aset</a></li>
                    <li><a href="#">Daftar Pengajuan <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="dropdown">
                            <li><a href="page-PengadaanDepartemen.php">Pengadaan Aset</a></li>
                            <li><a href="page-alokasiDepartemen.php">Alokasi Aset</a></li>
                            <li><a href="page-pemeliharaanDepartemen.php">Pemeliharaan Aset</a></li>
                            <li><a href="page-pembuanganDepartemen.php">Pembuangan Aset</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <div class="header">
                <div class="menu-bar">
                   <a href="#"><i class="fa-solid fa-bars" style="color: #4a55a2;"></i></a>
                   <h1>Profile</h1>
                </div>
                <ul>
                    <li class="admin-profile"><a href="#">
                        <i class="fa-solid fa-circle-user" style="color: #4a55a2;"></i>
                    </a>
                    </li>
                    <li class="username">
                        <a href="#">Admin Departemen</a>
                    </li>
                </ul>
            </div>

            <div class="box">
                <div class="content">
                    <form class="info" method="POST" action="/updateProfile">
                        <h1>Edit Profil</h1>
                        <div class="info-item">
                            <span class="label">Role</span>
                            <input type="text" name="role" value="Admin Perusahaan" class="edit-field">
                        </div>
                        <div class="info-item">
                            <span class="label">Nama</span>
                            <input type="text" name="name" value="Baskara Aji" class="edit-field">
                        </div>
                        <div class="info-item">
                            <span class="label">Email</span>
                            <input type="email" name="email" value="baskaraaji@gmail.com" class="edit-field">
                        </div>
                        <div class="info-item">
                            <span class="label">Contact</span>
                            <input type="text" name="contact" value="+628117281111" class="edit-field">
                        </div>
                        <div class="button-container">
                            <button type="button" class="editButton" onclick="window.location.href='#'">
                                <i class="fa-solid fa-arrow-left"></i> Kembali
                            </button>
                            <button type="submit" class="saveButton">
                                <i class="fa-solid fa-floppy-disk"></i> Simpan
                            </button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>   
    </div> 
</body>
</html>