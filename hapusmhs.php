<?php
include("config.php");
$id = $_GET['id'];
if ($_SESSION['lock'] != "unlock") {
    header("location:index.php");
}
$result = mysqli_query($mysqli, "DELETE FROM mahasiswa WHERE id='$id'");

if (mysqli_affected_rows($mysqli)>0)
{
echo "<script>
    alert('Data Berhasil dihapus');
    document.location.href = 'index.php?page=tampil_mhs';
</script>";
}
else
{
echo "<script>
    alert('Data Gagal dihapus');
    document.location.href = 'index.php?page=tampil_mhs';
</script>";

}
?>