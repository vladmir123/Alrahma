<div>
  <h3>Manage Gallery</h3>
</div>
<div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Keterangan Foto</th>
        <th>Foto</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <?php

      include "../libs/funct/paging.php";

      //variable paging mencari posisi batas
      $p= new Paging_gallery;
      $batas=5;
      $posisi=$p->cariPosisi($batas);

      $no=1+$posisi;
      $rw=mysqli_query($con,"SELECT * FROM gallery LIMIT $posisi, $batas");
      while($s=mysqli_fetch_array($rw)) {
    ?>
    <tbody>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo strip_tags($s['keterangan']);?></td>
      <td><?php echo $s['foto_gallery'];?></td>
      <td width="100">
          <a href="homeadmin.php?pg=editgallery&id=<?php echo $s['id_gallery'];?>"><i> </i> Edit </a>||
          <a href="proses/proses_gallery.php?act=deletegallery&id=<?php echo $s['id_gallery'];?>"><i></i> Delete </a>
      </td>
    </tr>
    <?php $no++; } ?>
  </table>
</div>
<div>
  <a href="homeadmin.php?pg=addgallery" class="btn btn-primary">Add Gallery</a>
</div>
<?php
//=============CUT HERE for paging====================================
  $tampil2 =mysqli_query($con,"select * from gallery");
  $jmldata =mysqli_num_rows($tampil2);
  //menampilkan jumlah_datatotal data
  echo " <div class='main-wrapperpagging'>
            <div>Jumlah : <span class='datecolor'>data $jmldata </span></div>
         </div>";
  //menampilkan link halaman ?>
  <div class='main-containernav'>
    <div class='inner-nav-link'>
        <div class='pagination'>
            <ul>
            <?php
                $jmlhalaman   = $p->jumlahHalaman($jmldata, $batas);
                $linkHalaman  = $p->navHalaman($_GET['halaman'], $jmlhalaman);
                echo  $linkHalaman;
            ?>
            </ul>
        </div>
    </div>
  </div>
