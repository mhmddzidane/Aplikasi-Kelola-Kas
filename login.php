<?php
// session_start();
require 'function.php';


// if (isset($_SESSION["login"])) {
//     header("location : index.php");
//     exit;
// }


if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

    //cek usernmae
    if (mysqli_num_rows($result) == 1) {
        //cek password
        $row = mysqli_fetch_assoc($result);
        if ($password = $row["password"]) {
            //set session
            // $_SESSION["login"] = true;

            // echo "masuk";
            header("location: index.php");
            exit;
        } else {
            echo "pass";
        }
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body class="login">
    <div class="login-card">
        <h1>Login</h1>
        <?php if (isset($error)) : ?>
            <p style="color:red;font-style:italic">username/password salah</p>
        <?php endif; ?>
        <form action="" method="post">
            <ul style='list-style-type: none;' ;>
                <li>
                    <label for="username">Username :</label>
                    <input type="text" name="username" id="username">
                </li>
                <li>
                    <label for="password">Password :</label>
                    <input type="password" name="password" id="password">
                </li>
                <li>
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember me</label>
                </li>
                <li>
                    <label for="regist">Blom punya akun?</label>
                    <a href="registrasi.php">Registrasi</a>
                </li>
                <li>
                    <button type="submit" name="login">Login</button>
                </li>
            </ul>
        </form>
    </div>
</body>

</html>