<?php
include 'config.php';
$krs_id = $_GET['krs_id'];
$id = $_GET['id'];
$cek = isset($_GET['cek']) ? $_GET['cek'] : '';
if ($_SESSION['lock'] != "unlock") {
    header("location:index.php");
}

if ($cek == null) {
?>

    <script>
        alert("Semua data user yang dipilih akan dihapus dari kelas termasuk absensi.")
        var check = confirm("Apakah Yakin?")
        if (check == true) {
            document.location.href = "index.php?page=hapuspengampu&&krs_id=<?= $krs_id ?>&&id=<?= $id ?>&&cek=true";
        } else {
            alert("Data gagal dihapus");
            document.location.href = "index.php?page=detailkelas&&id=<?= $id ?>";
        }
    </script>
<?php
} else {
    $delete = mysqli_query($mysqli, "DELETE FROM absensi WHERE krs_id='$krs_id'");
    $delete = mysqli_query($mysqli, "DELETE FROM krs WHERE krs_id='$krs_id'");
?>
    <script>
        alert("Data berhasil dihapus");
        document.location.href = "index.php?page=detailkelas&&id=<?= $id ?>";
    </script>
<?php
}
?>