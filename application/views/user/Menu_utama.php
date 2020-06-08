<!-- Start Box Menus 1- -->
<div class="row">
  <div class="col-lg-6 col-6">
    <!-- small card -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h2>Materi Pelajaran</h2>

        <p></p>
      </div>
      <div class="icon">
        <i class="fa fa-book"></i>
      </div>
      <a href="<?php echo base_url();?>index.php/user/Materi/" class="small-box-footer">
        More <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <div class="col-lg-6 col-6">
    <!-- small card -->
    <div class="small-box bg-red">
      <div class="inner">
        <h2>Quiz / Ulangan</h2>

        <p></p>
      </div>
      <div class="icon">
        <i class="fa fa-edit"></i>
      </div>
      <a href="<?php echo base_url();?>index.php/user/Quiz/" class="small-box-footer">
        More <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
</div>
<!-- End Box menus 1 -->
<!-- Start Box Menus 2 -->
<div class="row">
  <div class="col-lg-4 col-4">
    <!-- small card -->
    <div class="small-box bg-blue">
      <div class="inner">
        <h2>Video Pembelajaran</h2>

        <p></p>
      </div>
      <div class="icon">
        <i class="fa fa-desktop"></i>
      </div>
      <a href="#" class="small-box-footer">
        More <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <div class="col-lg-4 col-4">
    <!-- small card -->
    <div class="small-box bg-green">
      <div class="inner">
        <h2>Profile</h2>

        <p></p>
      </div>
      <div class="icon">
        <i class="fa fa-user"></i>
      </div>
      <a href="<?php echo base_url();?>index.php/user/Profile/" class="small-box-footer">
        More <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <div class="col-lg-4 col-4">
    <!-- small card -->
    <div class="small-box bg-blue">
      <div class="inner">
        <h2>Class Diskusi</h2>

        <p></p>
      </div>
      <div class="icon">
        <i class="fa fa-comments"></i>
      </div>
      <a href="<?php echo base_url();?>index.php/user/Diskusi/index/<?php echo $this->session->userdata('kelas');?>" class="small-box-footer">
        More <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
</div>
<!-- End Box Menus 2 -->