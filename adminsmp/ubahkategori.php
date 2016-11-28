<h2>ubah kategori</h2>
<?php
$data = $kategori->ambil_kategori($_GET['idnya']);
foreach ($data as $kadal) {
?>
<form method="POST">
	<div class="form-group">
		<label>kategori</label> =
		<input type="text" class="form-control" name="kategori" value="<?php echo $kadal['kategori']; ?>">
	</div>
	<button type="submit" name="update" class="btn btn-primary"><i class="fa fa-pencil"></i> Ubah</button>
</form>
<?php
}
?>

<?php
//jika ditekan tombol update, maka obyek kategori menjalankan fungsi update
if(isset($_POST['update']))
{
	$kategori->ubah_kategori($_POST['kategori'],$_GET['idnya']);
	echo "<script>alert('data telah berubah')</script>";
	echo "<script>window.location='index.php?halaman=kategori';</script>";
}
?>