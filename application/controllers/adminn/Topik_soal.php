<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topik_soal extends CI_Controller {
function __construct(){
		parent:: __construct();
		$this->load->model('Mdl_admin');
		$this->load->model('Mdl_Cek');
		$this->load->library('session');
		$this->load->library('form_validation');
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
		$this->form_validation->set_rules('id_mapel','id_mapel','required|htmlspecialchars');
		$this->form_validation->set_rules('topik_nama','topik_nama','required|htmlspecialchars');
		$this->form_validation->set_rules('topik_detail','topik_detail','required|htmlspecialchars');
		if ($this->form_validation->run()== FALSE) {
			$this->session->set_flashdata('gagal','Maaf, Data topik Soal tidak berhasil di tambahkan.!');
			redirect('admin/Topik_soal');
		}
		else{
			$this->Mdl_admin->Add_topik_soal();
			$this->session->set_flashdata('berhasil','Data Topik soal berhasil di simpan.!!');
			redirect('admin/Topik_soal');
		}
		
	}
	public function Update()
	{
		// $this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$this->form_validation->set_rules('id_topik','id_topik','required|htmlspecialchars');
		$this->form_validation->set_rules('topik_nama','topik_nama','required|htmlspecialchars');
		$this->form_validation->set_rules('topik_detail','topik_detail','required|htmlspecialchars');
		if ($this->form_validation->run()== FALSE) {
			$this->session->set_flashdata('gagal','Maaf, update gagal dilakukan');
			redirect('admin/Topik_soal');
		}
		else{
			$this->Mdl_admin->Update_topik_soal();
			$this->session->set_flashdata('berhasil','Data topik berhasil di perbaharui.!!');
			redirect('adminn/Topik_soal/');
		}
		
	}
	public function Delete()
	{
		// $this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$this->form_validation->set_rules('id_topik','id_topik','required|htmlspecialchars');
		if ($this->form_validation->run()== FALSE) {
			$this->session->set_flahsdata('gagal','Maaf, data topik soal gagal di hapus.!');
			redirect('admin/Topik_soal');
		}
		else{
			$this->Mdl_admin->Delete_topik_soal();
			$this->session->set_flashdata('berhasil','Data topik berhasil di hapus.!!');
			redirect('admin/Topik_soal');	
		}
		
	}
}