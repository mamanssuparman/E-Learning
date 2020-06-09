<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
function __construct(){
		parent:: __construct();
		$this->load->model('Mdl_Cek');
		$this->load->model('Mdl_user');
		$this->load->library('session');
		$this->load->helper('cookie');
		//$this->load->libraries('session');
	}
	public function index()
	{
		// $this->Mdl_Cek->get_sequrity();
		$id_kelas 				=$this->session->userdata('kelas');
		$username				=$this->session->userdata('username');
		$data['data_siswa']		=$this->Mdl_user->get_data_siswa($username);
		$data['jumlah_mapel'] 	=$this->Mdl_user->get_sum_mapel($id_kelas);
		$this->load->view('user/user_view.php',$data);
	}
}