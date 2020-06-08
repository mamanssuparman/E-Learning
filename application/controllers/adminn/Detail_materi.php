<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_materi extends CI_Controller {
function __construct(){
		parent:: __construct();
		$this->load->model('Mdl_admin');
		$this->load->model('Mdl_Cek');
		$this->load->library('session');
		$this->load->helper('cookie');
		//$this->load->libraries('session');
	}
	public function index($id_materi=null)
	{
		
		$this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$data['judul'] 		="Materi";
		$data['subjudul'] 	="Daftar List Materi";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Detail Materi";
		$data['user'] 		="";
		$data['level'] 		="";
		$data['detail_materi'] =$this->Mdl_admin->get_detail_materi($id_materi);
		$this->load->view('adminn/admin_view.php',$data);
	}
}