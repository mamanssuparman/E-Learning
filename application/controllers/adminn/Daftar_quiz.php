<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_quiz extends CI_Controller {
function __construct(){
		parent:: __construct();
		$this->load->model('Mdl_admin');
		$this->load->model('Mdl_Cek');
		$this->load->library('session');
		$this->load->helper('cookie');
		//$this->load->libraries('session');
	}
	public function index()
	{
		$this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$data['judul'] 		="Quiz";
		$data['subjudul'] 	="Daftar Data Quiz";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Quiz/ Ulangan";
		$data['user'] 		="";
		$data['level'] 		="";
		$data['data_quiz'] 	=$this->Mdl_admin->get_data_quiz();
		//$data['data_topik']	=$this->Mdl_admin->get_data_topik();
		$this->load->view('adminn/admin_view.php',$data);
	}
}