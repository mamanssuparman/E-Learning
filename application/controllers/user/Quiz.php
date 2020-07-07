<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {
	function __construct(){
		parent:: __construct();
		if (!$this->session->userdata('id_siswa')) {
			redirect('','refresh');
		}
		$this->load->model('mod_quiz','mq');
	}
	public function index()
	{
		$data = array(
			'siswa' => $this->mc->ambil('tbl_user',['id_user' => $this->session->userdata('id_siswa')])->row_array(),
			'kelas' => $this->mc->ambil('tbl_kelas',['id_kelas' => $this->session->userdata('kelas')])->row_array(),
			'title' => 'Diskusi'
		);
		$this->elearning->user('user/quiz',$data);
	}
	function ajax_list()
	{
		$list 	= $this->mq->get_datatables();
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list as $x) {
			$no++;
			$row 	= array();
			$row[]	= $no;
			$row[]	= $x->tes_nama;
			$row[]	= $x->tes_jumlah_soal;
			$waktu = explode(' ', $x->tes_selesai);
			$waktum = explode(' ', $x->tes_mulai);
			$row[]	= date_indo($waktum[0])." ".$waktum[1];
			$row[]	= date_indo($waktu[0])." ".$waktu[1];
			$row[]	= $x->tes_detail;
			$row[]	= $this->btn($x);
			$data[]	= $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->mq->count_all(),
			"recordsFiltered" => $this->mq->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}
	private function btn($x)
	{
		$tes = $this->mc->ambil('tbl_tes_user',['id_tes' => $x->id_tes])->row_array();
		if (date('Y-m-d H:i:s') < $x->tes_mulai) {
			$btn = '<button type="button" class="btn btn-danger">Belum Mulai</button>';
		}elseif (date('Y-m-d H:i:s') > $x->tes_selesai) {
			$btn = '<button type="button" class="btn btn-danger">Soal Expired</button>';
		}else{
			if (empty($tes)) {
				$btn = '<button type="button" class="btn btn-primary" data-id="'.$x->id_tes.'" data-toggle="modal" data-target="#soal">Kerjakan</button>';
			}elseif ($tes['tes_user_status'] == 1) {
				$btn = '<a href="'.base_url('quiz/soal').'" class="btn btn-primary" data-id="'.$x->id_tes.'">Lanjut Mengerjakan</button>';
			}elseif ($tes['tes_user_status'] == 3) {
				$btn = '<a href="#" class="btn btn-danger" data-id="'.$x->id_tes.'">Hentikan</button>';
			}else{
				$btn = '<button type="button" class="btn btn-primary" data-id="'.$x->id_tes.'">Selesai</button>';
			}
		}
		return $btn;
	}
	function infoSoal()
	{
		$id = $this->input->post('rowid');
		$q = $this->mc->ambil('tbl_tes',['id_tes' => $id])->row_array();
		echo json_encode(array('data'=>$q));
	}
	function soal($id,$order)
	{
		$id = base64_decode($id);
		$data = array(
			'siswa' => $this->mc->ambil('tbl_user',['id_user' => $this->session->userdata('id_siswa')])->row_array(),
			'kelas' => $this->mc->ambil('tbl_kelas',['id_kelas' => $this->session->userdata('kelas')])->row_array(),
			's'		=> $this->mq->ambilS($id)->row_array(),
			'title' => 'Soal',
			'soal'	=> $this->mq->ambilSK($id,$order)->row_array(),
			'jawaban'	=> $this->mq->ambilJK($id,$order)->result(),
			'ambilOrder' => $this->mq->ambilJOin($id)->result(),
		);
		$this->elearning->user('user/soal',$data);
	}
	function mulai()
	{
		$data = array(
			'id_tes' => $this->input->post('id_tes'),
			'id_user'=> $this->session->userdata('id_siswa'),
			'tes_user_status'=> 1,
			'tes_user_waktu' => date('Y-m-d H:i:s')
		);
		$q = $this->mc->simpan('tbl_tes_user',$data);
		if ($q['status'] == 'berhasil') {
			$ambil = $this->mc->ambil('tbl_tes',['id_tes' => $this->input->post('id_tes')])->row_array();
			$soal = $this->mq->ambilAcak('tbl_soal',['id_topik' => $ambil['id_topik']],$ambil['tes_jumlah_soal'])->result();
			$no = 1;
			foreach ($soal as $x) {
				$dataS[] = array(
					'id_user' => $this->session->userdata('id_siswa'),
					'id_soal' => $x->id_soal,
					'id_tes_user' => $q['id'],
					'point' => 0,
					'tes_order' => $no++,
				);
			}
			$simpanSoal = $this->mc->simpanArray('tbl_tes_soal',$dataS);
			if ($simpanSoal['status'] == 'berhasil') {
				$ambilSoal = $this->mc->ambil('tbl_tes_soal',['id_tes_user' => $q['id']])->result();
				$datab = array();
				foreach ($ambilSoal as $x) {
					$ids[] = $x->id_soal;
					$ambilJawaban = $this->mq->ambilJawaban('tbl_jawaban',$ids)->result();
				} 
				foreach ($ambilJawaban as $aj) {
					$dataJ[] = array(
						'id_tes_soal' 	=> $aj->id_tes_soal,
						'id_jawaban' 	=> $aj->id_jawaban,
						'tes_jawaban_pilih' => 0,
 					);
				}
				$simpanJawaban = $this->mc->simpanArray('tbl_tes_jawaban',$dataJ);
				if ($simpanJawaban['status'] == 'berhasil') {
					redirect('quiz/soal/'.base64_encode($q['id']).'/1','refresh');
				}else{
					$this->mc->hapus('tbl_tes_user',['id_tes_user' => $q['id']]);
					$this->mc->hapus('tbl_tes_soal',['id_tes_jawaban' => $simpanSoal['id']]);
					$this->session->set_flashdata('eror', 'gagal mengerjakan');
					redirect('quiz','refresh');
				}
			}else{
				$this->mc->hapus('tbl_tes_user',['id_tes_user' => $q['id']]);
				$this->session->set_flashdata('eror', 'gagal mengerjakan');
				redirect('quiz','refresh');
			}

		}else{
			$this->session->set_flashdata('eror', 'gagal mengerjakan');
			redirect('quiz','refresh');
		}

	}
	function ubahJawaban()
	{
		$ts = $this->input->post('id_tes_soal');
		$ij = $this->input->post('id_jawaban');

		$q = $this->mc->ubah('tbl_tes_jawaban',['tes_jawaban_pilih' => 0],['id_tes_soal' => $ts]);
		if ($q['status'] == 'berhasil') {
			$q = $this->mc->ubah('tbl_tes_jawaban',['tes_jawaban_pilih' => 1],['id_jawaban' => $ij]);
			if ($q['status'] = 'berhasil') {
				echo json_encode(array('data' => 'berhasil'));
			}else{
				echo json_encode(array('data' => 'error'));				
			}
		}else{
			echo json_encode(array('data' => 'error'));
		}

	}
}