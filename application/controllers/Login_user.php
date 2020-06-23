<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_user extends CI_Controller {
	public function index()
	{	
		if ($this->session->userdata('id_siswa')) {
			redirect('user','refresh');
		}
		$username 		= $this->input->post('username');
		$password 		= $this->input->post('password');	
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_message('required', '{field} tidak boleh kosong');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Login');
		}else{
			$q = $this->mc->ambil('tbl_user',['username' => $username])->row_array();
			if ($q) {
				if (password_verify($password, $q['panserword1'])) {
					$array = array(
						'id_siswa' => $q['id_user'],
						'nama' => $q['nama_siswa'],
						'kelas' => $q['id_kelas'],
					);
					
					$this->session->set_userdata( $array );
					redirect('user','refresh');
				}else{
					$this->session->set_flashdata('eror', 'username/password salah');
					redirect('Login_user','refresh');
				}
			}else{
				$this->session->set_flashdata('eror', 'username/password salah');
				redirect('Login_user','refresh');
			}
		}
	}
	public function Log_out()
	{
		//$this->Mdl_sequrity->get_sequrity();
		$this->session->sess_destroy();
		redirect('');
	}
}