<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
function __construct(){
		parent:: __construct();
		$this->load->model('Mdl_admin');
		$this->load->model('Mdl_Cek');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('cookie');
		if($this->session->userdata('hak_akses')!='1')
		{
			redirect('','refresh');
		}
		//$this->load->libraries('session');
	}
	public function index()
	{
		$this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		// $id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();
		//$kunci				=$this->uri->segment(4);
		$data['judul'] 		="Materi";
		$data['subjudul'] 	="Guru Pengajar";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Guru Pengajar";
		$data['user'] 		="";
		$data['level'] 		="";
		$data['data_guru'] =$this->Mdl_admin->get_data_guru();
		//$data['data_kelas'] =$this->Mdl_admin->get_data_kelas();
		//$data['data_soal_topik'] 	=$this->Mdl_admin->get_data_soal_topik_limit($this->uri->segment(4));
		$this->load->view('adminn/admin_view.php',$data);
	}
	public function Add()
	{
		$this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		// $id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();
		$this->form_validation->set_rules('unsername','unsername','required|htmlspecialchars|is_unique[tbl_guru.unsername]');
		$this->form_validation->set_rules('nama','nama','required|htmlspecialchars');
		$this->form_validation->set_rules('panserword','panserword','required|htmlspecialchars');
		$this->form_validation->set_rules('tempat_lahir','tempat_lahir','required|htmlspecialchars');

		if ($this->form_validation->run()== FALSE) {
			$this->session->set_flashdata('gagal','Data Guru gagal di simpan.!');
			redirect('admin/Guru');
		}
		else{
			$this->Mdl_admin->Save_guru();
			$this->session->set_flashdata('berhasil','Data Guru berhasil di simpan.!!');
			redirect('admin/Guru');
		}
		
	}
	public function Edit()
	{
		$this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		// $id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();
		$this->form_validation->set_rules('id_guru','id_guru','required');
		// $this->form_validation->set_rules('unsername','unsername','required');
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('panserword','panserword','htmlspecialchars');
		$this->form_validation->set_rules('tempat_lahir','tempat_lahir','required');
		if ($this->form_validation->run()== FALSE) {
			$this->session->set_flashdata('gagal','Data Guru gagal di perbaharui, dikarenakan ada data yang tidak sesuai atau kurang lengkap.!');
			redirect('admin/Guru');
		}
		else{
			$this->Mdl_admin->Update_guru();
			$this->session->set_flashdata('berhasil','Data Guru berhasil di simpan.!!');
			redirect('admin/Guru');
		}
		
	}
}