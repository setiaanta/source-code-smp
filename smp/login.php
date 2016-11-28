<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
<style type="text/css">
body {
	font-family: arial;
	font-size: 14px;
	background-color: #222;
}

#utama{
	width: 300px;
	margin: 0 auto;
	margin-top: 12%;
}

#judul{
	padding: 15px;
	text-align: center;
	color: #fff;
	font-size: 20px;
	background-color: #4C3ECC;
	border-top-left-radius: 20px;
	border-top-right-radius: 20px;
	border-bottom: 3px solid #A9A8AD;
}

#inputan{
	background-color: #A9A8AD;
	padding: 20px;
	border-bottom-right-radius: 20px;
	border-bottom-left-radius: 20px;
}

input{
	padding: 10px;
	border: 0;
}

.lg{
	width: 235px;
}

.btn{
	width: 70px;
	border-radius: 5px;
	color: #fff;
	background-color: #4C3ECC;
	margin-left: 180px;
}

.btn:hover{
	background-color: #4437B6;
	cursor: pointer;
}
</style>
</head>
<body>

<div id="utama">
	<div id="judul">Login</div>
	<div id="inputan">
	<form action="" method="post">
		<div>
			<input type="text" name="user" placeholder="Username" class="lg">
		</div>
		<div style="margin-top: 7px">
			<input type="password" name="pass" placeholder="Password" class="lg">
		</div>
		<div style="margin-top: 10px">
			<input type="submit" name="Login" value="Login" class="btn">
		</div>
	</form>
	</div>
</div>

</body>
</html>