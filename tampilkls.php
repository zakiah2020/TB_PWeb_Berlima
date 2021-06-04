<?php
include('config.php');
if ($_SESSION['lock'] != "unlock") {
	header("location:index.php");
}
?>

<div class="container" style="margin-top:20px">
	<center>
		<font size="6">Data Kelas</font>
	</center>
	<a href="index.php?page=tambah_kls" class="btn btn-success btn-sm">Tambah Data</a>
	<br>
	<hr>
	<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead class="thead-dark">
				<tr>
					<th>No</th>
					<th>Kode Kelas</th>
					<th>Kode Matku</th>
					<th>Nama Mata Kuliah</th>
					<th>Tahun Ajaran</th>
					<th>Semester</th>
					<th>SKS Makul</th>
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

				$data = mysqli_query($mysqli, "select * from kelas");
				$jumlah_data = mysqli_num_rows($data);
				$total_halaman = ceil($jumlah_data / $batas);

				$data_kls = mysqli_query($mysqli, "select * from kelas order by tahun desc, semester desc limit $halaman_awal, $batas");
				$nomor = $halaman_awal + 1;
				while ($d = mysqli_fetch_array($data_kls)) {
				?>
					<tr>
						<td><?php echo $nomor++; ?></td>
						<td><?php echo $d['kode_kelas']; ?></td>
						<td><?php echo $d['kode_matkul']; ?></td>
						<td><?php echo $d['nama_matkul']; ?></td>
						<td><?php echo $d['tahun']; ?></td>
						<?php
						switch ($d['semester']) {
							case 1:
								echo "<td>Ganjil</td>";
								break;
							case 2:
								echo "<td>Genap</td>";
								break;
						}
						?>
						<td><?php echo $d['sks']; ?></td>
						<td>
							<a href="index.php?page=edit_kls&id=<?php echo $d['id']; ?>" class="btn btn-warning btn-sm">Update</a>
							<a href="index.php?page=hapuskls&&id=<?php echo $d["id"]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin hapus ?')">Delete</a>
							<a href="index.php?page=detailkelas&id=<?php echo $d['id']; ?>" class="btn btn-primary btn-sm">Detail</a>
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
												echo "href='?page=tampil_kls&&halaman=$previous'";
											} ?>>Previous</a>
				</li>
				<?php
				for ($x = 1; $x <= $total_halaman; $x++) {
				?>
					<li class="page-item"><a class="page-link" href="?page=tampil_kls&&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
				<?php
				}
				?>
				<li class="page-item">
					<a class="page-link" <?php if ($halaman < $total_halaman) {
												echo "href='?page=tampil_kls&&halaman=$next'";
											} ?>>Next</a>
				</li>
			</ul>
		</nav>
	</div>
</div>