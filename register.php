<?php
require "koneksi.php";

if (isset($_POST['registerbtn'])) {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = mysqli_query($conn, "INSERT INTO login (username, email, password) VALUES ('$username','$email', '$hashed_password')");
    
    if ($query) {
        header('location: login.php');
    } else {
        $error = "Gagal membuat akun. Silakan coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Akun</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
</head>

<style>
    body {
        background: linear-gradient(to right, #0062E6, #33AEFF);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        font-family: 'Arial', sans-serif;
    }

    .register-box {
        width: 400px;
        padding: 30px;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .register-box h2 {
        margin-bottom: 20px;
        font-size: 24px;
        color: #333;
    }

    .register-box .form-control {
        margin-bottom: 15px;
        padding: 10px;
        border-radius: 5px;
    }

    .register-box .btn {
        background: #0062E6;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        color: #fff;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .register-box .btn:hover {
        background: #004bb5;
    }

    .alert {
        margin-top: 20px;
    }
</style>

<body>
    <div class="register-box">
        <h2>Register</h2>
        <form action="" method="post">
            <div>
                Username
                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
            </div>
            <div>
                Email
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
            </div>
            <div>
                Password
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <div>
                <button class="btn form-control mt-3" type="submit" name="registerbtn">Register</button>
            </div>
        </form>
        <div class="mt-3">
            <?php
            if (isset($error)) {
                echo "<div class='alert alert-warning' role='alert'>$error</div>";
            }
            ?>
        </div>
    </div>
</body>

</html>
