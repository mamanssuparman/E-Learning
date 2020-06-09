<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
function __construct(){
		parent:: __construct();
		$this->load->model('Mdl_Cek');
		$this->load->model('Mdl_user');
		$this->load->library('session');
		$this->load->helper('cookie');
		//$this->load->libraries('session');
	}
	public function index($id_user=null)
	{
		// $this->Mdl_Cek->get_sequrity();
		$username 	=$this->session->userdata('username');
		$data['data_siswa']		=$this->Mdl_user->get_data_siswa($username);
		$data['data_siswa'] 		=$this->Mdl_user->get_data_siswa($username);
		$this->load->view('user/user_view.php',$data);
	}
}