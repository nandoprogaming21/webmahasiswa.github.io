<?php
include 'koneksi.php';
$usrename=$_POST['usrename'];
$password=md5($_POST['password']);

$login=$mysql_query("SELECT * from login  where username='$username' and password='$password'");
$cek=mysqli_num_rows($login);

if ($cek > 0) {
    header(("location:index.html"));

}else{
    header('location:gagal.html');
}

?>