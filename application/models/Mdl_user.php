<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_user extends CI_Model {

	public function get_data_materi_siswa($kunci)
	{
		$eksekusi =$this->db->query("SELECT tbl_mapel.*, tbl_kelas.*, tbl_mapel_kelas_guru_group.id_mapel from tbl_mapel Join tbl_mapel_kelas_guru_group on tbl_mapel.id_mapel=tbl_mapel_kelas_guru_group.id_mapel join tbl_kelas on tbl_kelas.id_kelas=tbl_mapel_kelas_guru_group.id_kelas WHERE tbl_kelas.id_kelas='$kunci'");
		return $eksekusi;
	}
	public function get_data_materi_detail($kunci,$id_kelas)
	{
		$eksekusi =$this->db->query("SELECT tbl_materi.id_materi, tbl_materi.judul_materi,tbl_materi.detail_materi, tbl_materi.id_mapel, tbl_materi.video, tbl_mapel.*, tbl_kelas.*, tbl_mapel_kelas_guru_group.* from tbl_materi left join tbl_mapel on tbl_materi.id_mapel=tbl_mapel.id_mapel join tbl_mapel_kelas_guru_group on tbl_materi.id_mapel=tbl_mapel_kelas_guru_group.id_mapel join tbl_kelas on tbl_kelas.id_kelas=tbl_mapel_kelas_guru_group.id_kelas where tbl_mapel.id_mapel='$kunci' and tbl_kelas.id_kelas='$id_kelas'");
		return $eksekusi;
	}
	public function get_data_materi_detailb($kunci,$id_kelas)
	{
		$eksekusi =$this->db->query("SELECT tbl_materi.id_materi, tbl_materi.judul_materi,tbl_materi.detail_materi, tbl_materi.id_mapel, tbl_materi.video, tbl_mapel.*, tbl_kelas.*, tbl_mapel_kelas_guru_group.* from tbl_materi left join tbl_mapel on tbl_materi.id_mapel=tbl_mapel.id_mapel join tbl_mapel_kelas_guru_group on tbl_materi.id_mapel=tbl_mapel_kelas_guru_group.id_mapel join tbl_kelas on tbl_kelas.id_kelas=tbl_mapel_kelas_guru_group.id_kelas where tbl_materi.id_materi='$kunci' and tbl_kelas.id_kelas='$id_kelas'");
		return $eksekusi;
	}
	public function get_data_siswa($kunci)
	{
		$eksekusi 	=$this->db->query("SELECT tbl_user.*, tbl_kelas.nama_kelas from tbl_user left OUTER join tbl_kelas on tbl_user.id_kelas=tbl_kelas.id_kelas where tbl_user.username='$kunci'");
		return $eksekusi;
	}
	public function Send_diskusi()
	{
		$id_kelas 	=$this->session->userdata('kelas');
		$id_user 	=$this->session->userdata('id_user');
		$diskusi 	=$this->input->post('diskusi',TRUE);
		$eksekusi 	=$this->db->query("insert into tbl_diskusi(id_user,id_kelas,diskusi_chat)values('$id_user','$id_kelas','$diskusi')");
		return $eksekusi;
	}
	public function get_diskusi($id_kelas)
	{
		$eksekusi 	=$this->db->query("select * from tbl_diskusi where id_kelas='$id_kelas'");
		return $eksekusi;
	}
	public function get_sum_mapel($id_kelas)
	{
		# code...
	}
}