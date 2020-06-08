<div class="flash-data" data-flashdataok="<?php echo $this->session->flashdata('berhasil');?>"></div>
<div class="row">
	<div class="col-md-12">
		<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i> Add Kelas</button>			
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		<table id="example1" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th width="50" align="center">No</th>
					<th width="600">Kelas</th>
					<th width="350">Jumlah Siswa</th>
					<th>Tahun Pelajaran</th>
					<th width="200">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no=1;
					foreach ($data_kelas->result() as $show): ?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $show->nama_kelas ;?></td>
					<td><?php echo $show->jumlah_siswa ; ?></td>
					<td><?php echo $show->nama_tapel; ?></td>
					<td>
					<button class="btn btn-xs btn-success" title="Edit Kelas" data-toggle="modal" data-target="#modal-edit-<?php echo $show->id_kelas; ?>"><li class="fa fa-edit"></li></button>
					<button class="btn btn-xs btn-danger" title="Hapus Kelas" data-toggle="modal" data-target="#modal-hapus-<?php echo $show->id_kelas; ?>"><li class="fa fa-times"></li></button>
					</td>
				</tr>		
				<?php endforeach;
				?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal Tambah Kelas -->
<div class="modal fade" id="modal-tambah">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Tambah Kelas</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <form method="post" action="<?php echo base_url();?>index.php/adminn/Kelas/Add/">
	    <div class="modal-body">
	      <p>
	      	Nama Kelas
	      </p>
	      <p>
	      	<input type="text" name="kelas" class="form form-control" required placeholder="Contoh : XRPL1">
	      </p>
	      <p>Tahun Pelajaran</p>
	      	<select name="id_tapel" class="form form-control">
	      		<?php 
	      			foreach ($data_tapel->result_array() as $showtapel):
	      				echo "<option value='$showtapel[id_tapel]'>$showtapel[nama_tapel]</option>";
	      			endforeach;
	      		?>
	      	</select>
	    </div>
	    <div class="modal-footer justify-content-between">
	      <button type="button" class="btn btn-danger" data-dismiss="modal"><li class="fa fa-undo"></li> Batal</button>
	      <button type="submit" class="btn btn-success"><li class="fa fa-save"></li> Simpan</button>
	    </div>
	    </form>
	  </div>
	  <!-- /.modal-content -->
	</div>
<!-- /.modal-dialog -->
</div>

<!-- Modal Edit Kelas -->
<?php 
	foreach ($data_kelas->result() as $show) : ?>

<div class="modal fade" id="modal-edit-<?php echo $show->id_kelas ?>">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Edit Data Kelas</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <form method="post" action="<?php echo base_url();?>index.php/adminn/Kelas/Update/">
	    <div class="modal-body">
	    	<p>
	    		<input type="hidden" name="id_kelas" value="<?php echo $show->id_kelas ?>">
	    	</p>
	      <p>
	      	Nama Kelas
	      </p>
	      <p>
	      	<input type="text" name="kelas" class="form form-control" required value="<?php echo $show->nama_kelas ;?>">
	      </p>
	    </div>
	    <div class="modal-footer justify-content-between">
	      <button type="button" class="btn btn-danger" data-dismiss="modal"><li class="fa fa-undo"></li> Batal</button>
	      <button type="submit" class="btn btn-success"><li class="fa fa-save"></li> Perbaharui</button>
	    </div>
	    </form>
	  </div>
	  <!-- /.modal-content -->
	</div>
<!-- /.modal-dialog -->
</div>
<?php	endforeach;
?>
<!-- Modal Hapus Kelas -->
<?php 
	foreach ($data_kelas->result() as $show) : ?>

<div class="modal fade" id="modal-hapus-<?php echo $show->id_kelas ?>">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Hapus Data Kelas</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <form method="post" action="<?php echo base_url();?>index.php/adminn/Kelas/Delete/">
	    <div class="modal-body">
	    	<p>
	    		<input type="hidden" name="id_kelas" value="<?php echo $show->id_kelas ?>">
	    	</p>
	      <p>
	      	Apakah anda yakin akan menghapus data kelas <b><?php echo $show->nama_kelas ;?></b> .!!
	      </p>
	      <p>
	      	<b>NB :</b> Jika anda menghapus kelas,semua data siswa dan hasil ujian akan ikut terhapus.!!!
	      </p>
	    </div>
	    <div class="modal-footer justify-content-between">
	      <button type="button" class="btn btn-danger" data-dismiss="modal"><li class="fa fa-undo"></li> Batal</button>
	      <button type="submit" class="btn btn-success"><li class="fa fa-recycle"></li> Hapus</button>
	    </div>
	    </form>
	  </div>
	  <!-- /.modal-content -->
	</div>
<!-- /.modal-dialog -->
</div>
<?php	endforeach;
?>