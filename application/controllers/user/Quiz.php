<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {
function __construct(){
		parent:: __construct();
		if (!$this->session->userdata('id_siswa');) {
			redirect('','refresh');
		}
	}
	public function index()
	{
		$data = array(
			'siswa' => $this->mc->ambil('tbl_user',['id_user' => $this->session->userdata('id_siswa')])->row_array(),
			'kelas' => $this->mc->ambil('tbl_kelas',['id_kelas' => $this->session->userdata('kelas')])->row_array(),
			'title' => 'Diskusi'
		);
		$this->elearning->user('user/diskusi',$data);
	}
}