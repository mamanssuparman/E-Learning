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
		if($this->session->userdata('hak_akses')!='2')
		{
			redirect('','refresh');
		}
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
	public function List_materi()
	{
		$this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		$this->Mdl_Cek->get_sequrity_akses_guru();
		// $id_pengguna 		=$this->session->userdata('username');
		$idguru 		=$this->session->userdata('id_guru');
		$id_mapel 		=$this->uri->segment(4);
		$sha1 			=$this->uri->segment(5);
		if ($sha1==sha1($id_mapel)) {
			$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();
			$data['judul'] 		="Materi";
			$data['subjudul'] 	="Materi Pelajaran";
			$data['title'] 		="3-learning";
			$data['judulbesar']	="Data Materi";
			$data['user'] 		="";
			$data['level'] 		="";
			$data['cek']		=$idguru;
			$data['list_materi'] =$this->Mdl_guru->get_data_materi($id_mapel,$idguru);
			$this->load->view('guru/guru_view',$data);	
		}
		else{
			$this->session->set_flashdata('gagal','Maaf, Silahkan pergunakan sesuai ketentuan.!');
			redirect('guru/Mat_pel','refresh');
		}
		
	}
	public function Detail()
	{
		$this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		$this->Mdl_Cek->get_sequrity_akses_guru();
		// $id_pengguna 		=$this->session->userdata('username');
		$idguru 		=$this->session->userdata('id_guru');
		$id_mapel 		=$this->uri->segment(4);
		$sha1 			=$this->uri->segment(5);
		if ($sha1==sha1($id_mapel)) {
			$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();
			$data['judul'] 		="Materi";
			$data['subjudul'] 	="Materi Pelajaran";
			$data['title'] 		="3-learning";
			$data['judulbesar']	="Data Materi";
			$data['user'] 		="";
			$data['level'] 		="";
			$data['cek']		=$idguru;
			$data['detail_materi'] =$this->Mdl_guru->get_data_materi($id_mapel,$idguru);
			$this->load->view('guru/guru_view',$data);	
		}
		else{
			$this->session->set_flashdata('gagal','Maaf, Silahkan pergunakan sesuai ketentuan.!');
			redirect('guru/Mat_pel','refresh');
		}
	}
	
}