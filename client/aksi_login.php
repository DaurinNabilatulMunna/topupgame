<?php
include 'koneksi.php';
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);
    $hasil = $result->fetch_assoc();

    if ($hasil['level']=="Admin") {
        $_SESSION['login'] = 'admin';
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header("Location: index.php");
    }else if ($hasil['level']=="User"){
        $_SESSION['login'] = 'user';
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header("Location: user/index.php");
    }else {
        $error = "Terjadi kesalahan dalam eksekusi query: " . mysqli_error($koneksi);
    }
}