<?php
session_start();
session_destroy();
// echo "<script>alert('Apakah Yakin Anda Logout ?')</script>";
echo "<script>alert('Terima kasih, Anda Berhasil Logout')</script>";
echo "<meta http-equiv='refresh' content='1 url=login.php'>";
?>