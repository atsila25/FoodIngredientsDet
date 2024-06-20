<?php
session_start();
include "connection.php";
$user = $_POST['username'];
$psw = $_POST['password'];
$op = $_GET['op'];

if($op == "in"){
    $sql = "SELECT * FROM user WHERE username='$user' AND password='$psw'";
    $query = $koneksi->query($sql);
    if(mysqli_num_rows($query) == 1){
        $data = $query->fetch_array();
        if($_SESSION['username'] = $data['username']) {
            header("Location: mainMenu.php");
        }else{
            die("Password Incorrect <a href=\"javascript:history.back()\">kembali</a>");
        }
    }else if($op == "out"){
        unset($_SESSION['username']);
        header("Location: login.php");
    }
}
?>