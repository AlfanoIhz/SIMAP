<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="assets/simap.png">    
    <link rel="stylesheet" href="style/style-loginPerusahaan.css">
    <script src="https://kit.fontawesome.com/97216fb713.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <img src="assets/simap.png" class="logo" alt="SIMAP Logo" />
        <div class="login-box">
            <h4>Welcome Back. <span>Please Login!</span></h4>
            <form action="php/login-perusahaan.php" method="POST">
                <div class="input-box">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="input-box">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required >
                </div>
                
                <div class="btn-login">
                <input type="submit" value="Login">
                </div>
            </form>
        </div>
    </div>
</body>
</html>

