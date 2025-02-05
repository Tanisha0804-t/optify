<?php
$servername= 'localhost';
$username = "root";
$password = "";  
$database = "optify";
$conn=mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " .mysqli_connect_error());
}
?>