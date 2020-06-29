<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
function __construct(){
		parent:: __construct();
		$this->load->model('Mdl_admin');
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
		// $id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();
		$data['judul'] 		="Siswa";
		$data['subjudul'] 	="Kelas";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Data Kelas";
		$data['user'] 		="";
		$data['level'] 		="";
		$data['data_kelas'] =$this->Mdl_admin->get_data_kelas();
		$data['data_tapel'] =$this->Mdl_admin->get_data_tapel();
		$this->load->view('adminn/admin_view.php',$data);
	}
	public function Add()
	{
		$this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		// $id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();
		$this->form_validation->set_rules('kelas','kelas','required');
		$this->form_validation->set_rules('id_tapel','id_tapel','required');
		if ($this->form_validation->run()== FALSE) {
			$this->session->set_flasdata('gagal','Maaf, Data Kelas gagal di tambahkan.!');
			redirect('admin/Kelas');
		}
		else{
			$this->Mdl_admin->Save_kelas();
			$this->session->set_flashdata('berhasil','Data berhasil di simpan.!!');
			redirect('admin/Kelas');
		}
		
	}
	public function Update()
	{
		$this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		// $id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();
		$this->form_validation->set_rules('id_kelas','id_kelas','required');
		$this->form_validation->set_rules('kelas','kelas','required');
		if ($this->form_validation->run()== FALSE) {
			$this->session->set_flashdata('gagal','Data Kelas gagal di perbaharui.!!');
			redirect('admin/Kelas');
		}
		else{
			$this->Mdl_admin->Update_kelas();
			$this->session->set_flashdata('berhasil','Data berhasil di perbaharui.!!');
			redirect('admin/Kelas');
		}
		
	}
	public function Delete()
	{
		$this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		// $id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();
		$this->form_validation->set_rules('id_kelas','id_kelas','required');
		if ($this->form_validation->run()== FALSE) {
			$this->session->set_flashdata('gagal','Data Kelas gagal di hapus.!!');
			redirect('admin/Kelas');
		}
		else{
			$this->Mdl_admin->Delete_kelas();
			$this->session->set_flashdata('berhasil','Data kelas berhasil di hapus.!!');
			redirect('admin/Kelas');
		}
		
	}
}