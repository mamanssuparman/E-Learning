<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('id_siswa')) {
			redirect('user','refresh');
		}
	}
	public function index()
	{
		//$this->output->enable_profiler(TRUE);
		$this->load->view('Login.php');
	}
}