<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lihat_soal extends CI_Controller {
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
		$id_topik 			=$this->uri->segment(4);
		$data['judul'] 		="Bank Soal";
		$data['subjudul'] 	="Topik Soal";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Bank Soal";
		$data['user'] 		="";
		$data['level'] 		="";
		$data['data_topik'] =$this->Mdl_admin->get_data_nama_topik($id_topik);
		$data['data_soal']	=$this->Mdl_admin->get_data_lihat_soal($id_topik);
		$this->load->view('adminn/admin_view.php',$data);
	}
}