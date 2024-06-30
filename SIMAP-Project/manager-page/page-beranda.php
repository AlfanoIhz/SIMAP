<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="stylesheet" href="../manager-style/style-beranda.css">
    <script src="https://kit.fontawesome.com/97216fb713.js" crossorigin="anonymous"></script>
    <style>
        /* Add styles for the dropdown menu */
        .dropdown-menu {
            display: none;
            position:fixed;
            background-color: #4a55a2;
            min-width: 120px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            margin-top: 10px; /* Menyesuaikan margin-top */
            padding: 5px 0; /* Menyesuaikan padding */
        }

        .dropdown-menu button {
            color: white;
            padding: 8px 16px; /* Menyesuaikan padding */
            text-decoration: none;
            display: block;
            background: none;
            border: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
        }


        .dropdown-menu button:hover {
            background-color: #3e4b8c;
        }

        .username:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>
<body>
    <div id="daftarAset">
        <div class="container"> 
            <nav class="sidebar">
                <div class="logo-container"> 
                    <a href="#"><img src="../assets/simap.png" class="logo" alt="Logo SIMAP"></a>
                </div>
                <ul>
                    <li><a href="#">Beranda</a></li>
                    <li><a href="laporanAset.php">Laporan Aset</a></li>
                </ul>
            </nav>

            <div class="header">
                <div class="menu-bar">
                    <a href="#"><i class="fa-solid fa-bars" style="color: #4a55a2;"></i></a>
                    <h1>Beranda</h1>
                </div>
                <ul>
                    <li class="admin-profile">
                        <a href="#" id="profile-button">
                            <i class="fa-solid fa-circle-user" style="color: #4a55a2;"></i>
                        </a>
                    </li>
                    <li class="username">
                        <a href="#" id="profile-button-text">Manager Aset</a>
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
            window.location.href = "profil.php";
        }

        function logout() {
            window.location.href = "../index.php";
        }
    </script>
</body>
</html>
