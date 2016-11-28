<h2>Tambah Berita</h2>
<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Judul</label>
		<input type="text" class="form-control" name="judul">
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
			?>
			<option value="<?php echo $gori['id_kategori']; ?>"><?php echo $gori['kategori'] ?></option>
			<?php
			}
			?>

		</select>
	</div>
	<div class="form-group">
		<label>Isi</label>
		<textarea class="form-control" rows="10" name="isi"></textarea>
	</div>
	<div class="form-group">
		<label>Gambar</label>
		<input type="file" class="form-control" name="gambar">
	</div>
	<button type="submit" class="btn btn-primary" name="save">Simpan</button>
</form>
<?php
//jika tombol save ditekan, akan menjalankan fungsi save
if(isset($_POST['save']))
{
	$berita->simpan_berita($_POST['judul'],$_POST['kategori'],$_POST['isi'],$_FILES['gambar']);
	echo "<script>alert('berita telah disimpan')</script>";
	echo "<script>window.location='index.php?halaman=berita';</script>";
}
?>