<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_admin extends CI_Model {

	public function get_data_kelas()
	{
		$get = $this->db->query("SELECT tbl_kelas.id_kelas, tbl_kelas.nama_kelas,count(tbl_user.id_user) as jumlah_siswa,tbl_tapel.nama_tapel from tbl_kelas left outer join tbl_user on tbl_kelas.id_kelas=tbl_user.id_kelas join tbl_tapel on tbl_kelas.id_tapel=tbl_tapel.id_tapel GROUP by(tbl_kelas.id_kelas)");
		return $get;
	}
	public function get_kelas_all()
	{
		return $this->db->get('tbl_kelas');
		
	}
	public function Save_kelas()
	{
		$kelas 	= $this->input->post('kelas',TRUE);
		$id_tapel	=$this->input->post('id_tapel',TRUE);
		$data=array(
			'nama_kelas' 		=>$kelas,
			'id_tapel' 			=>$id_tapel
		);
		return $this->db->insert('tbl_kelas',$data);

		
	}
	public function Update_kelas()
	{
		$id_kelas 	=$this->input->post('id_kelas',TRUE);
		$kelas 		=$this->input->post('kelas', TRUE);
		$this->db->set('nama_kelas',$kelas);
		$this->db->where('id_kelas',$id_kelas);
		$this->db->update('tbl_kelas');
		
	}
	public function Delete_kelas()
	{
		$id_kelas 	=$this->input->post('id_kelas',TRUE);
		$this->db->where('id_kelas',$id_kelas);
		$this->db->delete('tbl_kelas');
		// $eksekusi 	=$this->db->query("delete from tbl_kelas where id_kelas ='$id_kelas'");
		// return $eksekusi;
	}
	public function get_data_siswa()
	{
		$get =$this->db->query("select tbl_user.*, tbl_kelas.* from tbl_user left JOIN tbl_kelas on tbl_user.id_kelas=tbl_kelas.id_kelas");
		return $get;
	}
	public function Save_siswa()
	{
		$id_kelas 		=$this->input->post('Kelas',TRUE);
		$username 		=$this->input->post('username',TRUE);
		$password1 		=password_hash($this->input->post('password',TRUE),PASSWORD_DEFAULT);
		$password2 		=$this->input->post('password',TRUE);
		$nama_siswa 	=$this->input->post('nama',TRUE);
		$data=array(
			'id_kelas' 		=>$id_kelas,
			'username' 		=>$username,
			'panserword1'	=>$password1,
			'panserword2' 	=>$password2,
			'nama_siswa' 	=>$nama_siswa
		);
		$this->db->insert('tbl_user',$data);
	}
	public function Update_siswa($id_user)
	{
		$password1		=password_hash($this->input->post('password',TRUE),PASSWORD_DEFAULT);
		$password2 		=$this->input->post('password', TRUE);
		$nama_siswa 	=$this->input->post('nama', TRUE);
		$id_kelas 		=$this->input->post('Kelas', TRUE);
		$data=array(
			'nama_siswa' 		=>$nama_siswa,
			'id_kelas' 			=>$id_kelas,
			'panserword1' 		=>$password1,
			'panserword2' 		=>$password2
		);
		$this->db->set($data);
		$this->db->where('id_user',$id_user);
		$this->db->update('tbl_user');
		
	}
	public function Delete_siswa($id_user)
	{
		$this->db->where('id_user',$id_user);
		$this->db->delete('tbl_user');
	}
	public function get_data_topik()
	{
		$eksekusi 		=$this->db->query("select tbl_topik.id_topik, tbl_topik.topik_nama, tbl_topik.topik_detail,count(tbl_soal.soal)as jumlah_soal from tbl_topik left outer join tbl_soal on tbl_topik.id_topik=tbl_soal.id_topik group by tbl_topik.id_topik");
		return $eksekusi;
	}
	public function Add_topik_soal()
	{
		$topik_nama 	=$this->input->post('topik_nama',TRUE);
		$topik_detail 	=$this->input->post('topik_detail',TRUE);
		//$id_mapel 		=$this->input->post('id_mapel',TRUE);
		//$status_topik 	='1';
		$data=array(
			'topik_nama' 		=>$topik_nama,
			'topik_detail' 		=>$topik_detail
		);
		$this->db->insert('tbl_topik',$data);
	}
	public function Update_topik_soal()
	{
		$id_topik 		=$this->input->post('id_topik',TRUE);
		$topik_nama 	=$this->input->post('topik_nama', TRUE);
		$topik_detail 	=$this->input->post('topik_detail',TRUE);
		$data=array(
			'topik_nama' 		=>$topik_nama,
			'topik_detail' 		=>$topik_detail
		);
		$this->db->set($data);
		$this->db->where('id_topik',$id_topik);
		$this->db->update('tbl_topik');
		
	}
	public function Delete_topik_soal()
	{
		$id_topik 		=$this->input->post('id_topik', TRUE);
		$this->db->where('id_topik',$id_topik);
		$this->db->delete('tbl_topik');
	}
	public function Save_soal()
	{
		$id_topik 		=$this->input->post('id_topik',TRUE);
		$soal 			=$this->input->post('soal',TRUE);
		$eksekusi 		=$this->db->query("insert into tbl_soal(soal,id_topik)values('$soal','$id_topik')");
		return $eksekusi;
	}
	public function get_data_soal()
	{
		$eksekusi 		=$this->db->query("SELECT tbl_soal.id_soal,tbl_soal.soal,tbl_soal.soal_audio, COUNT(tbl_jawaban.id_soal) as jumlah_jawaban, tbl_topik.id_topik, tbl_topik.topik_nama from tbl_soal left outer join tbl_jawaban on tbl_soal.id_soal=tbl_jawaban.id_soal join tbl_topik on tbl_soal.id_topik=tbl_topik.id_topik GROUP BY(tbl_soal.id_soal)");
		return $eksekusi;
	}
	public function get_data_soal_limit($kunci)
	{
		// return $this->db->get_where('tbl_soal',array('id_soal'))
		$eksekusi 		=$this->db->query("select * from tbl_soal where id_soal='$kunci'");
		return $eksekusi;
	}
	public function get_data_jawaban_limit($kunci)
	{
		$eksekusi 		=$this->db->query("select * from tbl_jawaban where id_soal='$kunci' order by id_jawaban asc");
		return $eksekusi;
	}
	public function Save_jawaban()
	{
		$id_soal 		= $this->input->post('id_soal',TRUE);
		$jawaban 		= $this->input->post('jawaban',TRUE);
		$status_jawaban = $this->input->post('status_jawaban',TRUE);
		$data=array(
			'id_soal'	=>$id_soal,
			'jawaban' 	=>$jawaban,
			'status_jawaban'	=>$status_jawaban
		);
		$this->db->insert('tbl_jawaban',$data);

		// $eksekusi 		=$this->db->query("insert into tbl_jawaban(id_soal,jawaban,status_jawaban)values('$id_soal','$jawaban','$status_jawaban')");
		// return $eksekusi;
	}
	public function get_data_soal_topik($kunci)
	{
		$eksekusi 		=$this->db->query("SELECT tbl_soal.id_soal,tbl_soal.soal,tbl_soal.soal_audio, COUNT(tbl_jawaban.id_soal) as jumlah_jawaban, tbl_soal.id_topik, tbl_topik.topik_nama from tbl_soal left outer join tbl_jawaban on tbl_soal.id_soal=tbl_jawaban.id_soal left outer join tbl_topik on tbl_soal.id_topik=tbl_topik.id_topik GROUP BY(tbl_soal.id_soal)");
		return $eksekusi;
	}
	public function get_data_soal_topik_limit($kunci)
	{
		$eksekusi 		=$this->db->query("SELECT tbl_soal.id_soal,tbl_soal.soal,tbl_soal.soal_audio, COUNT(tbl_jawaban.id_soal) as jumlah_jawaban, tbl_soal.id_topik from tbl_soal left outer join tbl_jawaban on tbl_soal.id_soal=tbl_jawaban.id_soal where tbl_soal.id_topik='$kunci' GROUP BY(tbl_soal.id_soal)");
		return $eksekusi;
	}
	public function Update_soal($kunci,$soal)
	{
		$field=array(
			'soal' 	=>$soal
		);
		$this->db->set($field);
		$this->db->where('id_soal',$kunci);
		$this->db->update('tbl_soal');
	}
	public function get_data_mat_pel()
	{
		$eksekusi 	=$this->db->query("SELECT tbl_mapel.*, count(tbl_materi.id_materi) as jumlah_materi from tbl_mapel left join tbl_materi on tbl_mapel.id_mapel=tbl_materi.id_mapel GROUP BY(tbl_mapel.id_mapel)");
		return $eksekusi;
	}
	public function get_data_mat_pel_terpilih($id_mapel)
	{
		return $this->db->query("SELECT tbl_kelas.*, tbl_mapel_kelas_guru_group.id_group, tbl_mapel_kelas_guru_group.id_mapel,tbl_mapel_kelas_guru_group.id_kelas as id_kelas_pilih  from tbl_kelas left outer join tbl_mapel_kelas_guru_group on tbl_kelas.id_kelas= tbl_mapel_kelas_guru_group.id_kelas where tbl_mapel_kelas_guru_group.id_mapel='$id_mapel'");
	}
	public function get_data_mat_pel_search($id_mapel)
	{
		return $this->db->get_where('tbl_mapel',array('id_mapel'=>$id_mapel));
		// $eksekusi 	=$this->db->query("select * from tbl_mapel where id_mapel='$id_mapel'");
		// return $eksekusi;
		 
	}
	public function Add_mat_pel()
	{
		$this->db->trans_start();
		$nama_mapel =preg_replace("/[^a-zA-Z0-9]/", " ", $this->input->post('nama_mapel',TRUE));
		$deskripsi 	=preg_replace("/[^a-zA-Z0-9]/", " ", $this->input->post('deskripsi',TRUE));
		$id_kelas 	=$this->input->post('id_kelas', TRUE);
		$data=array(
			'nama_mapel' 		=>$nama_mapel,
			'deskripsi' 		=>$deskripsi
		);
		$this->db->insert('tbl_mapel',$data);
		$id_mapel 	=$this->db->insert_id();
		$result=array();
		foreach ($id_kelas as $key => $value) {
			$result[]=array(
				'id_mapel'	=>$id_mapel,
				'id_kelas' 	=>$_POST['id_kelas'][$key]);
		}
		$this->db->insert_batch('tbl_mapel_kelas_guru_group',$result);
		$this->db->trans_complete();
	}
	public function Update_mat_pel($id_mapel)
	{
		//$id_mapel 	=$this->input->post('id_mapel',TRUE);
		$this->db->trans_start();
		$nama_mapel =preg_replace("/[^a-zA-Z0-9]/", " ", $this->input->post('nama_mapel',TRUE));
		$deskripsi 	=preg_replace("/[^a-zA-Z0-9]/", " ", $this->input->post('deskripsi',TRUE));
		$id_kelasnya 	=$this->input->post('id_kelasnya', TRUE);
		//$id_kelas 	=$this->input->post('id_kelas', TRUE);
		$data=array(
			'nama_mapel' 		=>$nama_mapel,
			'deskripsi' 		=>$deskripsi
		);
		$this->db->set($data);
		$this->db->where('id_mapel',$id_mapel);
		$this->db->update('tbl_mapel');
		
		$this->db->delete('tbl_mapel_kelas_guru_group',array('id_mapel'=>$id_mapel));
		
		$this->db->trans_complete();
	}
	public function Update_mat_pel1()
	{
		$this->db->trans_start();
		$id_kelas =$this->input->post('id_kelas', TRUE);
		$id_mapel =$this->input->post('id_mapel',TRUE);
		$result=array();
		foreach ($id_kelas as $key => $value) {
			$result[]=array(
				'id_mapel'	=>$id_mapel,
				'id_kelas' 	=>$_POST['id_kelas'][$key]);
		}
		$this->db->insert_batch('tbl_mapel_kelas_guru_group',$result);
		$this->db->trans_complete();
	}
	public function Save_materi($id_mapel)
	{
		$judul_materi 	=preg_replace("/[^a-zA-Z0-9]/", " ", $this->input->post('judul_materi',TRUE));
		$detail_materi 	=$this->input->post('detail_materi',TRUE);
		//$id_mapel		=$this->input->post('id_mapel', TRUE);
		$data=array(
			'judul_materi'		=>$judul_materi,
			'detail_materi' 	=>$detail_materi,
			'id_mapel'			=>$id_mapel
		);
		return $this->db->insert('tbl_materi',$data);
		
	}
	public function get_data_materi()
	{
		$eksekusi 	=$this->db->query("SELECT tbl_materi.id_materi, tbl_materi.judul_materi, left(tbl_materi.detail_materi,1000) as detail_materi, tbl_materi.video,
tbl_mapel.id_mapel, tbl_mapel.nama_mapel, tbl_mapel.deskripsi
from tbl_materi left outer join tbl_mapel on tbl_materi.id_mapel=tbl_mapel.id_mapel");
		return $eksekusi;

	}
	public function Update_materi($kunci)
	{
		$judul_materi 	=$this->input->post('judul_materi',TRUE);
		$detail_materi 	=preg_replace("[a-zA-Z0-9]", " ", $this->input->post('detail_materi',TRUE));

		//$detail_materi 	=$this->input->post('detail_materi',TRUE);
		//$id_mapel		=$this->input->post('id_mapel',TRUE);
		$data=array(
			'judul_materi'		=>$judul_materi,
			'detail_materi'		=>$detail_materi
		);
		$this->db->set($data);
		$this->db->where('id_materi',$kunci);
		$this->db->update('tbl_materi');
		
	}
	public function Delete_materi($kunci)
	{
		$this->db->where('id_materi',$kunci);
		$this->db->delete('tbl_materi');
	
	}
	public function Delete_list_materi($id_materi)
	{
		$this->db->where('id_materi',$id_materi);
		$this->db->delete('tbl_materi');
	}
	public function get_data_lihat_soal($id_topik)
	{
		$eksekusi 		=$this->db->query("SELECT tbl_soal.id_soal,tbl_soal.soal,tbl_soal.soal_audio, COUNT(tbl_jawaban.id_soal) as jumlah_jawaban, tbl_topik.id_topik, tbl_topik.topik_nama from tbl_soal left outer join tbl_jawaban on tbl_soal.id_soal=tbl_jawaban.id_soal join tbl_topik on tbl_soal.id_topik=tbl_topik.id_topik where tbl_soal.id_topik='$id_topik' GROUP BY(tbl_soal.id_soal)");
		return $eksekusi;
	}
	public function get_data_nama_topik($kunci)
	{
		$eksekusi1 		=$this->db->query("select * from tbl_topik where id_topik='$kunci'");
		return $eksekusi1;
	}
	public function get_sum_data_siswa()
	{
		$eksekusi 		=$this->db->query("SELECT count(id_user) as jumlah_siswa from tbl_user");
		return $eksekusi;
	}
	public function get_sum_data_mapel()
	{
		$eksekusi 		=$this->db->query("SELECT count(id_mapel) as jumlah_mapel from tbl_mapel");
		return $eksekusi;
	}
	public function get_sum_data_materi()
	{
		$eksekusi 		=$this->db->query("select count(id_materi) as jumlah_materi from tbl_materi");
		return $eksekusi;
	}
	public function get_sum_data_soal()
	{
		$eksekusi 		=$this->db->query("select count(id_soal) as jumlah_soal from tbl_soal");
		return $eksekusi;
	}
	public function get_cari_siswa($kunci)
	{
		return $this->db->get_where('tbl_user',array('username'=>$kunci));
		
	}
	public function get_nama_mapel($kunci)
	{
		$eksekusi 		=$this->db->query("select * from tbl_mapel where id_mapel='$kunci'");
		return $eksekusi;
	}
	public function get_data_tapel()
	{
		return $this->db->get('tbl_tapel');
		// $eksekusi 		=$this->db->query("select * from tbl_tapel");
		// return $eksekusi;
	}
	public function save_tapel()
	{
		$nama_tapel 	=$this->input->post('nama_tapel',TRUE);
		return $this->db->insert('tbl_tapel',array('nama_tapel'=>$nama_tapel));
		// $eksekusi 		=$this->db->query("insert into tbl_tapel(nama_tapel)values('$nama_tapel')");
		// return $eksekusi;
	}
	public function Delete_tapel($kunci)
	{

		return $this->db->delete('tbl_tapel',array('id_tapel'=>$kunci));
		// $eksekusi 		=$this->db->query("delete from tbl_tapel where id_tapel='$kunci'");
		// return $eksekusi;
	}
	public function Save_guru()
	{
		$nama 			=$this->input->post('nama', TRUE);
		$username 		=$this->input->post('unsername', TRUE);
		$panserword 	=password_hash($this->input->post('panserword', TRUE),PASSWORD_DEFAULT);
		$tempat_lahir 	=$this->input->post('tempat_lahir',TRUE);
		$tgl_lahir 		=$this->input->post('tgl_lahir', TRUE);
		$data=array(
			'nama' 			=>$nama,
			'unsername' 	=>$username,
			'panserword' 	=>$panserword,
			'tempat_lahir' 	=>$tempat_lahir,
			'tgl_lahir'		=>$tgl_lahir
		);
		$this->db->insert('tbl_guru',$data);
	}
	public function get_data_guru()
	{
		return $this->db->get('tbl_guru');
		
	}
	public function get_data_mapel_group()
	{
		$eksekusi 		=$this->db->query("SELECT tbl_mapel_kelas_guru_group.*, tbl_mapel.nama_mapel, tbl_kelas.nama_kelas,tbl_kelas.id_tapel, tbl_guru.nama, tbl_tapel.nama_tapel from tbl_mapel_kelas_guru_group left outer join tbl_mapel on tbl_mapel_kelas_guru_group.id_mapel=tbl_mapel.id_mapel left outer join tbl_kelas on tbl_mapel_kelas_guru_group.id_kelas=tbl_kelas.id_kelas left outer join tbl_guru on tbl_mapel_kelas_guru_group.id_guru=tbl_guru.id_guru left outer join tbl_tapel on tbl_kelas.id_tapel=tbl_tapel.id_tapel");
		return $eksekusi;
	}
	public function get_data_mapel_group_limit()
	{
		$eksekusi 		=$this->db->query("SELECT tbl_mapel_kelas_guru_group.*, tbl_mapel.nama_mapel, tbl_kelas.nama_kelas,tbl_kelas.id_tapel, tbl_guru.nama, tbl_tapel.nama_tapel from tbl_mapel_kelas_guru_group left outer join tbl_mapel on tbl_mapel_kelas_guru_group.id_mapel=tbl_mapel.id_mapel left outer join tbl_kelas on tbl_mapel_kelas_guru_group.id_kelas=tbl_kelas.id_kelas left outer join tbl_guru on tbl_mapel_kelas_guru_group.id_guru=tbl_guru.id_guru left outer join tbl_tapel on tbl_kelas.id_tapel=tbl_tapel.id_tapel WHERE tbl_mapel_kelas_guru_group.id_guru is NULL");
		return $eksekusi;
	}
	public function get_materi_mapel($id_mapel)
	{
		return $this->db->get_where('tbl_materi',array('id_mapel'=>$id_mapel));
	}
	public function add_update_mapel_guru()
	{
		$id_group 		=$this->input->post('id_group', TRUE);
		$id_gurunya 	=$this->input->post('id_guru', TRUE);
		$data=array(
			'id_guru'=>NULL
		);
		$data1=array(
			'id_guru' 	=>$id_gurunya
		);
		if ($id_gurunya=="NULL") {
			$this->db->set($data);
			$this->db->where('id_group',$id_group);
			$this->db->update('tbl_mapel_kelas_guru_group');
			// $eksekusi =$this->db->query("update tbl_mapel_kelas_guru_group set id_guru=NULL where id_group='$id_group'");
		}
		else{
			$this->db->set($data1);
			$this->db->where('id_group',$id_group);
			$this->db->update('tbl_mapel_kelas_guru_group');	
		}	
	}
	public function Add_tes()
	{
		$tes_nama 				=$this->input->post('tes_nama',TRUE);
		$tes_detail				=$this->input->post('tes_detail',TRUE);
		$tes_mulai 				=substr($this->input->post('rentangwaktu',TRUE), 0,19);
		$tes_selesai 			=substr($this->input->post('rentangwaktu',TRUE), -19);
		$durasi_waktu 			=$this->input->post('durasi_waktu',TRUE);
		$tes_score_benar 		=$this->input->post('tes_score_benar', TRUE);
		$tes_jumlah_soal 		=$this->input->post('tes_jumlah_soal',TRUE);
		$tes_score_maksimal 	=$_POST['tes_score_benar'] * $_POST['tes_jumlah_soal'];
		$tes_acak_soal 			=$this->input->post('tes_acak_soal',TRUE);
		$tes_acak_jawaban 		='1';
		$id_topik 				=$this->input->post('id_topik',TRUE);
		$kelas 					=$this->input->post('id_kelas', TRUE);
		$data=array(
			'tes_nama'		=>$tes_nama,
			'tes_detail' 	=>$tes_detail,
			'tes_mulai' 	=>$tes_mulai,
			'tes_selesai'	=>$tes_selesai,
			'durasi_waktu' 	=>$durasi_waktu,
			'tes_score_benar'	=>$tes_score_benar,
			'tes_score_maksimal'=>$tes_score_maksimal,
			'tes_jumlah_soal'	=>$tes_jumlah_soal,
			'tes_acak_soal' 	=>$tes_acak_soal,
			'tes_acak_jawaban'	=>$tes_acak_jawaban,
			'id_topik' 			=>$id_topik
		);
		$this->db->trans_start();
		$this->db->insert('tbl_tes',$data);
		// $this->db->query("insert into tbl_tes(tes_nama,tes_detail,tes_mulai,tes_selesai,durasi_waktu,tes_score_benar,tes_score_maksimal,tes_jumlah_soal,tes_acak_soal,tes_acak_jawaban,id_topik)values('$tes_nama','$tes_detail','$tes_mulai','$tes_selesai','$durasi_waktu','$tes_score_benar','$tes_score_maksimal','$tes_jumlah_soal','$tes_acak_soal','$tes_acak_jawaban','$id_topik')");
		$id_tes =$this->db->insert_id();
		$result=array();
		foreach ($kelas as $key => $value) {
			$result[]=array(
				'id_tes' 	=>$id_tes,
				'id_kelas'	=>$_POST['id_kelas'][$key]);
		}
		$this->db->insert_batch('tbl_tes_group_kelas',$result);
		$this->db->trans_complete();

	}
	public function get_data_quiz()
	{
		return $this->db->get('tbl_tes');
		// $eksekusi 	=$this->db->query("select * from tbl_tes");
		// return $eksekusi;
	}
	public function get_data_quiz_edit($id_quiz)
	{
		$this->db->where('id_tes',$id_quiz);
		return $this->db->get('tbl_tes');
		// return $this->db->query("select * from tbl_tes where id_tes='$id_quiz'");
	}
	public function get_data_diskusi()
	{
		$eksekusi 	=$this->db->query("SELECT tbl_kelas.*, tbl_diskusi.id_diskusi from tbl_kelas left outer join tbl_diskusi on tbl_kelas.id_kelas=tbl_diskusi.id_kelas GROUP BY tbl_kelas.id_kelas");
		return $eksekusi;
	}
	public function get_data_join_forum($id_kelas)
	{
		$eksekusi 	=$this->db->query("SELECT tbl_diskusi.*, tbl_user.nama_siswa, tbl_kelas.*, tbl_guru.id_guru, tbl_guru.nama from tbl_diskusi left outer join tbl_user on tbl_diskusi.id_user=tbl_user.id_user left outer join tbl_kelas on tbl_diskusi.id_kelas= tbl_kelas.id_kelas left outer join tbl_guru on tbl_diskusi.id_guru=tbl_guru.id_guru where tbl_diskusi.id_kelas='$id_kelas'");
		return $eksekusi;
	}
	public function get_data_pengguna()
	{
		return $this->db->get_where('tbl_guru',array('unsername'=>$this->session->userdata('userguru')));
		// $eksekusi 	=$this->db->query("select * from tbl_guru where unsername='$id_pengguna'");
		// return $eksekusi;
	}
	public function get_data_nama_guru($id_guru)
	{
		$eksekusi 	=$this->db->query("select * from tbl_guru where id_guru='$id_guru'");
		return $eksekusi;
	}
	public function Send_chat($id_kelas,$id_guru)
	{
		$isipesan 	=$this->input->post('isi',TRUE);
		$eksekusi 	=$this->db->query("insert into tbl_diskusi(id_guru,id_kelas,alias,diskusi_chat)values('$id_guru','$id_kelas','Maman Suparman','$isipesan')");
		return $eksekusi;
	}
	public function Update_profile($id_pengguna)
	{
		$nama 		=$this->input->post('nama',TRUE);
		$tempat_lahir	=$this->input->post('tempat_lahir',TRUE);
		$tgl_lahir 		=$this->input->post('tgl_lahir', TRUE);
		$password 		=password_hash($this->input->post('password',TRUE),PASSWORD_DEFAULT);
		$data=array(
			'nama' 		=>$nama,
			'panserword'=>$password,
			'tempat_lahir'	=>$tempat_lahir,
			'tgl_lahir'		=>$tgl_lahir
		);
		$this->db->set($data);
		$this->db->where('unsername',$id_pengguna);
		$this->db->update('tbl_guru');
		// $eksekusi		=$this->db->query("update tbl_guru set nama='$nama',panserword='$password',tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir' where unsername='$id_pengguna'");
		// return $eksekusi;
	}
	public function Update_guru()
	{
		$id_guru 		=$this->input->post('id_guru',TRUE);
		$nama 			=$this->input->post('nama',TRUE);
		$tempat_lahir 	=$this->input->post('tempat_lahir',TRUE);
		$tgl_lahir 		=$this->input->post('tgl_lahir',TRUE);
		$password 		=password_hash($this->input->post('panserword',TRUE),PASSWORD_DEFAULT);
		$data=array(
			'nama' 			=>$nama,
			'tempat_lahir'	=>$tempat_lahir,
			'tgl_lahir' 	=>$tgl_lahir
		);
		$data1=array(
			'nama' 			=>$nama,
			'tempat_lahir'	=>$tempat_lahir,
			'tgl_lahir' 	=>$tgl_lahir,
			'panserword'	=>$password
		);
		if (empty($this->input->post('panserword',TRUE))) {
			$this->db->set($data);
			$this->db->where('id_guru',$id_guru);
			$this->db->update('tbl_guru');
		}
		else{
			$this->db->set($data1);
			$this->db->where('id_guru',$id_guru);
			$this->db->update('tbl_guru');
		}
	}
	public function get_detail_materi($id_materi)
	{
		return $this->db->get_where('tbl_materi',array('id_materi'=>$id_materi));
		
	}
	public function get_data_quiz_kelas($id_tes)
	{
		$this->db->where('id_tes',$id_tes);
		return $this->db->get('tbl_tes_group_kelas');
		// return $this->db->query("select * from tbl_tes_group_kelas where id_tes='$id_tes'");
	}
	public function delete_group_tes_before($id_quiz)
	{
		return $this->db->query("delete from tbl_tes_group_kelas where id_tes='$id_quiz'");
	}
	public function update_tes()
	{
		$this->db->trans_start();
		$id_tes					=$this->input->post('array',TRUE);
		$tes_nama 				=$this->input->post('tes_nama',TRUE);
		$tes_detail				=$this->input->post('tes_detail',TRUE);
		$tes_mulai 				=substr($this->input->post('rentangwaktu',TRUE), 0,19);
		$tes_selesai 			=substr($this->input->post('rentangwaktu',TRUE), -19);
		$durasi_waktu 			=$this->input->post('durasi_waktu',TRUE);
		$tes_score_benar 		=$this->input->post('tes_score_benar', TRUE);
		$tes_jumlah_soal 		=$this->input->post('tes_jumlah_soal',TRUE);
		$tes_score_maksimal 	=$_POST['tes_score_benar'] * $_POST['tes_jumlah_soal'];
		$tes_acak_soal 			=$this->input->post('tes_acak_soal',TRUE);
		$tes_acak_jawaban 		='1';
		$id_topik 				=$this->input->post('id_topik',TRUE);
		$id_kelas				=$this->input->post('id_kelas', TRUE);
		$data=array(
			'tes_nama' 		=>$tes_nama,
			'tes_detail' 	=>$tes_detail,
			'tes_mulai' 	=>$tes_mulai,
			'tes_selesai' 	=>$tes_selesai,
			'durasi_waktu'	=>$durasi_waktu,
			'tes_score_benar'=>$tes_score_benar,
			'tes_score_maksimal'=>$tes_score_maksimal,
			'tes_jumlah_soal'	=>$tes_jumlah_soal,
			'tes_acak_soal'		=>$tes_acak_soal,
			'tes_acak_jawaban'	=>$tes_acak_jawaban,
			'id_topik'			=>$id_topik
		);
		$this->db->set($data);
		$this->db->where('id_tes',$id_tes);
		$this->db->update('tbl_tes');
		// $this->db->query("update tbl_tes set tes_nama='$tes_nama', tes_detail='$tes_detail',tes_mulai='$tes_mulai',tes_selesai='$tes_selesai',durasi_waktu='$durasi_waktu',tes_score_benar='$tes_score_benar',tes_score_maksimal='$tes_score_maksimal',tes_jumlah_soal='$tes_jumlah_soal',tes_acak_soal='$tes_acak_soal' where id_tes='$id_tes'");
		$this->db->where('id_tes',$id_tes);
		$this->db->delete('tbl_tes_group_kelas');
		// $this->db->query("delete from tbl_tes_group_kelas where id_tes='$id_tes'");
		$result=array();
		foreach ($id_kelas as $key => $value) {
			$result[]=array(
				'id_tes' =>$id_tes,
				'id_kelas' =>$_POST['id_kelas'][$key]
			);
		}
		$this->db->insert_batch('tbl_tes_group_kelas',$result);
		$this->db->trans_complete();

	}
	public function Delete_tbl_tes_group_kelas()
	{
		$id_kelas				=$this->input->post('array', TRUE);
		$id_tes 			=$this->input->post('id_tes',TRUE);
		$this->db->where('id_tes',$id_tes);
		$this->db->delete('tbl_tes_group_kelas');
		$result=array();
		foreach ($id_kelas as $key => $value) {
			$result[]=array(
				'id_tes' =>$id_tes,
				'id_kelas' =>$_POST['id_kelas'][$key]
			);
		}
		$this->db->insert_batch('tbl_tes_group_kelas',$result);
		$this->db->trans_complete();
	}
	public function update_tes1($id_quiz)
	{
		$this->db->trans_start();
		$tesnya=$id_quiz;
		$id_kelas =$this->input->post('id_kelas', TRUE);
		//$id_mapel =$this->input->post('id_',TRUE);
		$result=array();
		foreach($id_kelas as $key => $value) {
			$result[]=array(
				'id_tes'	=>$tesnya);
		}
		$this->db->insert_batch('tbl_tes_group_kelas',$result);
		$this->db->trans_complete();
	}
	public function Delete_materi_mapel($id_materi)
	{
		$this->db->where('id_materi',$id_materi);
		$this->db->delete('tbl_materi');
	}
	public function Update_Jawaban()
	{
		$id_jawaban	=$this->input->post('array',TRUE);
		$jawaban 	=$this->input->post('jawaban',TRUE);
		$status_jawaban	=$this->input->post('status_jawaban',TRUE);
		$data=array(
			'jawaban' 		=>$jawaban,
			'status_jawaban'=>$status_jawaban
		);
		$this->db->set($data);
		$this->db->where('id_jawaban',$id_jawaban);
		$this->db->update('tbl_jawaban');
	}
	public function Delete_Jawaban($idjawaban)
	{
		$this->db->where('id_jawaban',$idjawaban);
		$this->db->delete('tbl_jawaban');
	}
	public function Update_list_soal()
	{
		$id_soal=$this->input->post('array',TRUE);
		$soal	=$this->input->post('soal',TRUE);
		$datA=array(
			'soal'	=>$soal
		);
		$this->db->set($datA);
		$this->db->where('id_soal',$id_soal);
		$this->db->update('tbl_soal');
	}
	public function Delete_quiz($idtes)
	{
		$this->db->where('id_tes',$idtes);
		$this->db->delete('tbl_tes');
	}
	public function Import_siswa($data)
	{
		$this->db->insert_batch('tbl_user',$data);
	}
	public function Import_guru($data)
	{
		$this->db->insert_batch('tbl_guru',$data);
	}
}