<?php
//jika pd url ada parameter aski, maka aksi = hapus
if(isset($_GET['aksi']))
{
	if($_GET['aksi']=='hapus')
	{
		$kategori->hapus_kategori($_GET['idnya']);
		echo "<script>alert('kategori telah dihapus')</script>";
		echo "<script>window.location='index.php?halaman=kategori';</script>";
	}
}
?>

<h2>Data Kategori</h2>
<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Kategori</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>

		<?php
		$kate = $kategori->tampil_kategori();
		foreach ($kate as $gori)
		{
		?>	
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $gori['kategori']; ?></td>
			<td>
				<a href="index.php?halaman=ubahkategori&idnya=<?php echo $gori['id_kategori']; ?>" class="btn btn-info"><i class="fa fa-edit"></i> Ubah</a>
				<a href="index.php?halaman=kategori&aksi=hapus&idnya=<?php echo $gori['id_kategori']; ?>" class="btn btn-danger"><i class="fa fa-remove"></i> Hapus</a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahkategori" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>