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
                $this->load->view('guru/Dashboard');
                break;
              case 'Kelas':
                $this->load->view('guru/Kelas');
                break;
              case 'Mat_pel':
                $this->load->view('guru/Mat_pel_view');
                break;
              default:
                $this->load->view('guru/Dashboard');
                break;
            }
          ?>
          </div>
        </div>
      </div>
    </div>
  </div>  
</section>