<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jawaban extends CI_Controller {
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
		$kunci 				=$this->uri->segment(4);
		$data['judul'] 		="Bank Soal";
		$data['subjudul'] 	="Daftar Soal";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Data Soal";
		$data['user'] 		="";
		$data['level'] 		="";
		//$data['data_topik'] =$this->Mdl_admin->get_data_topik();
		//$data['data_soal']	=$this->Mdl_admin->get_data_soal();
		$data['data_soal']	=$this->Mdl_admin->get_data_soal_limit($kunci);
		$data['data_jawaban']	=$this->Mdl_admin->get_data_jawaban_limit($kunci);
		$this->load->view('adminn/admin_view.php',$data);
	}
	public function Add()
	{
		$this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$kunci 	=$_POST['id_soal'];
		$this->Mdl_admin->Save_jawaban();
		$this->session->set_flashdata('berhasil','Data Jawaban berhasil di simpan.!!:)');
		redirect('adminn/jawaban/index/'.$kunci,'refresh');
	}
}