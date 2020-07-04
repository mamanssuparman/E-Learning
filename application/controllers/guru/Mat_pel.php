<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mat_pel extends CI_Controller {
function __construct(){
		parent:: __construct();
		$this->load->model('Mdl_admin');
		$this->load->model('Mdl_guru');
		$this->load->model('Mdl_Cek');
		$this->load->library('session');
		$this->load->helper('cookie');
		$this->load->library('form_validation');
		//$this->load->libraries('session');
	}
	public function index()
	{
		$this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		$this->Mdl_Cek->get_sequrity_akses_guru();
		// $id_pengguna 		=$this->session->userdata('username');
		$idguru 		=$this->session->userdata('id_guru');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();

		$data['judul'] 		="Materi";
		$data['subjudul'] 	="Materi Pelajaran";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Data Materi";
		$data['user'] 		="";
		$data['level'] 		="";
		$data['cek']		=$idguru;
		$data['data_mat_pel'] =$this->Mdl_guru->get_data_mat_pel($idguru);
		// $data['data_tapel'] =$this->Mdl_admin->get_data_tapel();
		$this->load->view('guru/guru_view.php',$data);
	}
	
}