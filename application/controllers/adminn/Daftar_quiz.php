<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_quiz extends CI_Controller {
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
	public function Delete()
	{
		$this->Mdl_Cek->get_sequrity();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$idtes 	=$this->input->post('array',TRUE);
		$sha1idtes =$this->uri->segment(4);
		if (sha1($idtes)==$sha1idtes) {
			$this->form_validation->set_rules('array','array','required');
			if ($this->form_validation->run()== FALSE) {
				$this->session->set_flashdata('gagal','Maaf, anda tidak bisa menghapus.');
				redirect('admin/Daftar_quiz');
			}
			else{
				$this->Mdl_admin->Delete_quiz($idtes);
				$this->session->set_flashdata('berhasil','Data Quiz Berhasil di hapus.!');
				redirect('admin/Daftar_quiz');
			}
		}
		else{
			redirect('admin');
		}
	}
}