<?php
require 'koneksi.php';
    $ekstensi_diperbolehkan	= array('png','jpg');
    $nama = $_FILES['avatar']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $ukuran	= $_FILES['avatar']['size'];
    $file_tmp = $_FILES['avatar']['tmp_name'];	

    $name = $_POST['name'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $alamat = $_POST['alamat'];


    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 1044070){			
            move_uploaded_file($file_tmp, 'images/'.$nama);
            $query = "INSERT INTO users (email,name,role,avatar,phone,address,password) 
            VALUES ('$email','$name','$role','$nama','$phone','$alamat','$password')";
            if (mysqli_query($conn, $query)) {
                header("Location: user.php");
                exit(0);
            } else {
                echo 'Error: ' . mysqli_error($conn);
            }
        }
    }
?>