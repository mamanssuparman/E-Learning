<div class="flash-data" data-flashdataok="<?php echo $this->session->flashdata('berhasil');?>">
</div>
<p>
	<h3>Daftar Forum</h3>
</p>
<div>
	<div class="row" >
		<?php
		foreach ($data_diskusi->result_array() as $showdatadiskusi) :
	?>
		<div class="col-md-3">
		<div class="small-box bg-green">
			<div class="inner">
				<h3><?php echo $showdatadiskusi['nama_kelas'];?></h3>
			</div>
			<div class="icon">
				<i class="fa fa-wechat"></i>
			</div>
			<a href="<?php echo base_url();?>index.php/adminn/Join_forum/group/<?php echo $showdatadiskusi['id_kelas']; ?>" class="small-box-footer">Join Forum <i class="fa fa-arrow-circle-right"></i></a>
		</div>
		</<div>
	</div>
	<?php 
		endforeach;
	?>
</div>