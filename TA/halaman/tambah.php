<?php
require_once __DIR__."/../core/autoload.php";

if(empty($_GET['submit'])){
  echo "Silahkan isi form";
} else {
  $query = "INSERT INTO anggota (nama, nim) VALUES ('". $_GET['nama'] ."', '". $_GET['nim'] ."')";
  $result = mysqli_query($connect, $query) OR die(mysql_error());

  echo '<script> location.replace("../index.php?page=anggota"); </script>';
}
?>
<form action="" method="get" class="form-group">
	<label class="col-sm-2 control-label">Nama</label>
	<input type="text" name="nama" class="form-control">
	<label class="col-sm-2 control-label">NIM</label>
	<input type="text" name="nim" class="form-control">
	<input type="submit" name="submit">
</form>