<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {
function __construct(){
		parent:: __construct();
		$this->load->model('Mdl_admin');
		$this->load->model('Mdl_Cek');
		$this->load->library('session');
		$this->load->helper('cookie');
		//$this->load->libraries('session');
		if($this->session->userdata('hak_akses')!='2')
		{
			redirect('','refresh');
		}
	}
	public function index()
	{
		//$kunci				=$this->uri->segment(4);
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
        $idguru 		=$this->session->userdata('id_guru');
		$data['data_diskusi'] 	=$this->Mdl_admin->get_data_diskusi_guru($idguru);
		$this->load->view('guru/guru_view.php',$data);
	}
}