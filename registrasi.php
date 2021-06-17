<?php

require 'function.php';



if (isset($_POST["registrasi"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
        alert('user baru ditambah')
        </script>";
        header("location: login.php");
        exit;
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body class="login">
    <div class="login-card">
        <h1>Registrasi</h1>
        <form action="" method="post">
            <ul style="list-style-type: none;">
                <li>
                    <label for="username">username :</label>
                    <input type="text" name="username" id="username">
                </li>
                <li>
                    <label for="password">password :</label>
                    <input type="password" name="password" id="password">
                </li>
                <li>
                    <label for="password2 ">konfirmasi password :</label>
                    <input type="password" name="password2" id="password2">
                </li>
                <li>
                    <button type="submit" name="registrasi">Registrasi</button>
                    <a href="login.php">Login</a>
                </li>
            </ul>

        </form>
    </div>
</body>

</html>