<?php
require 'koneksi.php';
// $email = $_POST["email"];
// $password = $_POST["password"];

$query_sql = "INSERT INTO tbl_users (email,password)
--              VALUES ('$email', '$password')";

 if (mysqli_query($koneksi,"$conn", "$query_sql")) {
    header("location: index.php");
} else  {
    echo "pendaftaran gagal : " .mysqli_error($conn);
}
?>s