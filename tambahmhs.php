<?php
include("config.php");
if (isset($_POST['simpan'])) {
	if ($_SESSION['lock'] != "unlock") {
		header("location:index.php");
	}

	$nama = $_POST['nama'];
	$nim = $_POST['nim'];
	$tipe = $_POST['tipe'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$result = mysqli_query($mysqli, "INSERT INTO mahasiswa (id,nama,nim,tipe,email,password) VALUES ('','$nama','$nim','$tipe','$email','$password')") or die(mysqli_error($mysqli));

	if ($result) {
		echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_mhs";</script>';
	}
}


?>
<center>
	<font size="6">Tambah Data Mahasiswa</h2>
	</font>
</center>
<hr>
<div class="container">
	<a href="index.php?page=tampil_mhs" class="btn btn-success btn-sm">Kembali</a><br><br>
	<form action="index.php?page=tambah_mhs" method="POST">
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Nama</label>
			<div class="col-md-6 col-sm-6 ">
				<input type="text" name="nama" class="form-control" size="4" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">NIM</label>
			<div class="col-md-6 col-sm-6 ">
				<input type="text" name="nim" class="form-control" size="4" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Tipe</label>
			<div class="col-md-6 col-sm-6">
				<select name="tipe" id="tipe" class="form-control" required>
					<option disabled selected value=""> Tipe </option>
					<option value="1">Mahasiswa</option>
					<option value="2">Admin</option>
				</select>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Email</label>
			<div class="col-md-6 col-sm-6 ">
				<input type="text" name="email" class="form-control" size="4" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Password</label>
			<div class="col-md-6 col-sm-6 ">
				<input input type="password" name="password" class="form-control" size="4">
			</div>
		</div>
		<div class="item form-group">
			<div class="col-md-6 col-sm-6 offset-md-3">
				<input type="submit" name="simpan" class="btn btn-success btn-sm" value="Simpan">
			</div>
		</div>
	</form>