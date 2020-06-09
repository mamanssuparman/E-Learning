<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topik_soal extends CI_Controller {
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
		// $this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$data['judul'] 		="Bank Soal";
		$data['subjudul'] 	="Topik Soal";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Bank Soal";
		$data['user'] 		="";
		$data['level'] 		="";
		$data['data_topik'] =$this->Mdl_admin->get_data_topik();
		$data['data_mapel'] =$this->Mdl_admin->get_data_mat_pel();
		$this->load->view('adminn/admin_view.php',$data);
	}
	public function Add()
	{
		// $this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$this->Mdl_admin->Add_topik_soal();
		$this->session->set_flashdata('berhasil','Data Topik soal berhasil di simpan.!!');
		redirect('adminn/Topik_soal/');
	}
	public function Update()
	{
		// $this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$this->Mdl_admin->Update_topik_soal();
		$this->session->set_flashdata('berhasil','Data topik berhasil di perbaharui.!!');
		redirect('adminn/Topik_soal/');
	}
	public function Delete()
	{
		$this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$this->Mdl_admin->Delete_topik_soal();
		$this->session->set_flashdata('berhasil','Data topik berhasil di hapus.!!');
		redirect('adminn/Topik_soal/');	
	}
}