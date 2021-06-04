<!-- POINT 16 Melihat Daftar Kelas yang diikuti -->
<?php
include("config.php");
if ($_SESSION['lock'] != "unlock") {
    header("location:index.php");
}
$user = $_SESSION['mahasiswa_id'];
?>

<div class="container"></div>
<?php

if ($_SESSION['tipe'] == "") {
    header("location:tambahkls.php?pesan=gagal");
}

?>
<center>
    <font size="6">Lihat Daftar Kelas</font>
</center>
<hr>

<?php
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT krs.krs_id, kelas.id,kelas.kode_kelas,kelas.kode_matkul,kelas.nama_matkul,kelas.tahun,kelas.semester,kelas.sks FROM krs
            join kelas on kelas.id=krs.kelas_id
            where mahasiswa_id=$user");
?>

<div class="row py-2">
    <div class="col-sm">

        <?php if (isset($message)) {
        ?>
            <div class="alert alert-success" role="alert">
                <?php echo $message; ?>
            </div>

        <?php
        }

        ?>

        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">ID Kelas</th>
                    <th class="text-center">Kode Kelas</th>
                    <th class="text-center">Kode Matkul</th>
                    <th class="text-center">Nama Matkul</th>
                    <th class="text-center">Tahun</th>
                    <th class="text-center">Semester</th>
                    <th class="text-center">SKS</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php
                while ($data = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $data['id'] ?></td>
                        <td><?php echo $data['kode_kelas'] ?></td>
                        <td><?php echo $data['kode_matkul'] ?></td>
                        <td><?php echo $data['nama_matkul'] ?></td>
                        <td><?php echo $data['tahun'] ?></td>
                        <td><?php echo $data['semester'] ?></td>
                        <td><?php echo $data['sks'] ?></td>
                        <td class="text-center">
                            <a href="index.php?page=detailkls&&id_krs=<?php echo $data['krs_id']; ?> && id_kelas=<?php echo $data['id']; ?>" class='btn btn-sm btn-primary'> Detail </a>
                        </td>
                    </tr>

                <?php

                }

                ?>
            </tbody>
        </table>
    </div>
</div>
</div>