<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="icon" href="../assets/simap.png">
    <link rel="stylesheet" href="../departemen-style/style-berandaDepartemen.css">
    <script src="https://kit.fontawesome.com/97216fb713.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="page">
        <div class="container"> 
            <nav class="sidebar">
                <div class="logo"> 
                    <a href="#"> <img src="../assets/simap.png" class="logo" alt="Logo SIMAP"></a>
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
                    <h1>Beranda</h1>
                </div>
                <ul>
                    <li class="admin-profile"><a href="../departemen-page/page-profileDepartemen.html">
                        <i class="fa-solid fa-circle-user" style="color: #4a55a2;"></i>
                    </a>
                    </li>
                    <li class="username">
                        <a href="#" id="profile-button-text">Admin Departemen</a>
                        <div class="dropdown-menu" id="profile-dropdown">
                            <button onclick="editProfile()">Profil</button>
                            <button onclick="logout()">Logout</button>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="box">
                <div class="content">
                    <img src="../assets/simap.png" alt="SIMAP Logo" class="main-logo">
                    <h1>SISTEM MANAJEMEN ASET PERUSAHAAN</h1>
                    <p>Address: Jalan Soekarno Hatta No. 1, Tangerang, Jakarta 156789</p>
                    <p>Phone: +6221 8556 2024</p>
                    <p>Website: simap.com</p>
                </div>
            </div>
        </div>   
    </div> 

    <script>
        function editProfile() {
            window.location.href = "page-profilDepartemen.php";
        }

        function logout() {
            window.location.href = "../index.php";
        }
    </script>
</body>
</html>