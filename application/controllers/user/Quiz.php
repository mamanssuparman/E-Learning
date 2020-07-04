<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {
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
			'kelas' => $this->mc->ambil('tbl_kelas',['id_kelas' => $this->session->userdata('kelas')])->row_array(),
			'title' => 'Diskusi'
		);
		$this->elearning->user('user/quiz',$data);
	}
	function ajax_list()
	{
		$list 	= $this->mt->get_datatables();
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list as $x) {
			$no++;
			$row 	= array();
			$row[]	= $no;
			$row[]	= $x->judul_materi;
			$row[]	= $x->nama_mapel;
			$row[]	= $x->deskripsi;
			$row[]	= '<a href="'.base_url('materi/view/'.base64_encode($x->id_materi)).'" class="btn btn-primary" title=""><i class="fa fa-eye"></i></a>';
			$data[]	= $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->mt->count_all(),
			"recordsFiltered" => $this->mt->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}
}