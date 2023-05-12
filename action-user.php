<?php
session_start();
if(isset($_SESSION['is_login']) && ($_SESSION['is_login']) == true):
// Koneksi ke database
require 'koneksi.php';
// Ambil data dari form
if(isset($_POST['adduser']))
{
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
                $_SESSION['message'] = "Data berhasil ditambahkan!";
                header("Location: user.php");
                exit(0);
            } else {
                $_SESSION['message'] = "Data gagal disimpan!";
                header("Location: user.php");
            }
        }
    }else {
        $_SESSION['message'] = "Data gagal disimpan!";
        header("Location: user.php");
    }
}

if(isset($_POST['edituser']))
{
$id = $_POST['id'];
$name = $_POST['name'];
$role = $_POST['role'];
$password = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$alamat = $_POST['alamat'];
$avatar = $_POST['avatar'];

// Query untuk mengubah data
$query = "UPDATE users SET email='$email',name='$name',role='$role',avatar='$avatar',phone='$phone',address='$address',password='$password' WHERE id='$id'";
//Eksekusi query
if (mysqli_query($conn, $query)) {
    $_SESSION['message'] = "Data berhasil diubah!";
    header("Location: user.php");
    exit(0);
} else {
    echo 'Error: ' . mysqli_error($conn);
}
}

if(isset($_POST['deluser']))
{
$id = $_POST['deluser'];

// Query untuk menghapus data
$query = "DELETE FROM users WHERE id='$id'";
//Eksekusi query
if (mysqli_query($conn, $query)) {
    $_SESSION['message'] = "Data berhasil dihapus!";
    header("Location: user.php");
    exit(0);
} else {
    echo 'Error: ' . mysqli_error($conn);
}
}
?>
<?php else :
    header('Location: login.php');
endif;
?>