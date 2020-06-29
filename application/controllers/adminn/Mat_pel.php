<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mat_pel extends CI_Controller {
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
		//$kunci				=$this->uri->segment(4);
		$this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		// $id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();
		$data['judul'] 		="Materi";
		$data['subjudul'] 	="Materi Pelajaran";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="MatPel [Materi Pelajaran]";
		$data['user'] 		="";
		$data['level'] 		="";
		$data['data_mat_pel'] =$this->Mdl_admin->get_data_mat_pel();
		$data['data_kelas'] =$this->Mdl_admin->get_data_kelas();
		//$data['data_mat_pel_terpilih'] 	=$this->Mdl_admin->get_data_mat_pel_terpilih();
		//$data['data_soal_topik'] 	=$this->Mdl_admin->get_data_soal_topik_limit($this->uri->segment(4));
		$this->load->view('adminn/admin_view.php',$data);
		
	}
	public function edit($id_mapel=null)
	{
		$this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		// $id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();
		$data['judul'] 		="Materi";
		$data['subjudul'] 	="Materi Pelajaran";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="MatPel [Materi Pelajaran]";
		$data['user'] 		="";
		$data['level'] 		="";
		$data['data_mat_pel'] =$this->Mdl_admin->get_data_mat_pel_search($id_mapel);
		$data['data_kelas'] =$this->Mdl_admin->get_data_kelas();
		$data['data_mat_pel_terpilih'] 	=$this->Mdl_admin->get_data_mat_pel_terpilih($id_mapel)->result();
		foreach ($data['data_mat_pel_terpilih'] as $tampilpilihan) {
			$nilai[]=(float) $tampilpilihan->id_kelas;
		}
		$data['tampil_pilihan'] =json_encode($nilai);
		//$data['tampung'] =
		//$data['data_soal_topik'] 	=$this->Mdl_admin->get_data_soal_topik_limit($this->uri->segment(4));
		$this->load->view('adminn/admin_view.php',$data);
	}
	public function Add()
	{
		$this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		// $id_pengguna 				=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();
		$this->form_validation->set_rules('nama_mapel','nama_mapel','required|is_unique[tbl_mapel.nama_mapel]|htmlspecialchars');
		$this->form_validation->set_rules('deskripsi','deskripsi','required|htmlspecialchars');
		if ($this->form_validation->run()== FALSE) {
			$this->session->set_flashdata('gagal','Data Materi Pelajaran gagal di simpan, Cek kembali data Inputan.!!');
			redirect('admin/Mat_pel');
		}
		else{
			$this->Mdl_admin->Add_Mat_pel();
			$this->session->set_flashdata('berhasil','Data Mata Pelajaran Berhasi di simpan.!!');
			redirect('admin/Mat_pel');
		}
		
	}
	public function Update()
	{
		$this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		// $id_pengguna 		=$this->session->userdata('username');
		//$id_mapel 			
		
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();
		$id_mapel 		=$this->input->post('id_mapel', TRUE);
		$this->form_validation->set_rules('nama_mapel','nama_mapel','required|htmlspecialchars');
		$this->form_validation->set_rules('deskripsi','deskripsi','required|htmlspecialchars');
		// $this->form_validation->set_rules('');
		//$id_kelas 		=$this->input->post('id_kelasnya', TRUE);
		if ($this->form_validation->run()== FALSE) {
			$this->session->set_flashdata('gagal','Data Materi Pelajaran Gagal di perbaharui. Cek Kembali data Inputan.!!');
			redirect('admin/Mat_pel');
		}
		else{
			$this->Mdl_admin->Update_mat_pel($id_mapel);
			$this->Mdl_admin->Update_mat_pel1();
			$this->session->set_flashdata('berhasil','Data Mata Pelajaran Berhasil di perbaharui.!!');
			redirect('admin/Mat_pel');	
		}
		
	}
	public function Delete()
	{
		$this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		// $id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();
		$this->form_validation->set_rules('id_mapel','id_mapel','required');
		if ($this->form_validation->run()== FALSE) {
			$this->session->set_flashdata('gagal','Maaf, Data Mapel gagal di hapus.!');
			redirect('admin/Mat_pel');
		}		
		else{
			$id_mapel 	=$this->input->post('id_mapel', TRUE);
			$this->db->trans_start();
			$this->db->delete('tbl_mapel',array('id_mapel'=>$id_mapel));
			
			$this->db->trans_complete();
			if ($this->db->trans_status()===1) {
				$this->session->set_flashdata('berhasil','Data MAPEL tidak bisa di hapus, karena masih dipergunakan tes.!!');
				redirect('admin/Mat_pel');
			}
			else{
				$this->session->set_flashdata('berhasil','Data MAPEL berhasil di hapus.!!');
				redirect('admin/Mat_pel');
			}
		}
		
	}
	public function ambil_terpilih($id_mapel)
	{
		$this->Mdl_admin->get_data_mat_pel_terpilih($id_mapel);
	}
}