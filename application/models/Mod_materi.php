<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_materi extends CI_Model {

	var $table = 'tbl_materi';
	var $column_order 	= array('judul_materi','nama_mapel','deskripsi', null);
	var $column_search 	= array('judul_materi','nama_mapel','deskripsi');
	var $order 			= array('id_materi'=>'asc');

	private function _get_datatables_query()
	{
		$this->db->from($this->join());

		$i = 0;

		foreach ($this->column_search as $item) {
			if ($_POST['search']['value']) {
				if ($i === 0) {
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				}else{
					$this->db->or_like($item, $_POST['search']['value']);
				}
				if(count($this->column_search) -1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}elseif (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	function count_all()
	{
		$this->db->from($this->join());
		return $this->db->count_all_results();
	}
	function join()
	{
		$this->db->join('tbl_mapel', 'tbl_materi.id_mapel = tbl_mapel.id_mapel', 'left');
		$this->db->join('tbl_mapel_kelas_guru_group', 'tbl_mapel.id_mapel = tbl_mapel_kelas_guru_group.id_mapel', 'left');
		$this->db->join('tbl_guru', 'tbl_mapel_kelas_guru_group.id_guru = tbl_guru.id_guru', 'left');
		$this->db->where('id_kelas', $this->session->userdata('kelas'));
		$this->db->from('tbl_materi');
	}
	function ambil($id)
	{
		$this->db->join('tbl_mapel', 'tbl_materi.id_mapel = tbl_mapel.id_mapel', 'left');
		$this->db->where('id_materi', $id);
		return $this->db->get('tbl_materi');
	}

}

/* End of file Mod_materi.php */
/* Location: ./application/models/Mod_materi.php */