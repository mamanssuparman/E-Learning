<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal extends CI_Controller {
	
function __construct(){
		parent:: __construct();
		$this->load->model('Mdl_admin');
		$this->load->model('Mdl_Cek');
		$this->load->library('session');
		$this->load->helper('cookie');

		//$this->load->libraries('session');
	}
	public function index($id_topik=null)
	{
		//$kunci				=$this->uri->segment(4);
		//$data['id_topik'] 	=$kunci;
		$this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$data['judul'] 		="Bank Soal";
		$data['subjudul'] 	="Topik Soal";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Bank Soal";
		$data['user'] 		="";
		$data['level'] 		="";
		$data['data_topik'] =$this->Mdl_admin->get_data_nama_topik($id_topik);
		//$data['data_soal_topik'] =$this->Mdl_admin->get_data_soal_topik($this->uri->segment(4));
		$data['data_soal_topik'] 	=$this->Mdl_admin->get_data_soal_topik_limit($id_topik);
		$this->load->view('adminn/admin_view.php',$data);
	}
	public function Add()
	{
		$this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$kunci 	=$this->input->post('id_topik',TRUE);
		$this->db->trans_start();
		//$this->Mdl_admin->Save_soal();
		$id_topik 		=$this->input->post('id_topik',TRUE);
		$soal 			=$this->input->post('soal',TRUE);
		$this->db->query("insert into tbl_soal(soal,id_topik)values('$soal','$id_topik')");
		$id_soal 	=$this->db->insert_id();
		$this->db->trans_complete();
		if ($this->db->trans_status()===1) {
			$this->session->set_flashdata('berhasil','Data tidak berhasil di simpan.');
			redirect('adminn/Soal/index/'.$kunci);
		}
		else{
			$this->session->set_flashdata('berhasil','Data berhasil di simpan.!');
			redirect('adminn/Soal/index/'.$kunci);
		}
	}
	public function Delete()
	{
		$this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$id_soal 	=$this->input->post('id_soal', TRUE);
		$id_topik 	=$this->input->post('id_topik', TRUE);
		$this->db->trans_start();
		$this->db->query("delete from tbl_soal where id_soal='$id_soal'");
		$this->db->trans_complete();
		if ($this->db->trans_status()===1) {
			$this->session->set_flashdata('berhasil','Maaf, soal tersebut tidak bisa di hapus karena masih di pergunakan untuk tes.!!');
			redirect('adminn/Soal/index/'.$id_topik);
		}
		else{
			$this->session->set_flashdata('berhasil','Data soal berhasil di hapus.!!');
			redirect('adminn/Soal/index/'.$id_topik);
		}
	}
	public function Update()
	{
		$this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$id_soal 	=$this->input->post('id_soal', TRUE);
		$this->Mdl_admin->Update_soal($id_soal);
		$this->session->set_flashdata('berhasil','Data soal berhasil di perbaharui.!!');
		redirect('adminn/Daftar_soal/');
	}
	public function Delete_soal_daftar()
	{
		$this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$id_soal	=$this->input->post('id_soal', TRUE);
		$this->db->trans_start();
		$this->db->query("delete from tbl_soal where id_soal='$id_soal'");
		$this->db->trans_complete();
		if ($this->db->trans_status()===1) {
			$this->session->set_flashdata('berhasil','Maaf, Data soal tidak bisa di hapus, karena masih dipergunakan tes.!');
			redirect('adminn/Daftar_soal/');
		}
		else{
			$this->session->set_flashdata('berhasil','Data soal berhasil di hapus.!!');
			redirect('adminn/Daftar_soal/');
		}
	}
	public function Update_list()
	{
		$this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$id_topik 	=$this->input->post('id_topik', TRUE);
		$id_soal 	=$this->input->post('id_soal', TRUE);
		$this->Mdl_admin->Update_soal($id_soal);
		$this->session->set_flashdata('berhasil','Data soal berhasil di perbaharui.!!');
		redirect('adminn/Lihat_soal/index/'.$id_topik,'refresh');
	}
	public function Delete_list()
	{
		$this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$id_topik 	=$this->input->post('id_topik',TRUE);
		$id_soal 	=$this->input->post('id_soal', TRUE);
		$this->db->trans_start();
		$this->db->query("delete from tbl_soal where id_soal='$id_soal'");
		$this->db->trans_complete();
		if ($this->db->trans_status()===1) {
			$this->session->set_flashdata('berhasil','Maaf, Data soal tersebut tidak bisa di hapus.!!!');
			redirect('adminn/Lihat_soal/index/'.$id_topik,'refresh');
		}
		else{
			$this->session->set_flashdata('berhasil','Data Soal berhasil di hapus.!!!');
			redirect('adminn/Lihat_soal/index/'.$id_topik,'refresh');
		} 	
	}
}