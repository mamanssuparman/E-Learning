<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent:: __construct();
		if (!$this->session->userdata('id_siswa')) {
			redirect('','refresh');
		}
		$this->load->model('mod_quiz','mq');
	}
	public function index()
	{
		$data = array(
			'siswa' => $this->mc->ambil('tbl_user',['id_user' => $this->session->userdata('id_siswa')])->row_array(),
			'materi' => $this->mc->ambil('tbl_mapel_kelas_guru_group',['id_kelas' => $this->session->userdata('kelas')])->num_rows(),
			'quiz' => $this->mq->ambil()->num_rows(),
			'kelas' => $this->mc->ambil('tbl_kelas',['id_kelas' => $this->session->userdata('kelas')])->row_array(),
			'title' => 'Menu Utama'
		);
		$this->elearning->user('user/Menu_utama',$data);
		
	}
}