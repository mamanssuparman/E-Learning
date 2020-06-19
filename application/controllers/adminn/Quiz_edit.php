<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz_edit extends CI_Controller {
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
		$data['subjudul'] 	="Edit Quiz";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Quiz/ Ulangan";
		$data['user'] 		="";
        $data['level'] 		="";
        $data['data_quiz_edit']=$this->Mdl_admin->get_data_quiz_edit();
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
}