<div class="flash-data" data-flashdataok="<?php echo $this->session->flashdata('berhasil');?>">
</div>
<div class="row">
	<div class="col-md-12">
	<?php 
		$uri4 	=$this->uri->segment(3);
		switch ($uri4) {
			case 'Add':
				$this->load->view('adminn/_materi_add.php');
				break;
			case 'List_Materi':
				$this->load->view('adminn/_materi_list_materi_mapel.php');
				break;
			default:
				echo "Data yang anda cari tidak ditemukan.!!";
				break;
		}
	?>
	</div>
</div>