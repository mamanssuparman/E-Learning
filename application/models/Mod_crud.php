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

}

/* End of file Mod_crud.php */
/* Location: ./application/models/Mod_crud.php */