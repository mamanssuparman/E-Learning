<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Join_forum extends CI_Controller {
function __construct(){
		parent:: __construct();
		$this->load->model('Mdl_admin');
		$this->load->model('Mdl_Cek');
		$this->load->library('session');
		$this->load->helper('cookie');
		//$this->load->libraries('session');
	}
	public function index($id_kelas=null)
	{
		//$kunci				=$this->uri->segment(4);
		$this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		redirect('adminn/Forum/','refresh');
		
	}
	public function group($id_kelas=null)
	{
		$this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$data['judul'] 		="Forum";
		$data['subjudul'] 	="List Group Chat";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="List Group Chat";
		$data['user'] 		="";
		$data['level'] 		="";
		$data['data_diskusi'] 	=$this->Mdl_admin->get_data_join_forum($id_kelas);
		$this->load->view('adminn/admin_view.php',$data);
	}
	public function Send($id_kelas)
	{
		$this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		$id_guru 	=$this->input->post('id_guru',TRUE);
		$data['data_guru'] 	=$this->Mdl_admin->get_data_nama_guru($id_guru);
		if ($data['data_guru']->num_rows()>0) {
			$this->Mdl_admin->Send_chat($id_kelas,$id_guru);
			redirect('adminn/Join_forum/group/'.$id_kelas);
		}
	}
}