<?php
include("config.php");
if ($_SESSION['lock'] != "unlock") {
	header("location:index.php");
}
?>

<div class="container" style="margin-top:20px">
	<center>
		<font size="6">Data Mahasiswa</font>
	</center>
	<a href="index.php?page=tambah_mhs" class="btn btn-success btn-sm">Tambah Data</a>
	<br>
	<hr>
	<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead class="thead-dark">
				<tr>
					<th>Nomor</th>
					<th>Nama</th>
					<th>NIM</th>
					<th>Tipe</th>
					<th>Email</th>
					<th>Password</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$batas = 5;
				$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
				$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

				$previous = $halaman - 1;
				$next = $halaman + 1;

				$data = mysqli_query($mysqli, "select * from mahasiswa");
				$jumlah_data = mysqli_num_rows($data);
				$total_halaman = ceil($jumlah_data / $batas);

				$data_mhsw = mysqli_query($mysqli, "select * from mahasiswa limit $halaman_awal, $batas");
				$nomor = $halaman_awal + 1;
				while ($d = mysqli_fetch_array($data_mhsw)) {
				?>
					<tr>
						<td><?php echo $nomor++; ?></td>
						<td><?php echo $d['nama']; ?></td>
						<td><?php echo $d['nim']; ?></td>
						<?php
						switch ($d['tipe']) {
							case 1:
								echo "<td>Mahasiswa</td>";
								break;
							case 2:
								echo "<td>admin</td>";
								break;
						}
						?>
						<td><?php echo $d['email']; ?></td>
						<td><?php echo $d['password']; ?></td>
						<td>
							<a href="index.php?page=edit_mhs&id=<?php echo $d['id']; ?>" class="btn btn-warning  btn-sm">Update</a>
							<a href="index.php?page=hapusmhs&&id=<?php echo $d["id"]; ?>" class="btn btn-danger  btn-sm" onclick="return confirm('Apakah anda yakin ingin hapus ?')">Delete</a>
						</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		<nav>
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" <?php if ($halaman > 1) {
												echo "href='?page=tampil_mhs&&halaman=$previous'";
											} ?>>Previous</a>
				</li>
				<?php
				for ($x = 1; $x <= $total_halaman; $x++) {
				?>
					<li class="page-item"><a class="page-link" href="?page=tampil_mhs&&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
				<?php
				}
				?>
				<li class="page-item">
					<a class="page-link" <?php if ($halaman < $total_halaman) {
												echo "href='?page=tampil_mhs&&halaman=$next'";
											} ?>>Next</a>
				</li>
			</ul>
		</nav>
	</div>