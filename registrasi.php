<?php
$title="Login";
$error=null;
include_once 'koneksi.php';

if (isset($_POST['submit'])) {
	$user = $_POST['username'];
	$password = $_POST['password'];
	$sql = "INSERT INTO login (username, password)";
	$sql .="value ('{$user}', '{$password}')";
	$result = mysqli_query($conn, $sql);
	if (!$result){
		die(mysqli_error($conn));
	} 
	
}
//include_once 'header.php';?>
<title>Login</title>
<link rel="stylesheet" href="style4.css">
<body>
	<div class="container">
		<header>
			<font color="white"> Silahkan Melakukan Registrasi</font>
		</header>
		<nav>
			<a href="home.php">Home</a>
			<a href="barang.php">Login</a>
		</nav>
		<div class="wrap">
			<div class="side">
				
			</div>
			<div class="content">
<div id="login">
	<h2>Registrasi Form</h2>
	<form action="" method="post">
		<div class="field">
		<label><br>Username :</label>
		<input id="name" name="username" cols="5" rows="10"placeholder="username" >
		</div>
		<div class="field">
		<label><br>Password :</label>
		<input id="password" name="password" cols="5" rows="10"placeholder="*******" type="password">
		</div>
		<div class="field submit">
		<input name="submit" type="submit" value="Simpan">
		</div>
	</form>
	
</div>
</div>
</div>
<footer>
	<p>&copy; 2018, Vianigustine Varadina-311610002</p>
</footer>
</div>
</div>
</body>

<?php 
//include_once "footer.php"; 
?>
