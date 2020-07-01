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
	public function index($id_topik=null,$id_topik2)
	{
		//$kunci				=$this->uri->segment(4);
		//$data['id_topik'] 	=$kunci;
		$this->Mdl_Cek->get_sequrity();
		if (sha1($id_topik)==$id_topik2) {
			$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();
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
		else{
			redirect('admin/');
		}
		// $this->Mdl_Cek->get_sequrity_guru();
		// $id_pengguna 		=$this->session->userdata('username');
		
	}
	public function Add()
	{
		$this->load->library('form_validation');
		$this->Mdl_Cek->get_sequrity();
		$id_soal=$this->uri->segment(4);
		if ($id_soal== sha1($this->input->post('id_topik'))) {
			// $this->Mdl_Cek->get_sequrity_guru();
			// $id_pengguna 		=$this->session->userdata('username');
			$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();
			$kunci 	=$this->input->post('id_topik',TRUE);
			
			$this->db->trans_start();
			//$this->Mdl_admin->Save_soal();
			$id_topik 		=$this->input->post('id_topik',TRUE);
			$soal 			=$this->input->post('soal',TRUE);
			$this->form_validation->set_rules('id_topik','id_topik','required|htmlspecialchars');
			$this->form_validation->set_rules('soal','soal','required');
			if ($this->form_validation->run()== FALSE) {
				redirect('admin/Topik_soal','refresh');
			}
			else{
				$field=array(
					'soal' 		=>$soal,
					'id_topik' 	=>$id_topik,
				);
				$this->db->insert('tbl_soal',$field);
				// $this->db->query("insert into tbl_soal(soal,id_topik)values('$soal','$id_topik')");
				// $id_soal 	=$this->db->insert_id();
				$this->db->trans_complete();
				if ($this->db->trans_status()===1) {
					$this->session->set_flashdata('berhasil','Data tidak berhasil di simpan.');
					redirect('admin/Soal/index/'.$kunci.'/'.sha1($kunci));
				}
				else{
					$this->session->set_flashdata('berhasil','Data berhasil di simpan.!');
					redirect('admin/Soal/index/'.$kunci.'/'.sha1($kunci));
				}
			}
		}
		else{
			redirect('admin/');
		}
		
	}
	public function Delete()
	{
		$this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		// $id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();
		$id_soal 	=$this->input->post('id_soal', TRUE);
		$id_topik 	=$this->input->post('id_topik', TRUE);
		$id_soal2	=$this->uri->segment(4);
		if (sha1($id_soal)== $id_soal2) {
			$this->db->trans_start();
			$this->db->query("delete from tbl_soal where id_soal='$id_soal'");
			$this->db->trans_complete();
			if ($this->db->trans_status()===1) {
				$this->session->set_flashdata('berhasil','Maaf, soal tersebut tidak bisa di hapus karena masih di pergunakan untuk tes.!!');
				redirect('admin/Soal/index/'.$id_topik);
			}
			else{
				$this->session->set_flashdata('berhasil','Data soal berhasil di hapus.!!');
				redirect('admin/Soal/index/'.$id_topik.'/'.sha1($id_topik));
			}	
		}
		else{
			redirect('admin/');
		}
		
	}
	public function Update($kunci=null,$sha_soal=null)
	{
		$this->load->library('form_validation');
		$this->Mdl_Cek->get_sequrity();		
		// $this->Mdl_Cek->get_sequrity_guru();
		// $id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();
		$id_soal 	=$this->input->post('id_soal', TRUE);
		$sha_soal 	=$this->uri->segment(5);
		if (sha1($id_soal)==$sha_soal) {
			$soal 		=$this->input->post('soal',TRUE);
			$this->form_validation->set_rules('id_soal','id_soal','required|trim');
			$this->form_validation->set_rules('soal','soal','required|htmlspecialchars');
			if ($this->form_validation->run()== FALSE) {
				redirect('admin/Soal/index/'.$kunci);
			}
			else{
				$this->Mdl_admin->Update_soal($id_soal,$soal);
				$this->session->set_flashdata('berhasil','Data soal berhasil di perbaharui.!!');
				redirect('admin/Soal/index/'.$kunci.'/'.sha1($kunci));
			}
		}
		else{
			redirect('admin');
		}
		
		
	}
	public function Delete_soal_daftar()
	{
		$this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		// $id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();
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
		// $this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();
		$idsoal=$this->input->post('array',TRUE);
		$shaidsoal=$this->uri->segment(4);
		$idtopik =$this->uri->segment(5);
		if (sha1($idsoal)==$shaidsoal) {
			$this->form_validation->set_rules('array','array','required|htmlspecialchars');
			$this->form_validation->set_rules('soal','soal','required');
			if ($this->form_validation->run()== FALSE) {
				$this->session->set_flashdata('gagal','Maaf, Perubahan data tidak bisa dilakukan.!');
				redirect('admin/Lihat_soal/index/'.$idtopik.'/'.sha1($idtopik));
			}
			else{
				$this->Mdl_admin->Update_list_soal();
				$this->session->set_flashdata('berhasil','Data soal berhasil diperbaharui.!');
				redirect('admin/Lihat_soal/index/'.$idtopik.'/'.sha1($idtopik));
			}
		}else{
			redirect('admin','refresh');
		}
		
	}
	public function Delete_list()
	{
		$this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();
		$idsoal 	=$this->input->post('array',TRUE);
		$shaidsoal	=$this->uri->segment(4);
		$idtopik 	=$this->uri->segment(5);
		if (sha1($idsoal)==$shaidsoal) {
			$this->form_validation->set_rules('array','array','required|htmlspecialchars');
			if ($this->form_validation->run()== FALSE) {
				redirect('admin','refresh');
			}
			else{
				$this->db->trans_start();
				$this->db->where('id_soal',$idsoal);
				$this->db->delete('tbl_soal');
				$this->db->trans_complete();
				if ($this->db->trans_status()===1) {
					$this->session->set_flashdata('gagal','Maaf, Data soal tersebut tidak bisa di hapus.!!!');
					redirect('admin/Lihat_soal/index/'.$idtopik.'/'.sha1($idtopik),'refresh');
				}
				else{
					$this->session->set_flashdata('berhasil','Data Soal berhasil di hapus.!!!');
					redirect('admin/Lihat_soal/index/'.$idtopik.'/'.sha1($idtopik),'refresh');
				} 	
			}
		}
		else{
			redirect('admin','refresh');
		}
	}
}