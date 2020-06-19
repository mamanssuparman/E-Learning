<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
function __construct(){
		parent:: __construct();
		$this->load->model('Mdl_admin');
		$this->load->model('Mdl_Cek');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('cookie');
		//$this->load->libraries('session');
	}
	public function index()
	{
		// $this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$data['judul'] 		="Siswa";
		$data['subjudul'] 	="Data Siswa";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Data Siswa";
		$data['user'] 		="";
		$data['level'] 		="";
		$data['data_kelas'] =$this->Mdl_admin->get_kelas_all();
		$data['data_siswa'] =$this->Mdl_admin->get_data_siswa();
		$this->load->view('adminn/admin_view.php',$data);
	}
	public function Add()
	{
		// $this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$username 		=$this->input->post('username', TRUE);
		$get_data_siswa =$this->Mdl_admin->get_cari_siswa($username);
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('password','password','required');
		$this->form_validation->set_rules('Kelas','Kelas','required');
		$this->form_validation->set_rules('username','username','required|is_unique[tbl_user.username]');
		if ($this->form_validation->run()== FALSE) {
			$this->session->set_flashdata('gagal','NIS / Username siswa sudah ada.');
			redirect('admin/Siswa');
		}
		else{
			$this->Mdl_admin->Save_siswa();	
			$this->session->set_flashdata('berhasil','Data Username '.$username.' sudah tersimpan');
			redirect('admin/Siswa');
		}
		// if ($get_data_siswa->num_rows()>0) {
		// 	$this->session->set_flashdata('berhasil','Data Username '.$username.' sudah tersedia');
		// 	redirect('adminn/Siswa/');
		// }
		// else{
			
		// }
		
	}
	public function Update()
	{
		// $this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$this->form_validation->set_rules('id_user','id_user','required|htmlspecialchars');
		$this->form_validation->set_rules('nama','nama','required|htmlspecialchars');
		// $this->form_validation->set_rules('username',);
		$this->form_validation->set_rules('password','password','required|htmlspecialchars');
		$this->form_validation->set_rules('Kelas','Kelas','required|htmlspecialchars');
		$id_user 	=$this->input->post('id_user', TRUE);
		if ($this->form_validation->run()== FALSE) {
			$this->session->set_flashdata('gagal','Data Siswa gagal diperbaharui.!');
			redirect('admin/Siswa');
		}
		else{
			$this->Mdl_admin->Update_siswa($id_user);
			$this->session->set_flashdata('berhasil','Data Siswa berhasil di perbaharui');
			redirect('admin/Siswa');
		}
		
	}
	public function Delete()
	{
		// $this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$this->form_validation->set_rules('id_user','id_user','required');
		if ($this->form_validation->run()== FALSE) {
			$this->session->set_flashdata('gagal','Data Siswa gagal di hapus.!!');
			redirect('admin/Siswa');
		}
		else{
			//proses validasi jika terdapat relasi
			$this->db->trans_start();
			$id_user 	=$this->input->post('id_user', TRUE);
			$this->Mdl_admin->Delete_siswa($id_user);
			$this->db->trans_complete();
			if ($this->db->trans_status()=== 1) {
				$this->session->set_flashdata('gagal','Data Siswa tidak bisa dihapus dikarenakan masih dipergunakan tes.!');
				redirect('admin/Siswa');
			}
			else{
				$this->session->set_flashdata('berhasil','Data Siswa berhasil di hapus.!!');
				redirect('admin/Siswa');
			}
			
		}
		
	}
}