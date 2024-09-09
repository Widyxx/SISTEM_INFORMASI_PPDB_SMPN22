<?php
    include '../../utils/connect.php';

    session_start();

    if (empty($_SESSION) == false) {
        header('location:dashboard.php');
    }
    
    if (isset($_POST['login-btn'])) {
        $username = $_POST['username'];
        $pass     = $_POST['pass'];

        $query = mysqli_query($conn, "SELECT * FROM db_admin WHERE username = '$username' AND pass_user = $pass LIMIT 1");
        $row = mysqli_fetch_array($query);
        if (mysqli_num_rows($query) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['name'] = $row['nama_user'];
            header("location:dashboard.php");
        }else{
            echo '<script>alert("username/password salah!")</script>';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/adminlogin-style/style.css">
    <title>ADMIN LOGIN | PPDB SMP NEGERI 22 MALUKU TENGAH</title>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="admin-header">
                <span class="admin-title">
                    <img src="../../assets/images/kemiri_logo.png" alt="kemiri-logo" height="45">
                    <div class="header-title-container">
                        <div class="header-title">PPDB SMP NEGERI 22 MALUKU TENGAH</div>
                        <div class="header-subtitle">ADMIN LOGIN</div>
                    </div>
                </span>
            </div>
            <div class="form-container">
                <form action="" method="post">
                    <input type="text" name="username" id="" placeholder="username"><br>
                    <input type="password" name="pass" id="" placeholder="password"><br>
                    <div class="see-password">
                        <input type="checkbox" name="" id="see-pass" placeholder="password">
                        <label for="see-pass">Lihat Password</label>
                    </div><p>
                    <input type="submit" name="login-btn" id="" value="Login">
                </form>
                <!-- <a href="dashboard.php"><button>Login</button></a> -->
            </div>
        </div>
    </div>
</body>
</html>