<?php
include "connection.php";
$user = $_POST['username'];
$psw = $_POST['password'];
$sql = "INSERT INTO user (username, password) VALUES ('".$user."', '".$psw."')";
$query = $koneksi->query($sql);
if ($query === true) {
    header('location: login.php');
} else {
    echo "Error";
}
?>