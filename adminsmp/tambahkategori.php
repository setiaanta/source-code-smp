<h2>tambah kategori</h2>
<form method="POST">
	<div class="form-group">
		<label>kategori</label>
		<input type="text" class="form-control" name="kategori">
	</div>
	<button type="submit" name="save" class="btn btn-primary"><i class="fa fa-check"></i> Simpan</button>
</form>
<?php
//jika tombol save ditekan, maka obyek tsb menjalankan fungsi simpan
if(isset($_POST['save']))
{
	$kategori->simpan_kategori($_POST['kategori']);
	echo "<script>alert('data telah disimpan')</script>";
	echo "<script>window.location='index.php?halaman=kategori';</script>";
}
?>