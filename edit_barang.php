<?php 
include('koneksi.php');
//include_once('../_header.php');
//include('login_session.php');
error_reporting(E_ALL);
$title = 'data barang';
if (isset($_POST['submit'])) {
	$id = $_POST['id'];
    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $deskripsi = $_POST['deskripsi'];
    $stock = $_POST['stock'];
    $file_gambar = $_FILES['file_gambar'];
    $gambar = null;

if($file_gambar ['error'] ==0){
  $filename = str_replace('', '_', $file_gambar['name']);
  $destination = dirname(__FILE__).'/gambar/'.$filename;
  if(move_uploaded_file($file_gambar['tmp_name'], $destination))
  {
    $gambar='gambar/'.$filename;
  }

}


  $sql = 'UPDATE barang SET ';
  $sql .= "nama_barang = '{$nama_barang}', id_kategori = '{$kategori}', deskripsi = '{$deskripsi}',  ";
  $sql .= "harga_jual = '{$harga_jual}', harga_beli = '{$harga_beli}', stock = '{$stock}'";
  if (!empty($gambar))
  $sql .= ", gambar = '{$gambar}' ";
  $sql .= "WHERE id_barang = '{$id}' ";
	$result = mysqli_query($conn, $sql);
	if (!$result) {
		die(mysqli_error($conn));
	}
	header('location:barang.php');
}

$id = $_GET['id'];
$sql = "SELECT * FROM barang WHERE id_barang = '{$id}'";
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
     <h2>Edit Barang</h2>
     <form action="edit_barang.php" method="post" enctype="multipart/form-data" />
       <div class="input">
        <label>Nama Barang</label>
         <input type="text" name="nama_barang" value="<?php echo $data ['nama_barang']; ?>" />
       </div>

       <div class="input">
       <label>Kategori</label>
       <select name="kategori">
         <?php 
         include 'koneksi.php' ;
         $sql = 'SELECT * FROM kategori';
         $result = mysqli_query($conn, $sql);
          ?>
          <?php while ($row = mysqli_fetch_array($result)):?>
            <option value="<?php echo $row['id_kategori'];?>"><?php echo $row['nama_kategori'];?></option>
            <?php endwhile; ?>
       </select>
       </div>
       <div class="input">
        <label>Harga Jual</label>
        <input type="text" name="harga_jual" value="<?php echo $data ['harga_jual']; ?>" />
        <div class="input">
        <label>Harga Beli</label>
        <input type="text" name="harga_beli" value="<?php echo $data ['harga_beli']; ?>" />
       </div>
       <div class="input">
        <label>stock</label>
        <input type="text" name="stock" value="<?php echo $data ['stock']; ?>" />
       </div>
       <div class="input">
        <label>Deskripsi</label>
        <textarea type="text" name="deskripsi" value="<?php echo $data ['deskripsi']; ?>" ></textarea> 
       </div>
       <div class="input">
        <label>File Gambar</label>
        <input type="file" name="file_gambar">
       </div>
       <div class="submit">
       		<input type="hidden" name="id" value="<?php echo $data['id_barang'];?>" />
     		<input type="submit" class="btn btn-large" name="submit" value="Edit" />
         <a class="btn btn-primary" href="barang.php">Batal</a>
     	</div>

     </form>

  </div>
</div>
</div>
 <?php
 include('footer.php');
  ?>