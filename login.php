<?php 
    session_start();
    require 'functions.php';
    
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
        $data['username'] = $_POST['username'];
        $data['email'] = $_POST['email'];
        $data['password'] = $_POST['password'];
        
        if (login($data)){
            $_SESSION['username'] = $data['username'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['password'] = $data['password'];
            $_SESSION['admin'] = $data['admin'];
            $_SESSION['login'] = true;
            echo "<script>
            alert('Login Berhasil');
            document.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
            alert('Login Gagal');
            document.location.href = 'login.php';
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="style/login.css" >
</head>
<body> 
    <div class="login-container" >
        <div class="login-box">
            <h1>Selamat Datang Di 3Senar</h1>
            <h2>Silahkan login</h2>
            <form action="" method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email"  placeholder="name@gmail.com" required>
                <input type="password" name="password" placeholder="Password" required>
                <div class="sub-option">
                    <div class="remember-me">
                        <input type="checkbox" id="remember">
                        <label for="remember">Ingatkan Saya</label>
                    </div>
                    <div class="forgot">
                         <a href="#">Lupa Password?</a>
                    </div>
                </div>
                <button type="submit" >Login</button>
            </form>
            <p>Tidak punya akun? <a href="signup.php">Sign Up</a></p>
        </div>
    </div>
</body>
</html>