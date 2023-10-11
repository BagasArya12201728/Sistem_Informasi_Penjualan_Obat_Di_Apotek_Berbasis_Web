<?php

$servername = "localhost";
$database 	= "db_apotek";
$username 	= "root";
$password 	= "";

$connect 	= new mysqli($servername, $username, $password, $database);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
