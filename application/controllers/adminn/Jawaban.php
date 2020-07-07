<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jawaban extends CI_Controller {
function __construct(){
		parent:: __construct();
		$this->load->model('Mdl_admin');
		$this->load->model('Mdl_Cek');
		$this->load->library('session');
		$this->load->helper('cookie');
		$this->load->library('form_validation');
		if($this->session->userdata('hak_akses')!='1')
		{
			redirect('','refresh');
		}
		//$this->load->libraries('session');
	}
	public function index($idsoal=null,$shasoal=null)
	{
		$this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$kunci 				=$this->uri->segment(4);
		$data['judul'] 		="Bank Soal";
		$data['subjudul'] 	="Daftar Soal";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Data Soal";
		$data['user'] 		="";
		$data['level'] 		="";
		//$data['data_topik'] =$this->Mdl_admin->get_data_topik();
		//$data['data_soal']	=$this->Mdl_admin->get_data_soal();
		$data['data_soal']	=$this->Mdl_admin->get_data_soal_limit($kunci);
		$data['data_jawaban']	=$this->Mdl_admin->get_data_jawaban_limit($kunci);
		$this->load->view('adminn/admin_view.php',$data);
	}
	public function Add($shasoal=null)
	{
		$this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$kunci 	=$this->input->post('id_soal',TRUE);
		$kuncisha1=sha1($this->input->post('id_soal',TRUE));
		$this->form_validation->set_rules('id_soal','id_soal','required|trim|htmlspecialchars');
		$this->form_validation->set_rules('jawaban','jawaban','required|htmlspecialchars');
		$this->form_validation->set_rules('status_jawaban','status_jawaban','required|trim|htmlspecialchars');
		if ($this->form_validation->run()== FALSE) {
			$this->session->set_flashdata('gagal','Maaf, Gagal menyimpan jawaban.!');
			redirect('admin/jawaban/index/$kunci/$kuncisha1');
		}
		else{
			$this->Mdl_admin->Save_jawaban();
			$this->session->set_flashdata('berhasil','Data Jawaban berhasil di simpan.!!:)');
			redirect('admin/jawaban/index/'.$kunci.'/'.$kuncisha1,'refresh');
		}
		
	}
	public function Update($idsoal=null,$shaidjawaban=null)
	{
		$this->Mdl_Cek->get_sequrity();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$id_jawaban 				=$this->input->post('array',TRUE);

		// $id_soal 			=sha1($this->uri->segment(4));
		
		if ($shaidjawaban==sha1($id_jawaban)) {
			$this->form_validation->set_rules('array','array','trim|required|htmlspecialchars');
			$this->form_validation->set_rules('jawaban','jawaban','required');
			$this->form_validation->set_rules('status_jawaban','status_jawaban','required|trim|htmlspecialchars');
			if ($this->form_validation->run()== FALSE) {
				$this->session->set_flashdata('gagal','Maaf.! Data Jawaban gagal di perbaharui.!');
				redirect('admin/jawaban/index/'.$idsoal.'/'.sha1($idsoal));
			}
			else{
				$this->Mdl_admin->Update_jawaban($this->uri->segment(4));
				$this->session->set_flashdata('berhasil','Data Jawaban berhasil di perbaharui.');
				redirect('admin/jawaban/index/'.$idsoal.'/'.sha1($idsoal),'refresh');
			}
		}
		else{
			redirect('admin');
		}
	}
	public function Delete()
	{
		$this->Mdl_Cek->get_sequrity();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$shaidjawaban=$this->uri->segment(4);
		$idsoal 	=$this->uri->segment(5);
		$id_jawaban 				=$this->input->post('array',TRUE);
		if ($shaidjawaban==sha1($id_jawaban)) {
			$this->db->trans_start();
			$this->Mdl_admin->Delete_Jawaban($id_jawaban);
			$this->db->trans_complete();
			$this->session->set_flashdata('berhasil','Data Berhasil di Hapus');
			redirect('admin/jawaban/index/'.$idsoal.'/'.sha1($idsoal),'refresh');
		}
		else{
			redirect('admin/','refresh');
		}
	}
}