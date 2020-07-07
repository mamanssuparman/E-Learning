<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends CI_Controller {
function __construct(){
		parent:: __construct();
		$this->load->model('Mdl_admin');
		$this->load->model('Mdl_Cek');
		$this->load->library('session');
		$this->load->helper('cookie');
		$this->load->library('upload');
		if($this->session->userdata('hak_akses')!='1')
		{
			redirect('','refresh');
		}
		//$this->load->libraries('session');
	}
	public function index()
	{
		//$kunci				=$this->uri->segment(4);
		$this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$data['judul'] 		="Extra";
		$data['subjudul'] 	="Import Data Siswa";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Import";
		$data['user'] 		="";
		$data['level'] 		="";
		$data['data_kelas'] 	=$this->Mdl_admin->get_data_kelas();
		$this->load->view('adminn/admin_view.php',$data);
    }
    public function Siswa()
    {
        $this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$data['judul'] 		="Extra";
		$data['subjudul'] 	="Import Data Siswa";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Import";
		$data['user'] 		="";
		$data['level'] 		="";
		$data['data_kelas'] 	=$this->Mdl_admin->get_data_kelas();
	}
	public function Guru()
	{
		$this->Mdl_Cek->get_sequrity();
		$this->Mdl_Cek->get_sequrity_guru();
		$id_pengguna 		=$this->session->userdata('username');
		$data['data_pengguna'] 		=$this->Mdl_admin->get_data_pengguna($id_pengguna);
		$data['judul'] 		="Extra";
		$data['subjudul'] 	="Import Data Guru";
		$data['title'] 		="3-learning";
		$data['judulbesar']	="Import";
		$data['user'] 		="";
		$data['level'] 		="";
		$data['data_kelas'] 	=$this->Mdl_admin->get_data_kelas();
	}
	public function Import_siswa()
	{
		$this->load->library('upload');
		$id_kelas=$this->input->post('array',TRUE);
		$namafile="FILE_".$id_kelas.'-'.time();
		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']	= '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $namafile;
		$this->upload->initialize($config);
		$this->upload->do_upload('filenya');
		// Import ke tabel siswa
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$namafile.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = array();
		
		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Kita push (add) array data ke variabel data
				array_push($data, array(
					'username'=>$row['B'], // Insert data nis dari kolom A di excel
					'nama_siswa'=>$row['C'], // Insert data nama dari kolom B di excel
					'panserword1'=>password_hash($row['D'],PASSWORD_DEFAULT), // Insert data jenis kelamin dari kolom C di excel
					'id_kelas'=>$id_kelas, // Insert data alamat dari kolom D di excel
				));
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}
		$this->Mdl_admin->Import_siswa($data);
		redirect('admin/Import/Siswa','refresh');
	}
	public function Import_guru()
	{
		
	}
}