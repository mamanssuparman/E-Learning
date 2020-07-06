<div class="flash-data" data-flashdataok="<?php echo $this->session->flashdata('berhasil');?>"></div>
<?php 
    foreach ($detail_materi->result_array() as $tampilkan):
?>
<div class="row">
	<div class="col-md-12">
		<h4><?php echo $tampilkan['judul_materi'] ?></h4>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
            <?php 
                echo $tampilkan['detail_materi'];
            ?>
		</div>
	</div>
</div>
<?php 
    endforeach;
?>