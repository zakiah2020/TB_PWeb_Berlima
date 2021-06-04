<?php
include("config.php");
$edit_data = mysqli_query($mysqli, "SELECT * FROM kelas WHERE id = '" . $_GET['id'] . "'");
$result = mysqli_fetch_array($edit_data);
if ($_SESSION['lock'] != "unlock") {
	header("location:index.php");
}
?>

<center>
	<font size="6">Update Data Kelas</font>
</center>
<a href="index.php?page=tampil_kls" class="btn btn-success btn-sm">Kembali</a><br><br>
<form action="" method="POST">
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Kode Kelas</label>
		<div class="col-md-6 col-sm-6 ">
			<input type="text" name="kode_kelas" class="form-control" size="4" value="<?php echo $result['kode_kelas'] ?>" required>
		</div>
	</div>
	<!-- <tr>
				<td>Kode Kelas</td>
				<td><input type="text" name="kode_kelas" size="30" value="<?php echo $result['kode_kelas'] ?>" required=""></td>
			</tr> -->
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Kode Mata Kuliah</label>
		<div class="col-md-6 col-sm-6 ">
			<input type="text" name="kode_matkul" class="form-control" size="4" value="<?php echo $result['kode_matkul'] ?>" required>
		</div>
	</div>
	<!-- <tr>
				<td>Kode Mata Kuliah</td>
				<td><input type="text" name="kode_matkul" size="30" value="<?php echo $result['kode_matkul'] ?>"required=""></td>
			</tr> -->
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Mata Kuliah</label>
		<div class="col-md-6 col-sm-6 ">
			<input type="text" name="nama_matkul" class="form-control" size="4" value="<?php echo $result['nama_matkul'] ?>" required>
		</div>
	</div>
	<!-- <tr>
				<td>Nama Mata Kuliah</td>
				<td><input type="text" name="nama_matkul" size="30" value="<?php echo $result['nama_matkul'] ?>" required=""></td>
			</tr> -->
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Tahun Ajaran</label>
		<div class="col-md-6 col-sm-6 ">
			<input type="text" name="tahun" class="form-control" size="4" value="<?php echo $result['tahun'] ?>" required>
		</div>
	</div>

	<!-- <tr>
				<td>Tahun Ajaran</td>
				<td><input type="text" name="tahun" size="30" value="<?php echo $result['tahun'] ?>"required=""></td>
			</tr> -->

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

	<!-- <tr>
                <td style="font-size: 17pxs">Semester</td>
                <td> <select name="semester" id="semester" style="height: 23px" required="">
                  <option disabled selected value=""> semester </option>
				  <option value="1">Ganjil</option>
				  <option value="2">Genap</option>
                </select>
              </td>
            </tr> -->
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">SKS</label>
		<div class="col-md-6 col-sm-6 ">
			<input input type="text" name="sks" class="form-control" size="4" value="<?php echo $result['sks'] ?>">
		</div>
	</div>
	<!-- <tr>
				<td>SKS</td>
				<td><input type="text" name="sks" size="30" value="<?php echo $result['sks'] ?>"required=""></td>
			</tr> -->
	<div class="item form-group">
		<div class="col-md-6 col-sm-6 offset-md-3">
			<input type="submit" name="edit" class="btn btn-success btn-sm" value="Update Data">
		</div>
	</div>
	<!-- <tr>
				<td></td>
				<td><input type="submit" name="edit" value="Edit" class="btn btn-success"></td>
			</tr> -->
	</table>
</form>
<?php
if (isset($_POST['edit'])) {
	$update = mysqli_query($mysqli, "UPDATE kelas SET  
        kode_kelas = '" . $_POST['kode_kelas'] . "', kode_matkul = '" . $_POST['kode_matkul'] . "', nama_matkul = '" . $_POST['nama_matkul'] . "', tahun = '" . $_POST['tahun'] . "', semester = '" . $_POST['semester'] . "',sks = '" . $_POST['sks'] . "' WHERE id = '" . $_GET['id'] . "'");
	if ($update === false) {
		throw new Exception(mysqli_error($mysqli));
	}
	echo "<script>alert('Data Berhasil diupdate'); document.location.href='index.php?page=tampil_kls';</script>";
}
?>