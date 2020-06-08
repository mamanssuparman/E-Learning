<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {
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
		$data['judul'] 		="Quiz";
		$data['subjudul'] 	="Add Quiz";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Quiz/ Ulangan";
		$data['user'] 		="";
		$data['level'] 		="";
		$data['data_kelas'] =$this->Mdl_admin->get_data_kelas();
		$data['data_topik']	=$this->Mdl_admin->get_data_topik();
		$this->load->view('adminn/admin_view.php',$data);
	}
	public function Add()
	{
		$this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$this->Mdl_admin->Add_tes();
		$this->session->set_flashdata('berhasil','Data Tes berhasil di simpan.!!');
		redirect('adminn/Quiz/');
	}
	public function Edit($id_quiz=null)
	{
		$this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$data['judul'] 		="Quiz";
		$data['subjudul'] 	="Edit Quiz";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Quiz/ Ulangan";
		$data['user'] 		="";
		$data['level'] 		="";
		$data['data_quiz'] 	=$this->Mdl_admin->get_data_quiz_edit($id_quiz);
		//untuk data kelas terpilih
		$data['data_kelas_pilih']=$this->Mdl_admin->get_data_quiz_kelas($id_quiz)->result();
		foreach ($data['data_kelas_pilih'] as $tampilkelaspilih) {
			$nilaikelas[]=(float) $tampilkelaspilih->id_kelas;
		}
		$data['tampil_pilih_kelas'] = json_encode($nilaikelas);
		//untuk data topik terpilih
		$data['data_kelas'] =$this->Mdl_admin->get_data_kelas();
		$data['data_topik']	=$this->Mdl_admin->get_data_topik();
		$this->load->view('adminn/admin_view.php',$data);
	}
	public function Update()
	{
		$this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		//$id_quiz=$this->input->post('id_tes',TRUE);
		$this->Mdl_admin->update_tes();
		//$this->Mdl_admin->delete_group_tes_before();
		//$this->Mdl_admin->update_tes1($id_quiz);
		
		//$this->Mdl_admin->Add_tes();
		$this->session->set_flashdata('berhasil','Data Tes berhasil di simpan.!!');
		redirect('adminn/Daftar_quiz/');
	}
}