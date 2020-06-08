    <table id="example1" class="table table-bordered table-hover">
      <thead>
        <th>No</th>
        <th>Nama Mapel</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
      </thead>
      <tbody>
        <?php
          $no=1; 
          foreach ($data_materi->result_array() as $showmateri):
            echo "<tr>";
              echo '<td>'.$no++.'</td>';
              echo "<td>$showmateri[nama_mapel]</td>";
              echo "<td>$showmateri[deskripsi]</td>"; ?>
              <td>
                <a href="<?php echo base_url();?>index.php/user/Materi/detail/<?php echo $showmateri['id_mapel'] ?>"> <button class="btn btn-success btn-xs"><li class="fa fa-search"></li> Lihat</button></a>
              </td>

        <?php    echo "</tr>";
          endforeach;
        ?>
      </tbody>
    </table>    