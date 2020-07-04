<div class="flash-data" data-flashdataok="<?php echo $this->session->flashdata('berhasil');?>"></div>
<div class="row">
	<div class="col-md-12">
		<h4>Daftar Data Nama Siswa Kelas :</h4>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
		<table id="example1" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th width="50" align="center">No</th>
					<th width="600">Nama Siswa</th>
					<th width="200">Jenis Kelamin</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no=1;
                    foreach ($data_siswa->result_array() as $tampilkan) : ?>
                     <tr>
                         <td><?php echo $no++; ?></td>
						 <td><?php echo $tampilkan['nama_siswa'] ?></td>
						 <td><?php echo $tampilkan['jenis_kelamin'] ?></td>
						 <td>
						 	<button type="button" class="btn btn-warning btn-xs" title="Lihat Data Siswa" data-toggle="modal" data-target="#modal-lihat"> <li class="fa fa-search"></li> </button>
						 </td>
                     </tr>   
					<?php    endforeach;
                ?>
			</tbody>
		</table>
		</div>
	</div>
</div>

<!-- Modal Lihat Detail Siswa -->
<?php 
	foreach ($data_siswa->result_array() as $tampilkan):
?>
<div class="modal fade" id="modal-lihat">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Detail Data Siswa</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <div class="modal-body">
			<p>Nama </p>
			<p>
				<?php 
					echo '<b>'. $tampilkan['nama_siswa'].' </b>';
				?>
			</p>
			<p>Tempat Lahir</p>
			<p>
				<?php
					echo '<b>'.$tampilkan['tempat_lahir'].'</b>' ;
				?>
			</p>
			<p>Tanggal Lahir</p>
			<p>
				<?php 
					echo '<b>'. $tampilkan['tanggal_lahir'].'</b>';
				?>
			</p>
			<p>Jenis Kelamin</p>
			<p>
				<?php 
					echo '<b>'. $tampilkan['jenis_kelamin'].'</b>';
				?>
			</p>
		</div>
	  </div>
	  <!-- /.modal-content -->
	</div>
<!-- /.modal-dialog -->
</div>
<?php 
	endforeach;
?>
<!-- Akhir Modal Lihat Siswa -->