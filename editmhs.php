<?php
include("config.php");
$edit_data = mysqli_query($mysqli, "SELECT * FROM mahasiswa WHERE id = '" . $_GET['id'] . "'");
$result = mysqli_fetch_array($edit_data);
if ($_SESSION['lock'] != "unlock") {
	header("location:index.php");
}
?>
<center>
	<font size="6">Update Data Mahasiswa</font>
</center>
<hr>
<a href="index.php?page=tampil_mhs" class="btn btn-success btn-sm">Lihat Data</a><br><br>
<form action="" method="POST">
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Nama</label>
		<div class="col-md-6 col-sm-6 ">
			<input type="text" name="nama" class="form-control" size="4" value="<?php echo $result['nama'] ?>" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">NIM</label>
		<div class="col-md-6 col-sm-6 ">
			<input type="text" name="nim" class="form-control" size="4" value="<?php echo $result['nim'] ?>" required>
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
			<input type="text" name="email" class="form-control" size="4" value="<?php echo $result['email'] ?>" required>
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
			<input type="submit" name="edit" class="btn btn-success btn-sm" value="Update Data">
		</div>
	</div>

</form>
<?php
if (isset($_POST['edit'])) {
	$update = mysqli_query($mysqli, "UPDATE mahasiswa SET  
        nama = '" . $_POST['nama'] . "', nim = '" . $_POST['nim'] . "', tipe = '" . $_POST['tipe'] . "', email = '" . $_POST['email'] . "', password = '" . $_POST['password'] . "' WHERE id = '" . $_GET['id'] . "'");
	if ($update === false) {
		throw new Exception(mysqli_error($mysqli));
	}
	echo "<script>alert('Data Berhasil diupdate'); document.location.href='index.php?page=tampil_mhs';</script>";
}
?>