<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'config.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
//$password = md5($_POST['password']);

// menyeleksi data admin dengan username dan password yang sesuai
$data = $connect->query("SELECT * FROM db_user WHERE username='$username' and password='$password'");
$ex	  = $data->fetch_object();

// menghitung jumlah data yang ditemukan
 $cek = $data->num_rows;

	echo $cek;


if($cek > 0){
	$_SESSION['username'] = $username;
	$_SESSION['level'] 	  = $ex->akses;
	$_SESSION['status']   = "login";
	header("location:home?p=dashboard");
}else{
	header("location:index.html");
}
?>
