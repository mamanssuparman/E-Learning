<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detailm extends CI_Controller {
function __construct(){
		parent:: __construct();
		$this->load->model('Mdl_Cek');
		$this->load->model('Mdl_user');
		$this->load->library('session');
		$this->load->helper('cookie');
		//$this->load->libraries('session');
	}
	public function index($id_mapel=null)
	{
		// $this->Mdl_Cek->get_sequrity();
		$username 	=$this->session->userdata('username');
		$id_kelas 	=$this->session->userdata('kelas');
		$data['data_siswa']		=$this->Mdl_user->get_data_siswa($username);
		$data['data_materi'] 	=$this->Mdl_user->get_data_materi_siswa($id_kelas);

		$this->load->view('user/user_view.php',$data);
	}
}