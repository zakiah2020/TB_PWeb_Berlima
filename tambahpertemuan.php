<?php
include("config.php");
$kelas_id = $_GET['kelas_id'];
$pertemuanKe = $_GET['pertemuanKe'];
if ($_SESSION['lock'] != "unlock") {
    header("location:index.php");
}
?>

<center>
    <font size="6">Tambah Pertemuan</font>
</center>
<hr>
<div class="container">
    <a href="index.php?page=detailkelas&&id=<?= $kelas_id ?>" class="btn btn-success btn-sm">Kembali</a><br><br>
    <form action="" method="POST">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Pertemuan Ke</label>
            <div class="col-md-6 col-sm-6 ">
                <input type="number" name="pertemuan" class="form-control" size="4" value="<?= $pertemuanKe ?>" readonly required>
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal</label>
            <div class="col-md-6 col-sm-6 ">
                <input type="date" name="tanggal" class="form-control" size="4" required>
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Materi</label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" name="materi" class="form-control" size="4" required>
            </div>
        </div>

        <!--<table style="color:black; font-family: sans-serif;">
                <tr>
                    <td>Pertemuan Ke</td>
                    <td><input type="number" name="pertemuan" value="<?= $pertemuanKe ?>" readonly required></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td><input type="date" name="tanggal" size="30" required></td>
                </tr> -->
        <!-- <tr>
                    <td>Materi</td>
                    <td><input type="text" name="materi" size="30" required></td>
                </tr> -->
        <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
                <input type="submit" name="simpan" class="btn btn-success btn-sm" value="Simpan">
            </div>
        </div>

        <!-- <tr>
                    <td></td>
                    <td><input type="submit" name="simpan" value="simpan" class="btn btn-success btn-sm"></td>
                </tr> 
            </table>-->
    </form>
</div>
<?php
if (isset($_POST['simpan'])) {

    $pertemuan = $_POST['pertemuan'];
    $tanggal = $_POST['tanggal'];
    $materi = $_POST['materi'];
    $result = mysqli_query($mysqli, "INSERT INTO pertemuan (pertemuan_id,kelas_id,pertemuan_ke,tanggal,materi) VALUES ('','$kelas_id','$pertemuan','$tanggal','$materi')") or die(mysqli_error($mysqli));

?>
    <script>
        alert("Berhasil menambahkan data.");
        document.location.href = "index.php?page=detailkelas&&id=<?= $kelas_id ?>";
    </script>

<?php
}
?>