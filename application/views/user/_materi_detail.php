<table id="example1" class="table table-hover">
  <thead>
    <th>No</th>
    <th>Judul Materi</th>
    <th>Detail Materi</th>
    <th>Aksi</th>
  </thead>
  <tbody>
    <?php 
      $no=1;
      foreach ($data_materi->result_array() as $showmateri):
        echo "<tr>";
          echo '<td>'.$no++.'</td>';
          echo "<td>$showmateri[judul_materi]</td>"; ?>
          <td><?php echo $showmateri['detail_materi'];?></td>'
              <td>
                <a href="<?php echo base_url();?>index.php/user/Materi/detailb/<?php echo $showmateri['id_materi'];?>"><button class="btn btn-info btn-xs"><li class="fa fa-search"></li> Baca</button></a>
              </td>
    <?php    echo "</tr>";
      endforeach;
    ?>
  </tbody>
</table>