<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
        <?php 
          $uri=$this->uri->segment(3);
          switch ($uri) {
            case 'detail':
              $this->load->view('user/_materi_detail.php');
              break;
            case 'detailb':
              $this->load->view('user/_materi_detailb.php');
              break;
            default:
              $this->load->view('user/_materi_1.php');
              break;
          }
        ?>
      </div>
    </div>
  </div>
</div>
