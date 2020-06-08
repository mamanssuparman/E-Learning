<div class="flash-data" data-flashdataok="<?php echo $this->session->flashdata('berhasil');?>">
</div>
<div class="row">
  <div class="col-lg-3 col-3">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <?php 
        	foreach ($sum_data_soal->result_array() as $showsumsoal):
        ?>

        <h3><?php echo $showsumsoal['jumlah_soal']; ?></h3>

        <p>Bank Soal</p>
        <?php 
        	endforeach;
        ?>
      </div>
      <div class="icon">
        <i class="fa fa-clone"></i>
      </div>
      <a href="<?php echo base_url();?>index.php/adminn/Daftar_soal/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-3">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <?php 
        	foreach ($sum_data_materi->result_array() as $showsummateri):
        ?>

        <h3><?php echo $showsummateri['jumlah_materi']; ?></h3>

        <p>Jumlah Materi</p>
        <?php 
        	endforeach;
        ?>
      </div>
      <div class="icon">
        <i class="fa fa-edit"></i>
      </div>
      <a href="<?php echo base_url();?>index.php/adminn/List_materi/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-3">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <?php 
        	foreach ($sum_data_mapel->result_array() as $showsummapel):
        ?>

        <h3><?php echo $showsummapel['jumlah_mapel'] ?></h3>

        <p>Jumlah Mapel</p>
        <?php 
        	endforeach;
        ?>
      </div>
      <div class="icon">
        <i class="fa fa-book"></i>
      </div>
      <a href="<?php echo base_url();?>index.php/adminn/Mat_pel/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-3">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <?php 
        	foreach ($sum_data_siswa->result_array() as $showsumsiswa):
        ?>
        <h3><?php echo $showsumsiswa['jumlah_siswa'] ?></h3>

        <p>Jumlah Siswa</p>
      </div>
      <?php 
      	endforeach;
      ?>
      <div class="icon">
        <i class="fa fa-users"></i>
      </div>
      <a href="<?php echo base_url();?>index.php/adminn/Siswa/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="card">
		<div class="card-header border-transparent">
		<h3 class="card-title">Data Quiz Terakhir Di Tambahkan</h3>

		<div class="card-tools">
		  <button type="button" class="btn btn-tool" data-card-widget="collapse">
		    <i class="fas fa-minus"></i>
		  </button>
		  <button type="button" class="btn btn-tool" data-card-widget="remove">
		    <i class="fas fa-times"></i>
		  </button>
		</div>
		</div>
		<!-- /.card-header -->
		<div class="card-body p-0">
		<div class="table-responsive">
		  <table class="table m-0">
		    <thead>
		    <tr>
		      <th>Nama Quiz</th>
		      <th>Nilai Maksimal</th>
		      <th>Waktu Mulai</th>
		      <th>Waktu Selesai</th>
		      <th>Durasi Waktu</th>

		    </tr>
		    </thead>
		    <tbody>
		    
		    </tbody>
		  </table>
		</div>
		<!-- /.table-responsive -->
		</div>
		<!-- /.card-body -->
		<div class="card-footer clearfix">
		<a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Buat Quiz</a>
		<a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">Lihat Semua Daftar Quiz</a>
		</div>
		<!-- /.card-footer -->
		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
		<div class="card-header">
		<h3 class="card-title">Materi Terakhir Di Tambahkan</h3>

		<div class="card-tools">
		  <button type="button" class="btn btn-tool" data-card-widget="collapse">
		    <i class="fas fa-minus"></i>
		  </button>
		  <button type="button" class="btn btn-tool" data-card-widget="remove">
		    <i class="fas fa-times"></i>
		  </button>
		</div>
		</div>
		<!-- /.card-header -->
		<div class="card-body p-0">
		<ul class="products-list product-list-in-card pl-2 pr-2">
		
		  <!-- /.item -->
		</ul>
		</div>
		<!-- /.card-body -->
		<div class="card-footer text-center">
		<a href="javascript:void(0)" class="uppercase">Lihat Semua Materi</a>
		</div>
		<!-- /.card-footer -->
		</div>
	</div>
</div>