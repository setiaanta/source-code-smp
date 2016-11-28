<?php
/*
pada url, jika ada par aksi, jika par aksi = hapus
maka obyek berita menjalankan fungsi hapus
*/
if(isset($_GET['aksi']))
{
	if($_GET['aksi']=='hapus')
	{
		$berita->hapus_berita($_GET['idb']);
		echo "<script>alert('berita telah dihapus')</script>";
		echo "<script>window.location='index.php?halaman=berita';</script>";
	}
}
?>
<h2>Data Berita</h2>
<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Kategori</th>
			<th>Judul</th>
			<th>Tanggal</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$ber = $berita->tampil_berita();
		foreach ($ber as $pecah)
		{
		?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $pecah['kategori']; ?></td>
			<td><?php echo $pecah['judul']; ?></td>
			<td><?php echo $pecah['tanggal']; ?></td>
			<td>
				<a class="btn btn-info" href="index.php?halaman=berita&aksi=ubahberita&idb=<?php echo $pecah['id_berita'] ?>"><i class="fa fa-edit"></i> ubah</a>
				<a class="btn btn-danger" href="index.php?halaman=berita&aksi=hapus&idb=<?php echo $pecah['id_berita'] ?>"><i class="fa fa-remove"></i> hapus</a>
			</td>
		</tr> 
		<?php
		$no++;
		}
		?>
	</tbody>
</table>
<a href="index.php?halaman=tambahberita" class="btn btn-primary">tambah</a>