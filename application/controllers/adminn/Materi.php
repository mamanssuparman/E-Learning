<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller {
//private $kunci_mapel = $this->uri->segment(4);
function __construct(){
		parent:: __construct();
		$this->load->model('Mdl_admin');
		$this->load->model('Mdl_Cek');
		$this->load->library('session');
		//$this->load->helper('cookie');
		//private $kunci 	=$this->uri->segment(4);
		
	}
	public function index($id_mapel=null)
	{
		//$kunci				=$this->uri->segment(4);
		$this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$data['judul'] 		="Materi";
		$data['subjudul'] 	="Materi Pelajaran";
		$data['title'] 		="3-learning";
		$data['id_mapel'] 	=$id_mapel;
		$get_nama_mapel 	=$this->Mdl_admin->get_nama_mapel($id_mapel);
		foreach ($get_nama_mapel->result_array() as $shownamamapel):
		$data['judulbesar']	=$shownamamapel['nama_mapel'];
		endforeach;
		$data['user'] 		="";
		$data['level'] 		="";
		//$data['data_mat_pel'] =$this->Mdl_admin->get_data_mat_pel();
		//$data['data_kelas'] =$this->Mdl_admin->get_data_kelas();
		//$data['data_soal_topik'] 	=$this->Mdl_admin->get_data_soal_topik_limit($this->uri->segment(4));
		$this->load->view('adminn/admin_view.php',$data);
	}
	public function Add($id_mapel=null)
	{
		//$kunci				=$this->uri->segment(4);
		$this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$data['judul'] 		="Materi";
		$data['subjudul'] 	="Materi Pelajaran";
		$data['title'] 		="3-learning";
		$data['id_mapel'] 	=$id_mapel;
		$get_nama_mapel 	=$this->Mdl_admin->get_nama_mapel($id_mapel);
		foreach ($get_nama_mapel->result_array() as $shownamamapel):
		$data['judulbesar']	=$shownamamapel['nama_mapel'];
		endforeach;
		$data['user'] 		="";
		$data['level'] 		="";
		//$data['data_mat_pel'] =$this->Mdl_admin->get_data_mat_pel();
		//$data['data_kelas'] =$this->Mdl_admin->get_data_kelas();
		//$data['data_soal_topik'] 	=$this->Mdl_admin->get_data_soal_topik_limit($this->uri->segment(4));
		$this->load->view('adminn/admin_view.php',$data);
	}
	public function Save($id_mapel=null)
	{
		//$id_mapel 		=$this->input->post('id_mapel', TRUE);
		//$idmapel2		=$id_mapel;
		$this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$this->Mdl_admin->Save_materi($id_mapel);
		$this->session->set_flashdata('berhasil','Data Materi berhasil di simpan.!!');
		//redirect('adminn/Dashboard/');
		redirect("adminn/Materi/list_materi_mapel/$id_mapel");
	}
	public function list_materi_mapel($id_mapel=null)
	{
		$this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$data['judul'] 		="Materi";
		$data['subjudul'] 	="Materi Pelajaran";
		$data['title'] 		="3-learning";
		$data['id_mapel'] 	=$id_mapel;
		$data['data_list_mapel'] 	=$this->Mdl_admin->get_materi_mapel($id_mapel);
		$get_nama_mapel 	=$this->Mdl_admin->get_nama_mapel($id_mapel);
		foreach ($get_nama_mapel->result_array() as $shownamamapel):
		$data['judulbesar']	=$shownamamapel['nama_mapel'];
		endforeach;
		$data['user'] 		="";
		$data['level'] 		="";
		//$data['data_mat_pel'] =$this->Mdl_admin->get_data_mat_pel();
		//$data['data_kelas'] =$this->Mdl_admin->get_data_kelas();
		//$data['data_soal_topik'] 	=$this->Mdl_admin->get_data_soal_topik_limit($this->uri->segment(4));
		$this->load->view('adminn/admin_view.php',$data);
	}
}