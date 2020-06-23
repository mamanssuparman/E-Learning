<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diskusi extends CI_Controller {
	function __construct(){
		parent:: __construct();
		if (!$this->session->userdata('id_siswa')) {
			redirect('','refresh');
		}
	}
	public function index()
	{
		$data = array(
			'siswa' => $this->mc->ambil('tbl_user',['id_user' => $this->session->userdata('id_siswa')])->row_array(),
			'kelas' => $this->mc->ambil('tbl_kelas',['id_kelas' => $this->session->userdata('kelas')])->row_array(),
			'title' => 'Diskusi',
		);
		$this->elearning->user('user/Diskusi',$data);
	}
	function getChat()
	{
		$data['diskusi'] = $this->mc->ambilDiskusi()->result();
		$res = array('view' => $this->load->view('user/isichat', $data));
		echo json_encode($res);
	}
	function kirimChat()
	{
		$data = array(
			'diskusi_chat' 	=> $this->input->post('diskusi_chat'),
			'id_kelas'		=> $this->session->userdata('kelas'),
			'id_user'		=> $this->session->userdata('id_siswa'),
			'waktu'			=> date('Y-m-d H:i:s')
		);
		$this->mc->simpan('tbl_diskusi',$data);
		require_once(APPPATH.'views/vendor/autoload.php');
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            'ce5acc28a4dea6008c9c', //ganti dengan App_key pusher Anda
            '41ffbe6dcbe188b6e6e7', //ganti dengan App_secret pusher Anda
            '1020325', //ganti dengan App_key pusher Anda
            $options
        );
 
        $data['message'] = 'success';
        $pusher->trigger('my-channel', 'my-event', $data);
	}
}