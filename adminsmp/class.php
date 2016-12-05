<?php
session_start();
//membuat class database
class database
{
	public $host = "localhost";
	public $user = "root";
	public $pass = "";
	public $dbname = "db_smp";

	//membuat fungsi untuk koneksi
	function koneksi()
	{
		$koneksi = mysqli_connect($this->host,$this->user,$this->pass);
		mysqli_select_db($koneksi,$this->dbname);
	}
}

class pengguna
{
	function login_pengguna($uid,$pass)
	{
		//0. enkripsi password ke MD5
		//1. mencocokan data username dan password pada tabel pengguna
		//2. menghitung jumlah yang cocok
		//3. memecah data yang cocok
		//4. jika ada yang cocok maka login
		//5. jika tidak maka gagal login
		$koneksi = mysqli_connect("localhost","root","");
		mysqli_select_db($koneksi,"db_smp");
		$pass = md5($pass);
		$ambildata = mysqli_query($koneksi,"SELECT * FROM pengguna WHERE username='$uid' AND password='$pass'");
		$hitung = mysqli_num_rows($ambildata);
		$pecah = mysqli_fetch_array($ambildata);
		if($hitung>0)
		{
			//login
			$_SESSION['id_pengguna'] = $pecah['id_pengguna'];
			$_SESSION['username'] = $pecah['username'];
			$_SESSION['password'] = $pecah['password'];
			$_SESSION['nama'] = $pecah['nama'];
			return true;
		}
		else
		{
			//gagal login
			return false;
		}
	}
	function logout_pengguna()
	{
		session_destroy(); 
	}
}

class kategori
{
	function tampil_kategori()
	{
		$ambildata = mysqli_query("SELECT * FROM kategori");
		if(mysqli_num_rows($ambildata) > 0)
		{
			while($ad = mysqli_fetch_assoc($ambildata))
				$data[] = $ad;
			return $data;
		}
		else
		{
			echo "kategori kosong";
		}
	}
	function simpan_kategori($kategori)
	{
		msqli_query("INSERT INTO kategori (kategori) VALUES ('$kategori')");
	}
	function hapus_kategori($idnya)
	{
		mysqli_query("DELETE FROM kategori WHERE id_kategori='idnya'");
	}
	function ambil_kategori($idnya)
	{
		$ambildata = mysqli_query("SELECT FROM kategori WHERE id_kategori='idnya'");
		$ad = mysqli_fetch_assoc($ambildata);
		$data[] = $ad;
		return $data;
	}
	function ubah_kategori($kategori,$idnya)
	{
		mysqli_query("UPDATE kategori SET kategori='$kategori' WHERE id_kategori='idnya'");
	}
}

class berita
{
	function tampil_berita()
	{
		$ambildata = mysqli_query("SELECT * FROM berita b join kategori k on b.id_kategori=k.id_kategori");
		if(mysqli_num_rows($ambildata) > 0)
		{
			while($a = mysqli_fetch_assoc($ambildata))
				$data[] = $a;
			return $data;
		}
		else
		{
			echo "berita kosong";
		}
	}
	function simpan_berita($judul,$kategori,$isi,$gambar)
	{
		/*
		1. mengambil nama file
		2. mengambil lokasi file
		3. mengupload file ke folder gambarberita
		4. mengambil tgl saat ini
		query insert ke tabel berita
		*/
		$namagambar = $gambar['name'];
		$lokasigambar = $gambar['tmp_name'];
		move_uploaded_file($lokasigambar, "gambar_berita/$namagambar");
		$hariini = date('Y-m-d');
		mysqli_query("INSERT INTO berita (judul,id_kategori,tanggal,isi,gambar) VALUES ('$judul','$kategori','$hariini','$isi','$namagambar')");
	}
	function hapus_berita($idb)
	{
		mysqli_query("DELETE FROM berita WHERE id_berita='$idb'");
	}
	function ambil_berita($idb)
	{
		$ambil = mysqli_query("SELECT FROM berita WHERE id_berita='idb'");
		return mysqli_fetch_assoc($ambil);
	}
	function ubah_berita($idb,$judul,$kategori,$isi,$gambar)
	{
		//jika gambar diubah atau tdk error mengupload
		if($gambar['error']==0)
		{
			/*
			1. mengambil nama file
			2. mengambil lokasi file
			3. mengupload file ke folder gambarberita
			4. melakukan query update sekaligus mengganti gambar
			*/
			$namagambar = $gambar['name'];
			$lokasigambar = $gambar['tmp_name'];
			move_uploaded_file($lokasigambar, "gambar_berita/$namagambar");
			mysqli_query("UPDATE berita SET judul='$judul',id_kategori='$kategori',isi='$isi',gambar='$gambar' WHERE id_berita='$idb'");
		}
		//jika gambar tdk ganti
		else
		{
			//jalankan query update tanpa mengubah gambar
			mysqli_query("UPDATE berita SET judul='$judul',id_kategori='$kategori',isi='$isi' WHERE id_berita='$idb'");
		}
	}
}

//instance class database
$db = new database();
$db->koneksi();
//instance class pengguna
$pengguna = new pengguna();
$kategori = new kategori();
$berita = new berita();
?>
