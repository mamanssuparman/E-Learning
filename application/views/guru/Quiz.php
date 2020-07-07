<?php 
	$uri = $this->uri->segment(3);
	switch ($uri) {
		case 'Perbaharui':
			$this->load->view('guru/_data_quiz_edit');
			break;
		default:
			$this->load->view('guru/_data_quiz_add');
			break;
	}
?>