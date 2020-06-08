    <?php 
      foreach ($data_materi->result_array() as $showmateri) : ?>
        <h3><?php echo $showmateri['judul_materi'] ?></h3>
        <hr>
        <p>
          <?php echo $showmateri['detail_materi'];?>
        </p>
    <?php  endforeach;
    ?>