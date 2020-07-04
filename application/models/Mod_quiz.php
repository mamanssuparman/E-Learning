<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_quiz extends CI_Model {
	var $table = 'tbl_materi';
	var $column_order 	= array('tes_nama','tes_jumlah_soal','tbl_tes_selesai','tes_detail', null);
	var $column_search 	= array('tes_nama','tes_jumlah_soal','tbl_tes_selesai','tes_detail');
	var $order 			= array('tbl_tes.id_tes'=>'des');

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
		$this->db->join('tbl_tes', 'tbl_tes_group_kelas.id_tes = tbl_tes.id_tes', 'left');
		$this->db->where('id_kelas', $this->session->userdata('kelas'));
		$this->db->from('tbl_tes_group_kelas');
	}
	function ambil()
	{
		$this->db->join('tbl_tes', 'tbl_tes_group_kelas.id_tes = tbl_tes.id_tes', 'left');
		$this->db->where('id_kelas', $this->session->userdata('kelas'));
		return $this->db->get('tbl_tes_group_kelas');
	}
	function ambilAcak($table,$id,$lim)
	{
		$this->db->order_by('rand()');
		$this->db->where($id);
		return $this->db->get($table, $lim);
	}
	function acakJawaban($table,$id)
	{
		$this->db->order_by('rand()');
		$this->db->where($id);
		return $this->db->get($table);
	}
	function ambilJawaban($table,$jawaban)
	{
		$this->db->where_in('id_soal', $jawaban);
		return $this->db->get('tbl_jawaban');
	}
	

}

/* End of file Mod_quiz.php */
/* Location: ./application/models/Mod_quiz.php */