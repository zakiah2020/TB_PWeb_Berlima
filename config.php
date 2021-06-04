<?php
//start session
session_start();
$_SESSION['lock'] = "lock";
//koneksi ke database mysql,
$mysqli = mysqli_connect("localhost","root","","tb-pweb");

//cek jika koneksi ke mysql gagal, maka akan tampil pesan berikut
if (mysqli_connect_errno()){
	echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
}
