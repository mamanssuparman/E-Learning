<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {
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
        $id_pengguna 		=$this->session->userdata('username');
        $idguru 		    =$this->session->userdata('id_guru');
        $data['cek']		=$idguru;
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$data['judul'] 		="Quiz";
		$data['subjudul'] 	="Add Quiz";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Quiz/ Ulangan";
		$data['user'] 		="";
		$data['level'] 		="";
		$data['data_kelas'] =$this->Mdl_guru->get_data_kelas($idguru);
		$data['data_topik']	=$this->Mdl_admin->get_data_topik();
		$this->load->view('guru/guru_view',$data);
	}
	public function Add()
    {
        $this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$this->form_validation->set_rules('tes_nama','tes_nama','required|htmlspecialchars');
		$this->form_validation->set_rules('tes_detail','tes_detail','required|htmlspecialchars');
		$this->form_validation->set_rules('tes_score_benar','tes_score_benar','required');
		$this->form_validation->set_rules('durasi_waktu','durasi_waktu','required');
		$this->form_validation->set_rules('tes_jumlah_soal','tes_jumlah_soal','required');
		if ($this->form_validation->run()== FALSE) {
			$this->session->set_flashdata('gagal','Maaf, data quiz gagal di simpan.!');
			redirect('guru/Quiz');
		}
		else{
			$this->Mdl_admin->Add_tes();
			$this->session->set_flashdata('berhasil','Data Tes berhasil di simpan.!!');
			redirect('guru/Quiz');
		}
    }
    public function Edit()
    {
        $this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$data['judul'] 		="Quiz";
		$data['subjudul'] 	="Edit Quiz";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Quiz/ Ulangan";
		$data['user'] 		="";
        $data['level'] 		="";
        $idguru 		    =$this->session->userdata('id_guru');
        $data['cek']		=$idguru;
		$id_quiz=$this->uri->segment(4);
		$shaidquiz =$this->uri->segment(5);
		if (sha1($id_quiz)==$shaidquiz) {
			$data['data_quiz'] 	=$this->Mdl_admin->get_data_quiz_edit($id_quiz);
			//untuk data kelas terpilih
			$data['data_kelas_pilih']=$this->Mdl_admin->get_data_quiz_kelas($id_quiz)->result();
			foreach ($data['data_kelas_pilih'] as $tampilkelaspilih) {
				$nilaikelas[]=(float) $tampilkelaspilih->id_kelas;
			}
			$data['tampil_pilih_kelas'] = json_encode($nilaikelas);
			//untuk data topik terpilih
			$data['data_kelas'] =$this->Mdl_admin->get_data_kelas();
			$data['data_topik']	=$this->Mdl_admin->get_data_topik();
			$this->load->view('guru/guru_view.php',$data);	
		}
		else{
			redirect('guru');
		}
	}
	public function Update($ke1=null,$ke2=null)
	{
		$this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$id_quiz=$this->input->post('id_tes',TRUE);
		$idtes=$this->uri->segment(5);
		$shaidtes =$this->uri->segment(4);
		if (sha1($idtes)==$shaidtes) {
			$this->form_validation->set_rules('tes_nama','tes_nama','required');
			// $this->form_validation->set_rules('tes_detail','tes_detail','required|htmlspecialchars');
			// $this->form_validation->set_rules('rentangwaktu','rentangwaktu','required');
			// $this->form_validation->set_rules('tes_score_benar','tes_score_benar','required');
			// $this->form_validation->set_rules('durasi_waktu','durasi_waktu','required');
			// $this->form_validation->set_rules('tes_jumlah_soal','tes_jumlah_soal','required');
			// $this->form_validation->set_rules('tes_acak_soal','tes_acak_soal','required');
			if ($this->form_validation->run()== FALSE) {
				$this->session->set_flashdata('gagal','Maaf, update data quiz gagal dilakukan');
				redirect('guru/Quiz/Perbaharui/'.$idtes.'/'.$shaidtes,'refresh');
			}
			else{
				$this->Mdl_admin->update_tes();
				// $this->Mdl_admin->Delete_tbl_tes_group_kelas();
				$this->session->set_flashdata('berhasil','Update Data Tes Berhasil');
				redirect('guru/Quiz/Perbaharui/'.$idtes.'/'.$shaidtes,'refresh');
			}
		}
		else{
			echo "gagal";
		}
		
	}
}