<?php 
include('koneksi.php');
//include('login_session.php');
error_reporting(E_ALL);
$title = 'data kategori';
if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$nama = $_POST ['nama'];

	//$sql = "UPDATE kategori SET nama_kategori='$nama' where id_kategori='$id' " ; 
  $sql = 'UPDATE kategori SET ';
  $sql .= "nama_kategori = '{$nama}'";
  $sql .= "WHERE id_kategori = '{$id}'";
	$result = mysqli_query($conn, $sql);
	if (!$result) {
		die(mysqli_error($conn));
	}
	header('location:kategori.php');
}

$id = $_GET['id'];
$sql = "SELECT * FROM kategori WHERE id_kategori = '{$id}'";
$result = mysqli_query($conn, $sql);
if (!$result) die ('Error : Data Tidak Tersedia');
$data = mysqli_fetch_array($result);

function is_select($var, $val) {
	if ($var == $val) return 'selected="selected"';
	return false;
}
include('header.php');
include('nav.php');
include('sidebar.php');


 ?>
<link rel="stylesheet" type="text/css" href="style2.css">
<div class="content_a">
  <div class="daftar">
  <div class="main">
     <h2>Edit Kategori</h2>
     <form action="edit_kategori.php" method="post" enctype="multipart/form-data">
       <div class="input">
         <label for="">Nama Kategori</label>
         <input type="text" name="nama" value="<?php echo $data['nama_kategori'];?>"/>
       </div>
       <br>
       <div class="submit">
       		<input type="hidden" name="id" value="<?php echo $data['id_kategori'];?>" />
     		<input type="submit" class="btn btn-large" name="submit" value="Simpan" />
         <a class="btn btn-primary" href="kategori.php">Batal</a>
     	</div>

     </form>

  </div>
</div>
</div>
 <?php
 include('footer.php');
  ?>