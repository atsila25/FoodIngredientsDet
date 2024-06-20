<?php
$koneksi = mysqli_connect("localhost", "root", "", "foodingredients");
function registrasi($data)
{
    global $koneksi;
    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Terimakasih username anda sudah terdaftar');</script>";
        return false;
    }

    //cek konfirmasi password
    if ($password !== $password) {
        echo "<script>alert('konfirmasi password tidak sesuai');</script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan userbaru ke database
    mysqli_query($koneksi, "INSERT INTO user(username, password) VALUES('$username', '$password')");

    return mysqli_affected_rows($koneksi);
}
