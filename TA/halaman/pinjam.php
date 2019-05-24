<?php

require_once __DIR__."/../core/autoload.php";

$query  = "SELECT * FROM buku WHERE id = ".$_GET['id'];
$result = mysqli_query($connect, $query);

// Jika tidak ada data
if($result->num_rows == 0)
  echo '<script> location.replace("index.php"); </script>';

$data = mysqli_fetch_assoc($result);

if(empty($_GET['pinjam'])){
  echo "Silahkan isi nama peminjam dari daftar";
} else {
  $query = "INSERT INTO pinjam (nama, id_buku) VALUES ('". $_GET['nama'] ."', '". $_GET['id'] ."')";
  $result = mysqli_query($connect, $query) OR die(mysql_error());

  echo '<script> location.replace("index.php?page=pinjaman"); </script>';
}
?>
<div class="col-md-6">
  <!-- Horizontal Form -->
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Peminjaman Buku</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="GET" action="">
      <div class="box-body">
        <div class="form-group">
          <label for="judul" class="col-sm-2 control-label">Judul</label>

          <div class="col-sm-10">
            <input type="text" name="judul" class="form-control" value="<?php echo $data['judul'] ?>" disabled>
          </div>
        </div>
        <div class="form-group">
          <label for="pengarang" class="col-sm-2 control-label">Pengarang</label>

          <div class="col-sm-10">
            <input type="text" name="pengarang" class="form-control" value="<?php echo $data['pengarang'] ?>" disabled>
          </div>
          <input type="hidden" name="page" value="pinjam">
          <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Peminjam</label>
          <div class="col-sm-10">
          <select class="form-control" name="nama">
            <?php
              $query = "SELECT * FROM anggota";
              $nama = mysqli_query($connect, $query);  
              while($row = mysqli_fetch_assoc($nama)){ ?>
              <option><?php echo $row['nama'] ?></option>
            <?php } ?>
          </select>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <a href="javascript:window.history.back();" class="btn btn-default">Batal</a>
        <button type="submit" name="pinjam" value="yes" class="btn btn-info pull-right">Pinjam</button>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>
  <!-- /.box -->
</div>