<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_Cek extends CI_Model {
	public function Cek_user($username,$password)
	{
		$data=array(
			'username'		=>$username,
			'panserword1' 	=>$password
		);
		$this->db->where('username',$username);
		$this->db->where('panserword1',$password);
		return $this->db->get('tbl_user');


		// $query_cari_unsername=$this->db->query("select * from tbl_user where username='$username' and panserword1='$password'");
		// return $query_cari_unsername;
		//$ketemu=$this->db->num_rows("select * from tsmk_users where unsername='$unsername' and panserword='$panserword'");
		//return $ketemu;
	}
	public function get_sequrity()
	{
		$unsername		=$this->session->userdata('userguru');
		$level			=$this->session->userdata('hak_akses');
		if(empty($unsername))
		{
			$this->session->sess_destroy();
			redirect('');
		}
	}
	public function get_sequrity_guru()
	{
		$level 			=$this->session->userdata('level');
		if ($level=='siswa') {
			redirect('user/');
		}
	}
	public function get_sequrity_akses_guru()
	{
		$akses 		=$this->session->userdata('hak_akses');
		if (!$akses=='2') {
			redirect('','refresh');
		}

	}
	public function get_sequrity_siswa()
	{
		$level 			=$this->session->userdata('level');
		if ($level=='guru') {
			redirect('adminn/');
		}
	}
	public function Cek_guru($username)
	{
		$password=md5($this->input->post('password',TRUE));
		// $eksekusi 	=$this->db->query("select * from tbl_guru where unsername='$username' and panserword='$password'");
		// return $eksekusi;
		$data=array(
			'unsername' 		=>$username,
			'panserword' 		=>$password
		);
		return $this->db->get_where('tbl_guru',$data);
	}

}
