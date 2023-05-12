<?php
session_start();

require 'koneksi.php';
$email = $_POST['email'];
$password = $_POST['password'];

if(isset($email) && isset($password)){
    $query= "SELECT * FROM USERS WHERE email='$email' AND password='$password'";
    $select= $conn->query($query);
    if ($select->num_rows > 0){
        $row = $select->fetch_assoc();
        $_SESSION['is_login'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['message'] = "Anda berhasil login!";
        header('Location: user.php');
    } else {
        $_SESSION['message'] = "Email atau Password anda salah!";
        header('Location: login.php');
    }
} else {
    header('Location: log.php');
}
?>