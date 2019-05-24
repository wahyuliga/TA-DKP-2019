<?php
  require_once __DIR__."/../core/autoload.php";
  $query = "SELECT pinjam.id, pinjam.id_buku, pinjam.nama, pinjam.tanggal, buku.judul FROM pinjam INNER JOIN buku ON pinjam.id_buku=buku.id ORDER BY pinjam.id";
  $result= mysqli_query($connect, $query) OR die(mysql_error());

  //hapus
  if (isset($_GET['id'])) {
    mysqli_query($connect,"DELETE FROM pinjam WHERE id='".$_GET['id']."'");
    echo '<script> location.replace("index.php?page=pinjaman"); </script>';
  } 
?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Data Peminjaman Buku</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body table-responsive no-padding">
    <table class="table table-hover">
      <tr>
          <th>Nama</th>
          <th>Judul Buku</th>
          <th>Tanggal Pinjam</th>
          <th>Aksi</th>
      </tr>
      <?php 
        while($row = mysqli_fetch_assoc($result)){ ?>
          <tr>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['judul']; ?></td>
            <td><?= $row['tanggal']; ?></td>
            <td><a href="index.php?page=pinjaman&id=<?= $row['id']; ?>" class="btn btn-danger">Hapus</a></td>
          </tr>
      <?php } ?>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->