<section class="content">
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-body">
          <?php 
            $uri=$this->uri->segment(2);
            switch ($uri) {
              case 'Dashboard':
                $this->load->view('adminn/Dashboard.php');
                break;
              case 'Kelas':
                $this->load->view('adminn/Kelas.php');
                break;
              case 'Siswa':
                $this->load->view('adminn/Siswa.php');
                break;
              case 'Topik_soal':
                $this->load->view('adminn/Topik_soal.php');
                break;
              case 'Soal':
                $this->load->view('adminn/Soal.php');
                break;
              case 'Daftar_soal':
                $this->load->view('adminn/Daftar_soal.php');
                break;
              case 'jawaban':
                 $this->load->view('adminn/Jawaban.php','refresh');
                break;
              case 'Mat_pel':
                $this->load->view('adminn/Mat_pel.php');
                break;
              case 'Materi':
                $this->load->view('adminn/Materi.php');
                break;
              case 'List_materi':
                $this->load->view('adminn/List_materi.php');
                break;
              case 'Lihat_soal':
                $this->load->view('adminn/Lihat_soal.php');
                break;
              case 'Quiz':
                $this->load->view('adminn/Quiz.php');
                break;
              case 'Detail_materi':
                $this->load->view('adminn/Detail.php');
                break;
              case 'Tahun_pelajaran':
                $this->load->view('adminn/Tahun_pelajaran.php');
                break;
              case 'Guru':
                $this->load->view('adminn/Guru.php');
                break;
              case 'List_mapel_guru':
                $this->load->view('adminn/List_mapel_guru.php');
                break;
              case 'Daftar_quiz':
                $this->load->view('adminn/Daftar_data_quiz.php');
                break;
              case 'Forum':
                $this->load->view('adminn/Forum.php');
                break;
              case 'Join_forum':
                $this->load->view('adminn/Join_forum.php');
                break;
              case 'Profile':
                $this->load->view('adminn/Profile.php');
                break;
              case 'Detail_materi':
                $this->load->view('adminn/Detail.php');
                break;
              case 'Quiz_edit':
                $this->load->view('adminn/Quiz_edit.php');
                break;
              case 'Import':
                $this->load->view('adminn/Import_siswa');
                break;
              case 'Import_guru':
                $this->load->view('adminn/Import_guru');
                break;
              default:
                $this->load->view('adminn/Dashboard.php');
                break;
            }
          ?>
          </div>
        </div>
      </div>
    </div>
  </div>  
</section>