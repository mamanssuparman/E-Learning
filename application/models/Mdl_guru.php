<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_guru extends CI_Model {

	public function get_data_kelas($idguru)
	{
        // $idguru=$this->session->userdata('id_guru');
		$get = $this->db->query('SELECT tbl_mapel_kelas_guru_group.*, tbl_kelas.nama_kelas from tbl_mapel_kelas_guru_group left OUTER JOIN tbl_kelas on tbl_mapel_kelas_guru_group.id_kelas=tbl_kelas.id_kelas WHERE tbl_mapel_kelas_guru_group.id_guru='.$idguru.'');
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
	
}