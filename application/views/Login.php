<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Learning</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('_assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('_assets/bower_components/font-awesome/css/font-awesome.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('_assets/bower_components/Ionicons/css/ionicons.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('_assets/dist/css/AdminLTE.min.css') ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('_assets/dist/css/skins/_all-skins.min.css') ?>">

</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-brand"><b>E-Learning</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-6">
            <div class="box box-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-aqua-active">
                <h3 class="widget-user-username">Login User/Siswa</h3>
                <h5 class="widget-user-desc">SMK Negeri 3 Banjar</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle" src="<?php echo base_url('_assets/default.jpg') ?>" alt="User Avatar">
              </div>
              <div class="box-footer">
                <div class="row">
                  <div class="col-sm-3">
                    
                  </div>
                  <div class="col-sm-6">
                    <div class="description-block">
                     <form method="POST" action="<?=base_url('Login_user');?>">
                      <?php if ($this->session->flashdata('eror')): ?>
                        <p>
                          <div class="alert alert-danger alert-dismissible">
                            <?=$this->session->flashdata('eror');?>  
                          </div>
                        </p>    
                      <?php endif ?>  
                     <p>
                       <input type="text" name="username" class="form-control" placeholder="Username">
                       <?=form_error('username','<small style="margin-left:-80px" class="text-danger">','</small>')?>
                     </p>
                     <p>
                       <input type="password" name="password" class="form-control" placeholder="Password">
                       <?=form_error('password','<small style="margin-left:-80px" class="text-danger">','</small>')?>
                     </p>
                     <p>
                      <input type="submit" name="submit" class="btn btn-primary btn-md pull-right" value="Login">
                     </p>
                     </form>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <div class="col-sm-3">
                    
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="box box-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-yellow-active">
                <h3 class="widget-user-username">Login User/Guru</h3>
                <h5 class="widget-user-desc">SMK Negeri 3 Banjar</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle" src="<?php echo base_url('_assets/default.jpg') ?>" alt="User Avatar">
              </div>
              <div class="box-footer">
                <div class="row">
                  <div class="col-sm-3">
                    
                  </div>
                <form method="POST" action="<?php echo base_url();?>index.php/Login_guru/Cek_user/">
                  <div class="col-sm-6">
                    <div class="description-block">
                     <p>
                       <input type="text" name="username" class="form-control" placeholder="Username">
                     </p>
                     <p>
                       <input type="password" name="password" class="form-control" placeholder="Password">
                     </p>
                     <p>
                      <input type="submit" name="submit" class="btn btn-primary btn-md pull-right" value="Login">
                     </p>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <div class="col-sm-3">
                </form>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
      </div>
      <strong>Copyright &copy; 2020 <a href="http://smkn3-banjar.sch.id">ICT SMK Negeri 3 Banjar</a>.</strong> All rights
      reserved.
      Template By AdminLTE
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('_assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('_assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('_assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('_assets/bower_components/fastclick/lib/fastclick.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('_assets/dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('_assets/dist/js/demo.js') ?>"></script>
<script>
$(function() {
    notifikasi();
});

var notifikasi = (e) => {
  var alertNya = $('.alert');
    setTimeout(function() {
        alertNya.slideUp('slow');
    }, 2000);
}
</script>
</body>
</html>
