<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun_pelajaran extends CI_Controller {
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
		$data['subjudul'] 	="Tahun Pelajaran";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Tahun Pelajaran";
		$data['user'] 		="";
		$data['level'] 		="";
		$data['data_tapel'] =$this->Mdl_admin->get_data_tapel();
		$this->load->view('adminn/admin_view.php',$data);
	}
	public function Add()
	{
		// $this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$this->form_validation->set_rules('nama_tapel','nama_tapel','required|is_unique[tbl_tapel.nama_tapel]|htmlspecialchars');
		if ($this->form_validation->run()== FALSE) {
			$this->session->set_flashdata('gagal','Data tahun pelajaran tidak boleh sama.!');
			redirect('admin/Tahun_pelajaran');
		}
		else{
			$this->Mdl_admin->save_tapel();
			$this->session->set_flashdata('berhasil','Data Tahun Pelajaran Berhasil Di Simpan');
			redirect('admin/Tahun_pelajaran');
		}
		
	}
	public function Delete()
	{
		// $this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$id_tapel 	=$this->input->post('id_tapel', TRUE);
		$this->db->trans_start();
		$this->Mdl_admin->Delete_tapel($id_tapel);
		$this->db->trans_complete();
		if ($this->db->trans_status()===1) {
			$this->session->set_flashdata('gagal','Data Tahun Pelajaran tidak bisa di hapus.!!');
			redirect('admin/Tahun_pelajaran');
		}
		else{
			$this->session->set_flashdata('berhasil','Data Tahun Pelajaran berhasil di hapus.!');
			redirect('admin/Tahun_pelajaran');	
		}
	}
}