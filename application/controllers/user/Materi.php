<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller {
function __construct(){
		parent:: __construct();
		if (!$this->session->userdata('id_siswa')) {
			redirect('','refresh');
		}
	}
	public function index()
	{
		// $this->Mdl_Cek->get_sequrity();
		$username 	=$this->session->userdata('username');
		$id_kelas 	=$this->session->userdata('kelas');
		$data['data_siswa']		=$this->Mdl_user->get_data_siswa($username);
		$data['data_materi'] 	=$this->Mdl_user->get_data_materi_siswa($id_kelas);
		$this->load->view('user/user_view.php',$data);
	}
	public function detail($id_mapel=null)
	{
		// $this->Mdl_Cek->get_sequrity();
		$username 	=$this->session->userdata('username');
		$id_kelas 	=$this->session->userdata('kelas');
		$data['data_siswa']		=$this->Mdl_user->get_data_siswa($username);
		$data['data_materi'] 	=$this->Mdl_user->get_data_materi_detail($id_mapel,$id_kelas);
		$this->load->view('user/user_view.php',$data);	
	}
	public function detailb($id_materi=null)
	{
		// $this->Mdl_Cek->get_sequrity();
		$username 	=$this->session->userdata('username');
		$id_kelas 	=$this->session->userdata('kelas');
		$data['data_siswa']		=$this->Mdl_user->get_data_siswa($username);
		$data['data_materi'] 	=$this->Mdl_user->get_data_materi_detailb($id_materi,$id_kelas);
		$this->load->view('user/user_view.php',$data);
	}
}