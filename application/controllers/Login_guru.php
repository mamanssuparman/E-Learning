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
		$this->load->library('form_validation');
		$username 		=$this->input->post('username',TRUE);
		$password 		=$this->input->post('password',TRUE);
		$this->form_validation->set_rules('username','username','trim|required');
		$this->form_validation->set_rules('password','password','trim|required');
		$this->form_validation->set_message('required','{field} tidak boleh kosong');
		if ($this->form_validation->run()== FALSE) {
			redirect('Login_user','refresh');
		}
		else{
			$ketemu=$this->db->get_where('tbl_guru',array('unsername' =>$username));
			if ($ketemu->num_rows()>0) {
				foreach ($ketemu->result_array() as $ada) {
					if (password_verify($password,$ada['panserword'])) {
						$sessionnya=array(
							'nama' 			=>$ada['nama'],
							'userguru'		=>$ada['unsername'],
							'id_guru'		=>$ada['id_guru'],
							'hak_akses'		=>$ada['id_akses']
						);
						$this->session->set_userdata($sessionnya);
						//redirect('admin','refresh');
						// untuk pembagian hak akses Guru dan SA dengan menggunakan Kondisi IF 1 = Admin 2 = Guru
						if ($this->session->userdata('hak_akses')=='1') {
							redirect('admin','refresh');
						}
						if ($this->session->userdata('hak_akses')=='2') {
							redirect('guru','refresh');
						}
					}
					else{
						$this->session->set_flashdata('eror_admin','Password yang anda masukkan salah.!');
						redirect('Login_user','refresh');
					}
				}
			}
			else{
				$this->session->set_flashdata('eror_admin','Username dan Password tidak ditemukan.!');
				redirect('Login_user','refresh');
			}
		}
		
	}
	public function Log_out()
	{
		// $this->Mdl_sequrity->get_sequrity();
		$this->session->sess_destroy();
		redirect('');
	}
}