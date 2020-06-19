<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_guru extends CI_Controller {
function __construct(){
		parent:: __construct();
		$this->load->model('Mdl_Cek');
		$this->load->library('session');
		$this->load->helper('cookie');
		//$this->load->libraries('session');
	}
	public function Cek_user()
	{	
		// $username 		=$_POST['username'];
		// $password 		=$_POST['password'];
		$username 			=$this->input->post('username',TRUE);
		// $password 			=password_hash($this->input->post('password',TRUE),PASSWORD_DEFAULT);
		$password 			=md5($this->input->post('password','refresh'));
		$data['query_cari_unsername'] 		=$this->Mdl_Cek->Cek_guru($username);
		$ketemudata=$data['query_cari_unsername'];
		if ($ketemudata->num_rows()>0) {
				
		}


		if (password_verify($this->input->post('password',TRUE),$password)) {
			$data['query_cari_unsername']	=$this->Mdl_Cek->Cek_guru($username);
		
			$ketemudata=$data['query_cari_unsername'];
			if($ketemudata->num_rows()>0)
			{
				foreach ($ketemudata->result() as $ketemu) 
				{
					$sess		=array('username'		=>$ketemu->unsername,
										'password'	=>$ketemu->panserword,
										'level' 		=>'guru',
										'id_user' 	=>$ketemu->id_guru);
					$this->session->set_userdata($sess);
					redirect('adminn/');				
				}
			}
			else
			{
				$this->session->set_flashdata('berhasil', 'Maaf anda tidak berhasil login');
				redirect('');
			}
			$this->Model_Security->get_sequrity();	
		}
		else{
			redirect('');
		}
		
	}
	public function Log_out()
	{
		//$this->Mdl_sequrity->get_sequrity();
		$this->session->sess_destroy();
		redirect('');
	}
}