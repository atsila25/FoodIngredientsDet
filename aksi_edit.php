<?php
session_start();
include "connection.php";
$user = $_SESSION['username'];
$ingredient = $_POST['ingredient'];
$sql = "INSERT INTO choose(username, id_ingredients) VALUES ('".$user."','".$ingredient."')";
$a = $koneksi->query($sql);
if ($a === true) {
    header("location:editAcc.php");
}