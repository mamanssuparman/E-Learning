<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_mapel_guru extends CI_Controller {
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
		//$kunci				=$this->uri->segment(4);
		$this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		// $id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();
		$data['judul'] 		="Materi";
		$data['subjudul'] 	="List Mapel Guru";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Daftar Mapel Guru";
		$data['user'] 		="";
		$data['level'] 		="";
		$data['data_mapel_group'] =$this->Mdl_admin->get_data_mapel_group();
		$data['data_mapel_group_limit'] 	=$this->Mdl_admin->get_data_mapel_group_limit();
		$data['data_guru'] =$this->Mdl_admin->get_data_guru();
		//$data['data_soal_topik'] 	=$this->Mdl_admin->get_data_soal_topik_limit($this->uri->segment(4));
		$this->load->view('adminn/admin_view.php',$data);
	}
	public function Add()
	{
		$this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();
		$this->form_validation->set_rules('id_group','id_group','required|htmlspecialchars');
		$this->form_validation->set_rules('id_guru','id_guru','required');
		if ($this->form_validation->run()== FALSE) {
			$this->session->set_flashdata('gagal','Maaf, Data List Mapel Guru gagal di tambahkan.!');
			redirect('admin/List_mapel_guru');
		}
		else{
			$this->Mdl_admin->add_update_mapel_guru();
			$this->session->set_flashdata('berhasil','Data Guru berhasil di tambahkan.');
			redirect('admin/List_mapel_guru');
		}
		
	}
}