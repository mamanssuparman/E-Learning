<?php 
	$uri = $this->uri->segment(3);
	switch ($uri) {
		case 'data_siswa':
			$this->load->view('guru/_data_kelas_siswa');
			break;
		
		default:
			$this->load->view('guru/_data_kelas');
			break;
	}
?>