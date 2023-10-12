<!-- <?php
$username = $_POST['username'];
session_start();
$_SESSION['username']=$username;
session_destroy();
header("Location:index.php");

?> -->
<?php
session_start();
// Sekarang sesi telah dimulai

$_SESSION['username'] = 'JohnDoe';
$_SESSION['email'] = 'johndoe@example.com';

$username = $_SESSION['username'];
$email = $_SESSION['email'];

session_destroy();

if (session_status() == PHP_SESSION_ACTIVE) {
    // Sesuai aktif
}

?>