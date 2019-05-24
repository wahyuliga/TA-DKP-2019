<?php
  require_once __DIR__."/../core/autoload.php";
  $query = "SELECT * FROM anggota";
  $result= mysqli_query($connect, $query) OR die(mysql_error());
?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Daftar Anggota</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body table-responsive no-padding">
    <table class="table table-hover">
      <tr>
        <th>Nama</th>
        <th>NIM</th>
        <th>Alamat</th>
      </tr>
      <?php 
        while($row = mysqli_fetch_assoc($result)){ ?>
          <tr>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['nim']; ?></td>
            <td><?= $row['alamat']; ?></td>
          </tr>
      <?php } ?>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
<!-- <a href="halaman/tambah.php" class="btn btn-primary">Tambah</a> -->