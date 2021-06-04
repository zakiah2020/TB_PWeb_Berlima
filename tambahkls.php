<?php
include_once("config.php");
if (isset($_POST['submit'])) {

	$kode_kelas = $_POST['kode_kelas'];
	$kode_matkul = $_POST['kode_matkul'];
	$nama_matkul = $_POST['nama_matkul'];
	$tahun = $_POST['tahun'];
	$semester = $_POST['semester'];
	$sks = $_POST['sks'];

	$result = mysqli_query($mysqli, "INSERT INTO kelas (id,kode_kelas,kode_matkul,nama_matkul,tahun,semester,sks) VALUES ('','$kode_kelas','$kode_matkul','$nama_matkul','$tahun','$semester','$sks')") or die(mysqli_error($mysqli));

	if ($result) {
		echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_kls";</script>';
	}
}

if ($_SESSION['lock'] != "unlock") {
	header("location:index.php");
}
?>

<center>
	<font size="6">Tambah Data Kelas</h2>
	</font>
</center>
<hr>
<div class="container">
	<a href="index.php?page=tampil_kls" class="btn btn-success btn-sm">Kembali</a><br><br>
	<form action="index.php?page=tambah_kls" method="POST">
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Kode Kelas</label>
			<div class="col-md-6 col-sm-6 ">
				<input type="text" name="kode_kelas" class="form-control" size="4" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Kode Mata Kuliah</label>
			<div class="col-md-6 col-sm-6 ">
				<input type="text" name="kode_matkul" class="form-control" size="4" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Mata Kuliah</label>
			<div class="col-md-6 col-sm-6 ">
				<input type="text" name="nama_matkul" class="form-control" size="4" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Tahun Ajaran</label>
			<div class="col-md-6 col-sm-6 ">
				<input type="text" name="tahun" class="form-control" size="4" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Semester</label>
			<div class="col-md-6 col-sm-6">
				<select name="semester" id="semester" class="form-control" required>
					<option disabled selected value="">Semester</option>
					<option value="1">Ganjil</option>
					<option value="2">Genap</option>
				</select>
			</div>
		</div>

		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">SKS</label>
			<div class="col-md-6 col-sm-6 ">
				<input input type="text" name="sks" class="form-control" size="4">
			</div>
		</div>
		<div class="item form-group">
			<div class="col-md-6 col-sm-6 offset-md-3">
				<input type="submit" name="submit" class="btn btn-success btn-sm" value="Simpan">
			</div>
		</div>
	</form>