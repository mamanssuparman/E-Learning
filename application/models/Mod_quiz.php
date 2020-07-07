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
		// $this->db->join('tbl_tes_user', 'tbl_tes.id_tes = tbl_tes_user.id_tes', 'left');
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
		$this->db->join('tbl_jawaban', 'tbl_tes_soal.id_soal = tbl_jawaban.id_soal', 'right');
		$this->db->where_in('tbl_tes_soal.id_soal', $jawaban);
		return $this->db->get('tbl_tes_soal');
	}
	function ambilS($id)
	{
		$q = $this->mc->ambil('tbl_tes_user',['id_tes_user' => $id])->row_array();

		$this->db->join('tbl_tes', 'tbl_tes_user.id_tes = tbl_tes.id_tes', 'right');
		$this->db->where('tbl_tes.id_tes',$q['id_tes']);
		return $this->db->get('tbl_tes_user');
	}
	function ambilSK($id,$order)
	{
		$this->db->where('id_tes_user', $id);
		$this->db->where('tes_order', $order);
		$this->db->join('tbl_soal', 'tbl_tes_soal.id_soal = tbl_soal.id_soal', 'left');
		return $this->db->get('tbl_tes_soal');
	}
	function ambilJK($id,$order)
	{
		$this->db->where('id_tes_user', $id);
		$this->db->where('tes_order', $order);
		$this->db->join('tbl_jawaban', 'tbl_tes_soal.id_soal = tbl_jawaban.id_soal', 'left');
		$this->db->join('tbl_tes_jawaban', 'tbl_jawaban.id_jawaban = tbl_tes_jawaban.id_jawaban', 'left');
		return $this->db->get('tbl_tes_soal');
		// $q = $this->db->get('tbl_tes_soal')->row_array();
		// $this->db->join('tbl_tes_jawaban', 'tbl_jawaban.id_jawaban = tbl_tes_jawaban.id_jawaban', 'left');
		// return $this->mc->ambil('tbl_jawaban',['id_soal' => $q['id_soal']]);
	}
	function ambilJOin($id)
	{
		$this->db->join('tbl_tes_jawaban', 'tbl_tes_soal.id_tes_soal = tbl_tes_jawaban.id_tes_soal', 'right');
		$this->db->where('id_tes_user', $id);
		$this->db->group_by('tes_order');
		return $this->db->get('tbl_tes_soal');
	}
	function set_point($ts,$ij,$poin)
	{
		$q = $this->mc->ambil('tbl_jawaban',['id_jawaban' => $ij])->row_array();
		if ($q['status_jawaban'] == 1) {
			$this->db->where('id_tes_soal', $ts);
			return $this->db->update('tbl_tes_soal', ['point' => $poin]);
		}else{
			$this->db->where('id_tes_soal', $ts);
			return $this->db->update('tbl_tes_soal', ['point' => 0]);
		}
	}
	function cariTes($id)
	{
		$this->db->where('id_tes', $id);
		$this->db->where('id_user', $this->session->userdata('id_siswa'));
		return $this->db->get('tbl_tes_user');
	}

}

/* End of file Mod_quiz.php */
/* Location: ./application/models/Mod_quiz.php */