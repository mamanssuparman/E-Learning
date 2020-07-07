<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
function __construct(){
		parent:: __construct();
		$this->load->model('Mdl_admin');
		$this->load->model('Mdl_Cek');
		$this->load->library('session');
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
		// $this->Mdl_Cek->get_sequrity_akses();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$data['judul'] 		="Dashboard";
		$data['subjudul'] 	="e-learning";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Dashboard";
		$data['user'] 		="";
		$data['level'] 		="";
		//$data['data_topik'] =$this->Mdl_admin->get_data_topik();
		$data['data_soal']	=$this->Mdl_admin->get_data_soal();
		$data['sum_data_siswa']	=$this->Mdl_admin->get_sum_data_siswa();
		$data['sum_data_mapel']	=$this->Mdl_admin->get_sum_data_mapel();
		$data['sum_data_materi']	=$this->Mdl_admin->get_sum_data_materi();
		$data['sum_data_soal'] 		=$this->Mdl_admin->get_sum_data_soal();
		$this->load->view('adminn/admin_view.php',$data);
	}
}