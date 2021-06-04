<?php
include "config.php";
$username = $_POST['username'];
$password = $_POST['password'];
if (empty($username)) {
    echo "<script>alert('Username belum diisi')</script>";
    echo "<meta http-equiv='refresh' content='1 url=login.php'>";
} else if (empty($password)) {
    echo "<script>alert('Password belum diisi')</script>";
    echo "<meta http-equiv='refresh' content='1 url=login.php'>";
} else {
    $login = "select * from mahasiswa where nama='$username' and password='$password'";
    $result = mysqli_query($mysqli, $login);
    if ($data = mysqli_fetch_assoc($result)) {
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['tipe'] = $data['tipe'];
        $_SESSION['mahasiswa_id']=$data['id'];
        if ($_SESSION['tipe'] == 1) {
            echo "<script>alert('Anda Login sebagai Admin')</script>";
            echo "<meta http-equiv='refresh' content='1 url=index.php'>";
        } else if ($_SESSION['tipe'] == 2) {
            
            echo "<script>alert('Anda Login sebagai Mahasiswa')</script>";
            echo "<meta http-equiv='refresh' content='1 url=index.php?page=daftarkelas'>";
        }
        
    } else {
        echo "<script>alert('Username atau Password salah')</script>";
        echo "<meta http-equiv='refresh' content='1 url=login.php'>";
    }
}
?>