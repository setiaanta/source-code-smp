<h2>Ubah Berita</h2>

<?php

$detail_berita = $berita->ambil_berita($_GET['idb']);



?>
<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Judul</label>
		<input type="text" class="form-control" name="judul" value="<?php echo $detail_berita['judul']; ?>">
	</div>
	<!-- pilihan kategori disini -->
	<div class="form-group">
		<label>Kategori</label>
		<select class="form-control" name="kategori">
			<option value="">Pilih Kategori</option>
			<?php
			$kate = $kategori->tampil_kategori();
			foreach($kate as $gori)
			{
				//jika id kategori sama langsung terselect
				if($detail_berita['id_kategori']==$gori['id_kategori'])
				{
			?>
			<option value="<?php echo $gori['id_kategori']; ?>"><?php echo $gori['kategori'] ?></option>
			<?php
				} //tutup if
			else
				{
			?>
				<option value="<?php echo $gori['id_kategori']; ?>"><?php echo $gori['kategori'] ?></option>
			<?php
				} //tutup else
			} //tutup foreach
			?>

		</select>
	</div>
	<div class="form-group">
		<label>Isi</label>
		<textarea class="form-control" rows="10" name="isi"><?php echo $detail_berita['isi']; ?></textarea>
	</div>
	<div class="form-group">
		<label>Gambar</label>
		<br>
		<img src="gambar_berita/<?php echo $detail_berita['gambar']; ?>">
		<input type="file" class="form-control" name="gambar">
	</div>
	<button type="submit" class="btn btn-primary" name="save">Simpan</button>
</form>
<?php
//jika tombol save ditekan, akan menjalankan fungsi save
if(isset($_POST['save']))
{
	$berita->ubah_berita($_GET['idb'],$_POST['judul'],$_POST['kategori'],$_POST[' isi'],$_FILES['gambar']);
	echo "<script>alert('berita telah diubah')</script>";
	echo "<script>window.location='index.php?halaman=berita';</script>";
}
?>