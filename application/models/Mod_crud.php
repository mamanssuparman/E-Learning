<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_crud extends CI_Model {

	function ambil($table,$id = null,$limit = null)
	{
		if ($id != null) {
			$this->db->where($id);
		}
		if ($limit != null) {
			$this->db->limit($limit);
		}	
		return $this->db->get($table);
	}
	function simpan($table,$data)
	{
		if ($this->db->insert($table, $data)) {	
			return array('status' => 'berhasil','id' => $this->db->insert_id());
		}else{
			return array('status' => 'gagal',);
		}
	}
	function hapus($table,$id)
	{
		$this->db->where($id);
		if ($this->db->delete($table)) {
			return array('status' => 'berhasil');
		}else{
			return array('status' => 'gagal');
		}
	}
	function ubah($table,$data,$id)
	{
		$this->db->where($id);
		if ($this->db->update($table, $data)) {
			return array('status' => 'berhasil');
		}else{
			return array('status' => 'gagal');
		}
	}
	function simpanArray($table,$data)
	{
		if ($this->db->insert_batch($table, $data)) {	
			return array('status' => 'berhasil','id' => $this->db->insert_id());
		}else{
			return array('status' => 'gagal',);
		}
	}
	function hapusArray($table,$data,$id)
	{
		$this->db->where_in($data,$id);
		if ($this->db->delete($table)) {
			return array('status' => 'berhasil');
		}else{
			return array('status' => 'gagal');
		}
	}
	function ubahArray($table,$data,$id)
	{
		if ($this->db->update_batch($table, $data,$id)) {
			return array('status' => 'berhasil');
		}else{
			return array('status' => 'gagal');
		}
	}
	function ambilDiskusi()
	{
		$this->db->join('tbl_user', 'tbl_diskusi.id_user = tbl_user.id_user', 'left');
		$this->db->join('tbl_guru', 'tbl_diskusi.id_guru = tbl_guru.id_guru', 'left');
		$this->db->join('tbl_kelas', 'tbl_diskusi.id_kelas = tbl_kelas.id_kelas', 'left');
		$this->db->where('tbl_diskusi.id_kelas', $this->session->userdata('kelas'));
		return $this->db->get('tbl_diskusi');
	}
	function ambilDiskusiGuru($id)
	{
		$this->db->join('tbl_user', 'tbl_diskusi.id_user = tbl_user.id_user', 'left');
		$this->db->join('tbl_guru', 'tbl_diskusi.id_guru = tbl_guru.id_guru', 'left');
		$this->db->join('tbl_kelas', 'tbl_diskusi.id_kelas = tbl_kelas.id_kelas', 'left');
		$this->db->where('tbl_diskusi.id_kelas', $id);
		return $this->db->get('tbl_diskusi');
	}

}

/* End of file Mod_crud.php */
/* Location: ./application/models/Mod_crud.php */