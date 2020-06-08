<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_tugas extends CI_Controller {

	public function index()
	{
		$this->load->view('user/user_view.php');
	}
}