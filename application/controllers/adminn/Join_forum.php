<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Join_forum extends CI_Controller {
function __construct(){
		parent:: __construct();
		$this->load->model('Mdl_admin');
		$this->load->model('Mdl_Cek');
		$this->load->library('session');
		$this->load->helper('cookie');
		if($this->session->userdata('hak_akses')!='1')
		{
			redirect('','refresh');
		}
		//$this->load->libraries('session');
	}
	public function index($id_kelas=null)
	{
		//$kunci				=$this->uri->segment(4);
		$this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		redirect('adminn/Forum/','refresh');
		
	}
	public function group($id_kelas=null)
	{
		$this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$data['judul'] 		="Forum";
		$data['subjudul'] 	="List Group Chat";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="List Group Chat";
		$data['user'] 		="";
		$data['level'] 		="";
		$data['kelas'] = $this->mc->ambil('tbl_kelas',['id_kelas' => $id_kelas])->row_array();
		$this->load->view('adminn/admin_view.php',$data);
	}
	function getChat()
	{
		$id = $this->input->post('kelas');
		$data['diskusi'] = $this->mc->ambilDiskusiGuru($id)->result();
		$res = array('view' => $this->load->view('adminn/isiChat', $data));
		echo json_encode($res);
	}
	function kirimChat()
	{
		$data = array(
			'diskusi_chat' 	=> $this->input->post('diskusi_chat'),
			'id_kelas'		=> $this->input->post('kelas'),
			'id_guru'		=> $this->session->userdata('id_guru'),
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