<div class="content">
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <?php 
          $uri=$this->uri->segment(2);
          switch ($uri) {
            case 'Materi':
              $this->load->view('user/Materi.php');
              break;
            case 'Profile':
              $this->load->view('user/Profil.php');
              break;
            case 'List_tugas':
              $this->load->view('user/List_tugas.php');
              break;
            case 'Diskusi':
              $this->load->view('user/Diskusi.php');
              break;
            default:
              $this->load->view('user/Menu_utama.php');
              break;
          }
            
          ?>
        </div>
      </div>
    </div>
  </div>
  <!-- /.row -->
</div><!-- /.container-fluid -->
</div>