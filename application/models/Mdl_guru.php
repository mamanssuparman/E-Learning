<?php

use phpDocumentor\Reflection\Types\This;

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_guru extends CI_Model {

	public function get_data_kelas($idguru)
	{
        // $idguru=$this->session->userdata('id_guru');
		$get = $this->db->query('SELECT tbl_mapel_kelas_guru_group.*, tbl_kelas.nama_kelas ,count(tbl_user.nama_siswa) as jml_siswa, tbl_user.nama_siswa from tbl_mapel_kelas_guru_group left OUTER JOIN tbl_kelas on tbl_mapel_kelas_guru_group.id_kelas=tbl_kelas.id_kelas join tbl_user on tbl_mapel_kelas_guru_group.id_kelas=tbl_user.id_kelas where tbl_mapel_kelas_guru_group.id_guru='.$idguru.' GROUP BY tbl_user.id_kelas');
		return $get;
	}
	public function get_data_kelas_siswa($id_kelas)
	{
		$this->db->where('id_kelas',$id_kelas);
		return $this->db->get('tbl_user');
	}
	public function get_data_mat_pel($id_guru)
	{
		return $this->db->query("SELECT tbl_mapel_kelas_guru_group.id_group, tbl_mapel.id_mapel, tbl_mapel.nama_mapel, tbl_mapel.deskripsi, tbl_kelas.id_kelas, tbl_kelas.nama_kelas from tbl_mapel_kelas_guru_group JOIN tbl_mapel on tbl_mapel.id_mapel=tbl_mapel_kelas_guru_group.id_mapel join tbl_kelas on tbl_mapel_kelas_guru_group.id_kelas=tbl_kelas.id_kelas where tbl_mapel_kelas_guru_group.id_guru='$id_guru'");
	}
	public function get_data_materi($idmapel,$idguru)
	{
		return $this->db->query('SELECT tbl_mapel_kelas_guru_group.*, tbl_mapel.nama_mapel, tbl_materi.judul_materi, tbl_materi.detail_materi, tbl_guru.nama from tbl_mapel_kelas_guru_group JOIN tbl_mapel on tbl_mapel_kelas_guru_group.id_mapel=tbl_mapel.id_mapel join tbl_materi on tbl_mapel.id_mapel=tbl_materi.id_mapel join tbl_guru on tbl_guru.id_guru=tbl_mapel_kelas_guru_group.id_guru WHERE tbl_mapel_kelas_guru_group.id_guru='.$idguru.' AND tbl_mapel_kelas_guru_group.id_mapel='.$idmapel.' GROUP BY tbl_mapel_kelas_guru_group.id_mapel');
	}
	public function get_data_mapelguru($idguru)
	{
		return $this->db->query('select tbl_mapel_kelas_guru_group.*, tbl_mapel.nama_mapel, tbl_mapel.deskripsi from tbl_mapel_kelas_guru_group join tbl_mapel on tbl_mapel_kelas_guru_group.id_mapel=tbl_mapel.id_mapel where tbl_mapel_kelas_guru_group.id_guru='.$idguru.' GROUP BY tbl_mapel_kelas_guru_group.id_mapel');
	}
	public function insert_topik()
	{
		$data=array(
			'topik_nama' 	=>$this->input->post('nama_topik',TRUE),
			'topik_detail'	=>$this->input->post('deskripsi',TRUE),
		);
		$this->db->insert('tbl_topik',$data);
	}
	public function get_data_topik()
	{
		$this->db->order_by('id_topik','DESC');
		return $this->db->get('tbl_topik');
	}
	public function daftar_soal_guru($idtopik)
	{
		return $this->db->query('SELECT tbl_soal.id_soal,tbl_soal.soal,tbl_soal.soal_audio, COUNT(tbl_jawaban.id_soal) as jumlah_jawaban, tbl_soal.id_topik from tbl_soal left outer join tbl_jawaban on tbl_soal.id_soal=tbl_jawaban.id_soal where tbl_soal.id_topik='.$idtopik.' GROUP BY(tbl_soal.id_soal)');
	}
	public function Add_soal()
	{
		$data=array(
			'soal' 		=>$this->input->post('soal',TRUE),
			'id_topik'	=>$this->input->post('array',TRUE),
		);
		$this->db->insert('tbl_soal',$data);
	}
	public function get_soal_limit($idsoal)
	{
		$this->db->where('id_soal',$idsoal);
		return $this->db->get('tbl_soal');
	}
	public function get_jawaban_limit($idsoal)
	{
		$this->db->where('id_soal',$idsoal);
		return $this->db->get('tbl_jawaban');
	}
	public function insert_jawaban($idsoal,$idtopik)
	{
		$data=array(
			'id_soal' 		=>$idsoal,
			'jawaban'		=>$this->input->post('jawaban',TRUE),
			'status_jawaban'=>$this->input->post('status_jawaban',TRUE),
		);
		$this->db->insert('tbl_jawaban',$data);
	}
	public function Update_soal($idsoal,$idtopik)
	{
		$data=array(
			'soal' 		=>$this->input->post('soal',TRUE),
			'id_topik'	=>$idtopik,
		);
		$this->db->set($data);
		$this->db->where('id_soal',$idsoal);
		$this->db->update('tbl_soal');
	}
	public function Update_jawaban($idjawaban)
	{
		$data=array(
			'jawaban' 	=>$this->input->post('jawaban',TRUE),
			'status_jawaban'	=>$this->input->post('status_jawaban',TRUE),
		);
		$this->db->set($data);
		$this->db->where('id_jawaban',$idjawaban);
		$this->db->update('tbl_jawaban');
	}
}