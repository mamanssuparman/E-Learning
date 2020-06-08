<div class="flash-data" data-flashdataok="<?php echo $this->session->flashdata('berhasil');?>">
</div>
<?php 
	$uri3=$this->uri->segment(3);
	switch ($uri3) {
		case 'Detail':
			$this->load->view('adminn/_List_materi_Detail.php');
			break;
		
		default:
			$this->load->view('adminn/_List_materi_view.php');
			break;
	}
?>