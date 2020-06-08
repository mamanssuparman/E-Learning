<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Security extends CI_Model {
	public function get_sequrity()
	{
		$unsername		=$this->session->userdata('username');
		$level			=$this->session->userdata('level');
		if(empty($unsername))
		{
			$this->session->sess_destroy();
			redirect('');
		}
	}

}