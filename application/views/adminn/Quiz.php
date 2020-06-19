<div class="flash-data" data-flashdataok="<?php echo $this->session->flashdata('berhasil');?>">
</div>
<hr>
<?php
	$uri3=$this->uri->segment(3);
	switch ($uri3) {
		case 'Edit':
			$this->load->view('adminn/_Quiz_edit.php');
			break;
		default:
			$this->load->view('adminn/_Quiz_add.php');
			break;
	}
?>