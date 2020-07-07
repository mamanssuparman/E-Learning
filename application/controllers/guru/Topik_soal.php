<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topik_soal extends CI_Controller {
function __construct(){
		parent:: __construct();
		$this->load->model('Mdl_admin');
		$this->load->model('Mdl_guru');
		$this->load->model('Mdl_Cek');
		$this->load->library('session');
		$this->load->helper('cookie');
		$this->load->library('form_validation');
		if($this->session->userdata('hak_akses')!='2')
		{
			redirect('','refresh');
		}
		//$this->load->libraries('session');
	}
	public function index()
	{
		$this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		$this->Mdl_Cek->get_sequrity_akses_guru();
		// $id_pengguna 		=$this->session->userdata('username');
		$idguru 		=$this->session->userdata('id_guru');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();

		$data['judul'] 		="Bank Soal";
		$data['subjudul'] 	="Topik Soal";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Bank SOal";
		$data['user'] 		="";
		$data['level'] 		="";
		$data['cek']		=$idguru;
		$data['nama_mapel_guru']=$this->Mdl_guru->get_data_mapelguru($idguru);
		$data['data_topik'] =$this->Mdl_admin->get_data_topik();
		// $data['data_mat_pel'] =$this->Mdl_guru->get_data_mat_pel($idguru);
		// $data['data_tapel'] =$this->Mdl_admin->get_data_tapel();
		$this->load->view('guru/guru_view.php',$data);
	}
	
	public function Add()
	{
		$this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		$this->Mdl_Cek->get_sequrity_akses_guru();
		// $id_pengguna 		=$this->session->userdata('username');
		$idguru 		=$this->session->userdata('id_guru');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();

		$data['judul'] 		="Bank Soal";
		$data['subjudul'] 	="Topik Soal";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Bank SOal";
		$data['user'] 		="";
		$data['level'] 		="";
		$data['cek']		=$idguru;
		$this->form_validation->set_rules('nama_mapel','nama_mapel','required|htmlspecialchars');
		$this->form_validation->set_rules('nama_topik','nama_topik','required|htmlspecialchars');
		$this->form_validation->set_rules('deskripsi','deskripsi','required|htmlspecialchars');
		if ($this->form_validation->run()== FALSE) {
			$this->session->set_flashdata('gagal','Silahkan isi data topik sesuai dengan ketentuan.!');
			redirect('guru/Topik_soal','refresh');
		}
		else{
			$this->Mdl_guru->insert_topik();
			$this->session->set_flashdata('berhasil','Data Topik berhasil di simpan');
			redirect('guru/Topik_soal','refresh');	
		}
	}
	public function Soal($idtopik=null,$sha1idtopik=null)
	{
		$this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		$this->Mdl_Cek->get_sequrity_akses_guru();
		// $id_pengguna 		=$this->session->userdata('username');
		$idguru 		=$this->session->userdata('id_guru');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();

		$data['judul'] 		="Bank Soal";
		$data['subjudul'] 	="Topik Soal";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Bank SOal";
		$data['user'] 		="";
		$data['level'] 		="";
		$data['cek']		=$idguru;
		$data['data_soal']	=$this->Mdl_guru->daftar_soal_guru($idtopik);
		$this->load->view('guru/guru_view',$data);
	}
	public function Add_soal($sha1idtopik=null)
	{
		$this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		$this->Mdl_Cek->get_sequrity_akses_guru();
		// $id_pengguna 		=$this->session->userdata('username');
		$idguru 		=$this->session->userdata('id_guru');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();

		$data['judul'] 		="Bank Soal";
		$data['subjudul'] 	="Topik Soal";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Bank SOal";
		$data['user'] 		="";
		$data['level'] 		="";
		$data['cek']		=$idguru;
		$id_topik=$this->input->post('array',TRUE);
		if ($sha1idtopik==sha1($id_topik)) {
			$this->form_validation->set_rules('array','array','required|htmlspecialchars');
			$this->form_validation->set_rules('soal','soal','required');
			if ($this->form_validation->run()== FALSE) {
				$this->session->set_flashdata('gagal','Isikan data sesuai ketentuan.!');
				redirect('guru/Topik_soal/Soal/'.$id_topik.'/'.$sha1idtopik,'refresh');
			}
			else{
				$this->Mdl_guru->Add_soal();
				$this->session->set_flashdata('berhasil','Data soal berhasil di simpan');
				redirect('guru/Topik_soal/Soal/'.$id_topik.'/'.$sha1idtopik,'refresh');
			
			}
		}
	}
	public function Jawaban($idsoal=null,$shaidsoal=null)
	{
		$this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		$this->Mdl_Cek->get_sequrity_akses_guru();
		// $id_pengguna 		=$this->session->userdata('username');
		$idguru 		=$this->session->userdata('id_guru');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();

		$data['judul'] 		="Bank Soal";
		$data['subjudul'] 	="Topik Soal";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Bank SOal";
		$data['user'] 		="";
		$data['level'] 		="";
		$data['cek']		=$idguru;
		// $idsoal =$this->uri->segment(4);
		$data['data_soal']	=$this->Mdl_guru->get_soal_limit($idsoal);
		$data['data_jawaban']=$this->Mdl_guru->get_jawaban_limit($idsoal);
		// $id_topik=$this->input->post('array',TRUE);
		$this->load->view('guru/guru_view',$data);
	}
	public function Add_jawaban($id)
	{
		$this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		$this->Mdl_Cek->get_sequrity_akses_guru();
		// $id_pengguna 		=$this->session->userdata('username');
		$idguru 		=$this->session->userdata('id_guru');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();

		$data['judul'] 		="Bank Soal";
		$data['subjudul'] 	="Topik Soal";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Bank SOal";
		$data['user'] 		="";
		$data['level'] 		="";
		$data['cek']		=$idguru;
		$idsoal=$this->input->post('arraysoal',TRUE);
		$idtopik =$this->input->post('arraytopik',TRUE);
		$this->form_validation->set_rules('arraysoal','arraysoal','required|htmlspecialchars');
		$this->form_validation->set_rules('arraytopik','arraytopik','required|htmlspecialchars');
		$this->form_validation->set_rules('jawaban','jawaban','required');
		$this->form_validation->set_rules('status_jawaban','status_jawaban','required|htmlspecialchars');
		if ($this->form_validation->run()== FALSE) {
			$this->session->set_flashdata('gagal','Isikan data sesuai dengan ketentuan.!!');
			redirect('guru/Topik_soal/Jawaban/'.$idsoal.'/'.sha1($idsoal).'/'.$idtopik,'refresh');
		}
		else{
			$this->Mdl_guru->insert_jawaban($idsoal,$idtopik);
			$this->session->set_flashdata('berhasil','Data jawaban berhasil di simpan.');
			redirect('guru/Topik_soal/Jawaban/'.$idsoal.'/'.sha1($idsoal).'/'.$idtopik,'refresh');
		}
	}
	public function Update_soal($sha1idsoal=null)
	{
		$this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		$this->Mdl_Cek->get_sequrity_akses_guru();
		// $id_pengguna 		=$this->session->userdata('username');
		$idguru 		=$this->session->userdata('id_guru');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();

		$data['judul'] 		="Bank Soal";
		$data['subjudul'] 	="Topik Soal";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Bank SOal";
		$data['user'] 		="";
		$data['level'] 		="";
		$data['cek']		=$idguru;
		$idsoal=$this->input->post('arraysoal',TRUE);
		$idtopik =$this->input->post('arraytopik',TRUE);
		if ($sha1idsoal==sha1($idsoal)) {
			$this->form_validation->set_rules('arraysoal','arraysoal','required|htmlspecialchars');
			$this->form_validation->set_rules('arraytopik','arraytopik','required|htmlspecialchars');
			$this->form_validation->set_rules('soal','soal','required');
			if ($this->form_validation->run()==FALSE) {
				$this->session->set_flashdata('gagal','Maaf, isikan data sesuai aturan.!');
				// redirect('guru/Topik_soal/Soal/'.$idtopik.'/'.sha1($idtopik),'refresh');
			}
			else{
				$this->Mdl_guru->Update_soal($idsoal,$idtopik);
				$this->session->set_flashdata('berhasil','Update data soal berhasil.!');
				redirect('guru/Topik_soal/Soal/'.$idtopik.'/'.sha1($idtopik),'refresh');
			}
		}
	}
	public function Update_jawaban($sha1idjawaban=null)
	{
		$this->Mdl_Cek->get_sequrity();
		// $this->Mdl_Cek->get_sequrity_guru();
		$this->Mdl_Cek->get_sequrity_akses_guru();
		// $id_pengguna 		=$this->session->userdata('username');
		$idguru 		=$this->session->userdata('id_guru');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna();

		$data['judul'] 		="Bank Soal";
		$data['subjudul'] 	="Topik Soal";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Bank SOal";
		$data['user'] 		="";
		$data['level'] 		="";
		$data['cek']		=$idguru;
		$idsoal=$this->input->post('arraysoal',TRUE);
		$idtopik =$this->input->post('arraytopik',TRUE);
		$idjawaban =$this->input->post('arrayjawaban',TRUE);
		if (sha1($idjawaban)==$sha1idjawaban) {
			$this->form_validation->set_rules('arraysoal','arraysoal','required|htmlspecialchars');
			$this->form_validation->set_rules('arraytopik','arraytopik','required|htmlspecialchars');
			$this->form_validation->set_rules('arrayjawaban','arrayjawaban','required|htmlspecialchars');
			$this->form_validation->set_rules('jawaban','jawaban','required');
			$this->form_validation->set_rules('status_jawaban','status_jawaban','required|htmlspecialchars');
			if ($this->form_validation->run()== FALSE) {
				$this->session->set_flashdata('gagal','Maaf, Isikan data sesuai dengan ketentuan.!!');
				redirect('guru/Topik_soal/Jawaban/'.$idsoal.'/'.$sha1idjawaban.'/'.'$idtopik','refresh');
			}
			else{
				$this->Mdl_guru->Update_jawaban($idjawaban);
				$this->session->set_flashdata('berhasil','Update Data jawaban berhasil.!!');
				redirect('guru/Topik_soal/Jawaban/'.$idsoal.'/'.$sha1idjawaban.'/'.$idtopik,'refresh');
			}
		}
		else{
			$this->session->set_flashdata('gagal','Maaf, Isi data sesuai dengan ketentuan.!!');
			redirect('guru/Topik_soal/Jawaban/'.$idsoal.'/'.$sha1idjawaban.'/'.$idtopik,'refresh');
		}
	}
}