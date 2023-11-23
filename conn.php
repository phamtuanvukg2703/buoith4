<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "bh1";
$conn = mysqli_connect($hostname, $username, $password,$dbname);
mysqli_set_charset($conn, 'utf8mb4');
if ($conn -> connect_error){
    die("Kết nối không thành công: " .$conn -> connect_error);
}
?>