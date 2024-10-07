<?php 
$_SERVER = 'localhost';
$username = 'root';
$password = '';
$database = 'wigshop';
$conn = mysqli_connect($_SERVER, $username, $password, $database);
mysqli_query($conn, 'set names "utf8"');
?>