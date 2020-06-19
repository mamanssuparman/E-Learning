<div class="container">
<div class="flash-data" data-flashdataok="<?php echo $this->session->flashdata('berhasil');?>">
</div>
<div class="row">
	<div class="col-md-12">
		<?php 
			foreach ($detail_materi->result_array() as $showdetail) {
				echo $showdetail['judul_materi'];
				echo"<hr>";
				echo $showdetail['detail_materi'];
			}
		?>
	</div>
</div>

