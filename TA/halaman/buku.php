<?php
  require_once __DIR__."/../core/autoload.php";
  $query = "SELECT * FROM buku";
  $result= mysqli_query($connect, $query) OR die(mysql_error());
?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Daftar Buku Perpustakaan</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body table-responsive no-padding">
    <table class="table table-hover">
      <tr>
          <th>Judul</th>
          <th>Pengarang</th>
          <th>Tahun</th>
          <th>Penerbit</th>
          <th>Kategori</th>
      </tr>
      <?php 
        while($row = mysqli_fetch_assoc($result)){ ?>
          <tr>
            <td>
              <a href="<?= 'index.php?page=pinjam&id='. $row['id'] ?>">
              <?= $row['judul']; ?>
              </a>
            </td>
            <td><?= $row['pengarang']; ?></td>
            <td><?= $row['tahun']; ?></td>
            <td><?= $row['penerbit']; ?></td>
            <td><?= $row['kategori'] != NULL ? $row['kategori'] : 'Tidak ada'; ?></td>
          </tr>
      <?php } ?>
    </table>
  </div>
  <!-- /.box-body -->
</div>
Klik judul buku untuk menuju halaman peminjaman
<!-- /.box -->