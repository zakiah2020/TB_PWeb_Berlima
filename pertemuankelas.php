<?php
include "config.php";
$pertemuan_ke = $_GET['pertemuan_ke'];
$id = $_GET['id'];
if ($_SESSION['lock'] != "lock") {
    header("location:index.php");
}
?>

<div class="container" style="margin-top:20px">
    <center>
        <h2>Detail Pertemuan <?= $pertemuan_ke ?></h2>
    </center>

    <table class="table table-bordered ">
        <br>
        <h5>Data Mahasiswa Berstatus Hadir</h5>
        <thead class="thead-dark">
            <tr>
                <th style="width:2%">No</th>
                <th>Nama Mahasiswa</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Durasi</th>
            </tr>
        </thead>

        <?php
        $sql = "SELECT absensi.absensi_id, absensi.pertemuan_id, absensi.krs_id, absensi.jam_masuk, absensi.jam_keluar, absensi.durasi, krs.mahasiswa_id, krs.kelas_id, mahasiswa.nama FROM krs RIGHT JOIN absensi ON krs.krs_id=absensi.krs_id LEFT JOIN mahasiswa ON krs.mahasiswa_id=mahasiswa.id WHERE absensi.pertemuan_id='$pertemuan_id'";

        $hasil = mysqli_query($mysqli, $sql);
        $no = 0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;
        ?>
            <tbody>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['jam_masuk']; ?></td>
                    <td><?php echo $data['jam_keluar']; ?></td>
                    <td><?php echo $data['durasi']; ?></td>
                </tr>
            </tbody>
        <?php
        }
        ?>
    </table>


    <br><br>

    <table class="table table-bordered ">
        <br>
        <h5>Data Mahasiswa Berstatus Tidak Hadir</h5>
        <thead class="thead-dark">
            <tr>
                <th style="width:2%">No</th>
                <th>Nama Mahasiswa</th>
            </tr>
        </thead>

        <?php
        $sql2 = "SELECT DISTINCT mahasiswa.nama FROM krs LEFT JOIN mahasiswa ON krs.mahasiswa_id=mahasiswa.id WHERE krs.krs_id NOT IN (SELECT absensi.krs_id FROM krs RIGHT JOIN absensi ON krs.krs_id=absensi.krs_id LEFT JOIN mahasiswa ON krs.mahasiswa_id=mahasiswa.id WHERE pertemuan_id = '$pertemuan_id') AND kelas_id=$id";

        $hasil = mysqli_query($mysqli, $sql2);
        $no = 0;
        if ($hasil == FALSE) {
        } else {
            while ($data = mysqli_fetch_array($hasil)) {
                $no++;
        ?>
                <tbody>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $data['nama']; ?></td>
                    </tr>
                </tbody>
        <?php
            }
        }
        ?>
    </table>


    <h3><a href="index.php?page=detailkelas&&id=<?= $id ?>" class="btn btn-danger">Kembali</a></h3>
</div>