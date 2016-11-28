<!DOCTYPE html>
<html>
<head>
	<title>SMP MUHAMMADIYAH 30</title>
<style type="text/css">
body{
	font-family: arial;
	font-size: 14px;
}

#canvas{
	width: 860px;
	margin: 0 auto;
	border: 1px solid silver;
}

#header{
	font-size: 20px;
	padding: 20px;
}

#menu{
	background-color: #4C3ECC;
}
#menu ul {
	list-style: none;
	margin: 0;
	padding: 0;
}
#menu ul li.utama {
	display: inline-table;
}
#menu ul li:hover {
	background-color: #4437B6;
}
#menu ul li a {
	display: block;
	text-decoration: none;
	line-height: 40px;
	padding: 0 10px;
	color: #FFFFFF;
}
.utama ul {
	display: none;
	position: absolute;
	z-index: 2;
}
.utama:hover ul{
	display: block;
}
.utama ul li {
	display: block;
	background-color: #4C3ECC;
	width: 140px;
}

#isi{
	min-height: 400px;
	padding: 20px;
}

#footer{
	text-align: center;
	padding: 20px;
	background-color: #ccc;
}
</style>
</head>
<body>

<div id="canvas">
	<div id="header">
	SMP Muhammadiyah 30
	</div>

	<div id="menu">
		<ul>
			<li class="utama"><a href="/smp">Beranda</a></li>
			<li class="utama"><a href="">Profil </a>
				<ul>
					<li><a href="?page=vm">Kosong</a></li>
					<li><a href="">Kosong</a></li>
				</ul>
			</li>
			<li class="utama"><a href="?page=info">Info PPDB</a></li>
			<li class="utama"><a href="?page=kontak">Kontak</a></li>
		</ul>
	</div>

	<div id="isi">
	<?php
	$page = @$_GET['page'];
	if($page == "vm") {
		echo "ini halaman visi misi";
	} else if($page == "info") {
		echo "ini halaman info PPDB";
	} else if($page == "kontak") {
		echo "ini halaman kontak";
	} else if($page == "") {
		echo "selamat datang di halaman utama";
	} else {
		echo "404! Halaman tidak ada";
	}
	?>
	</div>

	<div id="footer">
		Copyright 2016 - Setyawan Antaris
	</div>
</div>

</body>
</html>