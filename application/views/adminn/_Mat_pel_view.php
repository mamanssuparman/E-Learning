<div class="row">
	<div class="col-md-12">
		<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i> Add MatPel</button>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		<table id="example1" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama MAPEL</th>
					<th>Deskripsi</th>
					<th>Jumlah Materi</th>
					<th>Action</th>
				</tr>
			</thead>
				<?php
					$no=1;
					foreach ($data_mat_pel->result_array() as $showmatpel) : ?>
					<tr>
						<td><?php echo $no++ ; ?></td>
						<td><?php echo $showmatpel['nama_mapel'] ;?></td>
						<td><?php echo $showmatpel['deskripsi'] ;?></td>
						<td><?php echo $showmatpel['jumlah_materi'];?></td>
						<td>
						<a href="<?php echo base_url();?>index.php/admin/Mat_pel/Updater/<?php echo $showmatpel['id_mapel'];?>" class="btn btn-info btn-xs" title="Edit Mapel" ><li class="fa fa-edit"></li></a>
						<a href="#" class="btn btn-danger btn-xs" title="Hapus Mapel" data-toggle="modal" data-target="#modal-hapus-<?php echo $showmatpel['id_mapel'];?>"><li class="fa fa-times"></li> </a>
						<a href="<?php echo base_url();?>index.php/admin/Materi/Add/<?php echo $showmatpel['id_mapel'];?>"><button class="btn btn-xs btn-warning" title="Buat Materi"><li class="fa fa-book"></li></button></a>
						<a href="<?php echo base_url();?>index.php/admin/Materi/List_Materi/<?php echo $showmatpel['id_mapel'];?>" class='btn btn-success btn-xs' title="Lihat Detail Materi" ><li class="fa fa-search"></li> </a>
						</td>
					</tr>	
				<?php	endforeach;	
				?>
		</table>
	</div>
</div>
<!-- Modal tambah Pelajaran -->
<div class="modal fade" id="modal-tambah">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Tambah Materi Pelajaran</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <form method="POST" action="<?php echo base_url();?>index.php/admin/Mat_pel/Simpan">
	    <div class="modal-body">
	      <p>
	      	Nama Mapel
	      </p>
	      <p>
	      	<input type="text" name="nama_mapel" class="form form-control" required autocomplete="OFF">
	      </p>
	      <p>
	      	Deskripsi 
	      </p>
	      <p>
	      	<textarea class="form form-control" cols="5" rows="2" name="deskripsi" required=""></textarea>
	      </p>
	      <p>
	      	Kelas
	      </p>
	      <p>
	      	 <select multiple="multiple" data-placeholder="Pilih Kelas" style="width: 100%;" required name="id_kelas[]">
	      		<?php 
	      			foreach ($data_kelas->result_array() as $showkelas):
	      				echo "<option value='$showkelas[id_kelas]'>$showkelas[nama_kelas] [$showkelas[jumlah_siswa]]</option>";
	      			endforeach;
	      		?>
	      	</select>
	      </p>
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

<!-- Modal Edit Pelajaran -->
<form action="<?php echo site_url('package/update');?>" method="post">
	<div class="modal fade" id="UpdateModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Update Package</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Package</label>
				<div class="col-sm-10">
					<input type="text" name="package_edit" class="form-control" placeholder="Package Name" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Product</label>
				<div class="col-sm-10">
					<select class="bootstrap-select strings" name="product_edit[]" data-width="100%" data-live-search="true" multiple required>
						
					</select>
				</div>
			</div>

			</div>
			<div class="modal-footer">
			<input type="hidden" name="edit_id" required>
			<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-success btn-sm">Update</button>
			</div>
		</div>
		</div>
	</div>
</form>

<!-- Modal Hapus Pelajaran -->
<?php 
	foreach ($data_mat_pel->result_array() as $showmatpel):
?>
<div class="modal fade" id="modal-hapus-<?php echo $showmatpel['id_mapel'] ?>">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Hapus Data Materi Pelajaran</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <form method="POST" action="<?php echo base_url();?>index.php/admin/Mat_pel/Hapus">
	    <div class="modal-body">
	    	<input type="hidden" name="id_mapel" value="<?php echo $showmatpel['id_mapel'];?>">
	     <p>
	     	Apakah anda yakin akan menghapus data pelajaran <b><?php echo $showmatpel['nama_mapel'];?></b> ???
	     </p>
	    </div>
	    <div class="modal-footer justify-content-between">
	      <button type="button" class="btn btn-danger" data-dismiss="modal"><li class="fa fa-undo"></li> Batal</button>
	      <button type="submit" class="btn btn-warning"><li class="fa fa-times"></li> Hapus</button>
	    </div>
	    </form>
	  </div>
	  <!-- /.modal-content -->
	</div>
<!-- /.modal-dialog -->
</div>
<?php endforeach; ?>