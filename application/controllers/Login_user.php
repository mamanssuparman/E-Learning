<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_user extends CI_Controller {
function __construct(){
		parent:: __construct();
		$this->load->model('Mdl_Cek');
		$this->load->library('session');
		$this->load->helper('cookie');
		//$this->load->libraries('session');
	}
	public function Cek_user()
	{	
		$username 		=$this->input->post('username',TRUE);
		$password 		= md5($_POST['password']);
		$data['query_cari_unsername']	=$this->Mdl_Cek->Cek_user($username,$password);
		
		$ketemudata=$data['query_cari_unsername'];
		if($ketemudata->num_rows()>0)
		{
			foreach ($ketemudata->result() as $ketemu) 
			{
				$sess		=array('username'		=>$ketemu->username,
									'password'	=>$ketemu->paserword,
									'level' 		=>'siswa',
									'kelas' 	=>$ketemu->id_kelas,
									'id_user' 	=>$ketemu->id_user);
				$this->session->set_userdata($sess);
				redirect('user');				
			}
		}
		else
		{
			$this->session->set_flashdata('berhasil', 'Maaf anda tidak berhasil login');
			redirect('');
		}
		$this->Model_Security->get_sequrity();
	}
	public function Log_out()
	{
		//$this->Mdl_sequrity->get_sequrity();
		$this->session->sess_destroy();
		redirect('');
	}
}