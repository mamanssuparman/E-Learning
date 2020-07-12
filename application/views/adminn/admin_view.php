<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('_assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('_assets/bower_components/select2/dist/css/select2.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('_assets/bower_components/font-awesome/css/font-awesome.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('_assets/bower_components/Ionicons/css/ionicons.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('_assets/bower_components/bootstrap-daterangepicker/daterangepicker.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('_assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('_assets/plugins/timepicker/bootstrap-timepicker.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('_assets/dist/css/AdminLTE.min.css') ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('_assets/dist/css/skins/_all-skins.min.css') ?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url('_assets/bower_components/morris.js/morris.css') ?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url('_assets/bower_components/jvectormap/jquery-jvectormap.css') ?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url('_assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('_assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('_assets/boot_select/css/bootstrap-select.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('_assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('_assets/alert/css/sweetalert.css') ?>">
<script type="text/javascript" src="<?php echo base_url('_assets/ckeditor/ckeditor.js') ?>"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->




  <!-- jQuery 3 -->
<script src="<?php echo base_url('_assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('_assets/bower_components/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="<?php echo base_url('_assets/plugins/input-mask/jquery.inputmask.js') ?>"></script>
<script src="<?php echo base_url('_assets/plugins/input-mask/jquery.inputmask.date.extensions.js') ?>"></script>
<script src="<?php echo base_url('_assets/plugins/input-mask/jquery.inputmask.extensions.js') ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('_assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('_assets/bower_components/select2/dist/js/select2.full.min.js') ?>"></script>
<script src="<?php echo base_url('_assets/bower_components/raphael/raphael.min.js') ?>"></script>
<script src="<?php echo base_url('_assets/bower_components/morris.js/morris.min.js') ?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('_assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') ?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('_assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
<script src="<?php echo base_url('_assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('_assets/bower_components/jquery-knob/dist/jquery.knob.min.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('_assets/bower_components/moment/min/moment.min.js') ?>"></script>
<script src="<?php echo base_url('_assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
<!-- datepicker -->
<script src="<?php echo base_url('_assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') ?>"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url('_assets/plugins/timepicker/bootstrap-timepicker.min.js') ?>"></script>
<script src="<?php echo base_url('_assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('_assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('_assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('_assets/bower_components/fastclick/lib/fastclick.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('_assets/dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('_assets/dist/js/pages/dashboard.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('_assets/dist/js/demo.js') ?>"></script>
<script src="<?php echo base_url('_assets/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('_assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('_assets/boot_select/js/bootstrap-select.js');?>"></script>
<script src="https://js.pusher.com/4.4/pusher.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <?php 
      $this->load->view('adminn/_partials/Navigation_up.php');
    ?>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('_assets/default.jpg') ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
          <?php 
            foreach ($data_pengguna->result_array() as $showpengguna) {
              echo $showpengguna['nama'];
            }
          ?>
          
          </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php 
          $this->load->view('adminn/_partials/Navigation.php');
        ?>

    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <b><?php echo $judul ?></b>
        <small><?php echo $subjudul ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $judul ?></a></li>
        <li class="active"><?php echo $subjudul ?></li>
      </ol>
      <?php echo validation_errors('<div class="error">', '</div>') ?>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php 
        $this->load->view('adminn/_partials/Content.php');
      ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2020 <a href="http://smkn3-banjar.sch.id/">OmenSoft</a>.</strong> All rights
    reserved.
    Template By <strong>AdminLTE</strong>
  </footer>

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php
  
?>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('yyyy/mm/dd', { 'placeholder': 'yyyy/mm/dd' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'YYYY-MM-DD hh:mm:ss'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>

<script type="text/javascript">
		$(document).ready(function(){
			$('.bootstrap-select').selectpicker();

			//GET UPDATE
			$('.update-record').on('click',function(){
				var package_id = $(this).data('id_mapel');
				var package_name = $(this).data('nama_mapel');
				$(".strings").val('');
				$('#UpdateModal').modal('show');
				$('[name="edit_id"]').val(package_id);
				$('[name="package_edit"]').val(package_name);
                //AJAX REQUEST TO GET SELECTED PRODUCT
                $.ajax({
                    url: "<?php echo site_url('Mat_pel');?>",
                    method: "POST",
                    data :{package_id:package_id},
                    cache:false,
                    success : function(data){
                        var item=data;
                        var val1=item.replace("[","");
                        var val2=val1.replace("]","");
                        var values=val2;
                        $.each(values.split(","), function(i,e){
                            $(".strings option[value='" + e + "']").prop("selected", true).trigger('change');
                            $(".strings").selectpicker('refresh');
                        });
                    }
                });
                return false;
			});
			//GET CONFIRM DELETE
			$('.delete-record').on('click',function(){
				var package_id = $(this).data('package_id');
				$('#DeleteModal').modal('show');
				$('[name="delete_id"]').val(package_id);
			});
		});
  </script>


    <?php 
        if ($this->session->flashdata('berhasil')) { ?>
            <script type='text/javascript'>
                setTimeout(function () { 
                    swal({
                        title: 'Berhasil',
                        text:  '<?php echo $this->session->flashdata('berhasil'); ?>',
                        type: 'success',
                        timer: 1500,
                        showConfirmButton: false
                    });		
                },10);	
            </script>";

    <?php    }
    ?>
    <?php 
        if ($this->session->flashdata('gagal')) { ?>
            <script type='text/javascript'>
                setTimeout(function () { 
                    swal({
                        title: 'Gagal',
                        text:  '<?php echo $this->session->flashdata('gagal'); ?>',
                        type: 'warning',
                        timer: 1500,
                        showConfirmButton: false
                    });		
                },10);	
            </script>";

    <?php    }
    ?>
  

  
  <script src="<?php echo base_url('_assets/alert/js/sweetalert.min.js') ?>"></script>
  <script src="<?php echo base_url('_assets/alert/js/qunit-1.18.0.js') ?>"></script>
  
</body>
</html>
