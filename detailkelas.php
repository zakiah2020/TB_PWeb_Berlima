<?php
include "config.php";
$id = $_GET['id'];
$pertemuanKe;
if ($_SESSION['lock'] != "unlock") {
    header("location:index.php");
}
?>
<div class="container" style="margin-top:20px">
    ><center>
        <font size="6">Detail Kelas</font>
    </center>
    <hr>
    <table class="table table-bordered ">
        <br>
        <h5>Data Kelas</h5>
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Kode Kelas</th>
                <th>Kode Matkul</th>
                <th>Nama Matkul</th>
                <th>Tahun</th>
                <th>Semester</th>
                <th>Jumlah SKS</th>
            </tr>
        </thead>

        <?php
        $sql = "SELECT * FROM kelas WHERE id = '$id'";

        $hasil = mysqli_query($mysqli, $sql);
        $no = 0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;
        ?>
            <tbody>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data["kode_kelas"]; ?></td>
                    <td><?php echo $data["kode_matkul"];   ?></td>
                    <td><?php echo $data["nama_matkul"];   ?></td>
                    <td><?php echo $data["tahun"];   ?></td>
                    <td><?php echo $data["semester"];   ?></td>
                    <td><?php echo $data["sks"];   ?></td>
                </tr>
            </tbody>
        <?php
        }
        ?>
    </table>

    <table class="table table-bordered  ">
        <br>
        <h5>Data Pertemuan Kelas</h5>
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>ID Kelas</th>
                <th>Pertemuan Ke-</th>
                <th>Tanggal</th>
                <th>Materi</th>
                <th colspan='2'>Aksi</th>
            </tr>
            </thread>

            <?php
            $sql = "SELECT * FROM pertemuan WHERE kelas_id = '$id'";

            $hasil = mysqli_query($mysqli, $sql);
            $no = 0;
            while ($data = mysqli_fetch_assoc($hasil)) {
                $no++;
            ?>
        <tbody>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data["kelas_id"]; ?></td>
                <td><?php echo $data["pertemuan_ke"];   ?></td>
                <td><?php echo $data["tanggal"];   ?></td>
                <td><?php echo $data["materi"];   ?></td>
                <td>
                    <a href="index.php?page=pertemuankelas&&pertemuan_ke=<?php echo htmlspecialchars($data['pertemuan_ke']); ?>&&id=<?php echo htmlspecialchars($id); ?>" class="btn btn-primary btn-sm" role="button">Detail</a>
                </td>
            </tr>
        </tbody>
    <?php
                $pertemuanKe = $data["pertemuan_ke"];
            }
            $pertemuanKe++;
    ?>
    </table>
    <a href="index.php?page=tambah_pertemuan&&kelas_id=<?= $id ?>&&pertemuanKe=<?= $pertemuanKe ?>" class="btn btn-primary btn-sm" role="button">Tambah Pertemuan</a><br>
    <table class="table table-bordered table-hover">
        <br>
        <h5>Mahasiswa Yang Mengikuti Kelas Ini</h5>
        <form action="index.php?page=detailkelas&&id=<?= $id ?>" method="POST">
            <div class="float-left">
                <select name="mahasiswa" id="mahasiswa" class="form-select" aria-label="Default select example">
                    <option disabled selected value=""> Pilih Mahasiswa </option>

                    <?php
                    $sql1 = "SELECT * FROM krs WHERE kelas_id = '$id'";
                    $sql = "SELECT * FROM mahasiswa WHERE id NOT IN (SELECT mahasiswa_id FROM krs WHERE kelas_id = '$id')";
                    $hasil_sql = mysqli_query($mysqli, $sql);
                    while ($data = mysqli_fetch_array($hasil_sql)) {
                    ?>

                        <option value="<?= $data["id"]; ?>"><?= $data["nama"] ?></option>

                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="float-left">
                <input type="submit" name="submit" class="btn btn-primary btn-sm" value="Tambah">
            </div>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $mahasiswa_id = $_POST['mahasiswa'];
            $result = mysqli_query($mysqli, "INSERT INTO krs (krs_id,kelas_id,mahasiswa_id) VALUES ('','$id','$mahasiswa_id')") or die(mysqli_error($mysqli));
        ?>
            <script>
                alert("Berhasil menambahkan data.");
                document.location.href = "index.php?page=detailkelas&&id=<?= $id ?>";
            </script>
        <?php
        }
        ?>
        <thread class="thead-dark">
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Email</th>
                <th colspan='2'>Aksi</th>
            </tr>
        </thread>
        <?php
        $sql1 = "SELECT * FROM krs WHERE kelas_id = '$id'";
        $hasil_sql1 = mysqli_query($mysqli, $sql1);
        $no = 1;
        while ($data = mysqli_fetch_array($hasil_sql1)) {
            $mahasiswa_id = $data["mahasiswa_id"];
            $sql = "SELECT * FROM mahasiswa WHERE id = '$mahasiswa_id'";
            $hasil = mysqli_query($mysqli, $sql);
            if ($data2 = mysqli_fetch_array($hasil)) {
        ?>
                <tbody>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data2["nim"]; ?></td>
                        <td><?php echo $data2["nama"];   ?></td>
                        <td><?php echo $data2["email"];   ?></td>
                        <td>
                            <a href="index.php?page=hapuspengampu&&krs_id=<?= $data['krs_id'] ?>&&id=<?= $id ?>" class="btn btn-danger btn-sm" role="button">Delete</a>
                        </td>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        <?php
        }
        ?>
    </table>
    <!-- <a href="" class="btn btn-primary" role="button">Tambah Mahasiswa</a> -->
    <br><br>
    <h3><a href="index.php?page=tampil_kls" class="btn btn-danger btn-sm">Kembali</a></h3>
</div>