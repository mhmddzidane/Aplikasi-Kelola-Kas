<?php

$conn = mysqli_connect("localhost", "root", "", "webkas");

function registrasi($data)
{
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau blom
    $result = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('username sudah terdaftar, mohon pilih username lain ')
        </script>";
        return false;
    }

    //cek konfirm password
    if ($password !== $password2) {
        echo "<script>
        alert('konfirmasi password salah')
        </script>";
        return false;
    }

    //enkripsi pass
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambah user ke database
    mysqli_query($conn, "INSERT INTO admin VALUES('','$username','$password')");
    return mysqli_affected_rows($conn);
}
