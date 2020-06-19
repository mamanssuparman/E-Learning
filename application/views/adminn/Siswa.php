<div class="flash-data" data-flashdataok="<?php echo $this->session->flashdata('berhasil');?>">
</div>
<div class="row">
	<div class="col-md-12">
		<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i> Add Siswa</button>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		<table id="example1" class="table table-bordered table-hover table-nowrap">
			<thead>
				<tr>
					<th>No</th>
					<th>Username</th>
					<th>Nama</th>
					<th>Kelas</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no=1;
					foreach ($data_siswa->result() as $show): ?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $show->username ;?></td>
					<td><?php echo $show->nama_siswa ;?></td>
					<td><?php echo $show->nama_kelas ;?></td>
					<td>
					<button class="btn btn-xs btn-success" title="Edit Kelas" data-toggle="modal" data-target="#modal-edit-<?php echo $show->id_user; ?>"><li class="fa fa-edit"></li></button>
					<button class="btn btn-xs btn-danger" title="Hapus Kelas" data-toggle="modal" data-target="#modal-hapus-<?php echo $show->id_user; ?>"><li class="fa fa-times"></li></button>
					</td>
				</tr>		
				<?php endforeach;
				?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal tambah siswa -->
<div class="modal fade" id="modal-tambah">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Tambah Data Siswa</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <form method="POST" action="<?php echo base_url();?>index.php/admin/Siswa/Simpan">
	    <div class="modal-body">
	      <p>
	      	Nama Siswa
	      </p>
	      <p>
	      	<input type="text" name="nama" class="form form-control" required autocomplete="false">
	      </p>
	      <p>
	      	NIS
	      </p>
	      <p>
	      	<input type="text" name="username" class="form form-control" required>
	      </p>
	      <p>
	      	Password 
	      </p>
	      <p>
	      	<input type="password" name="password" class="form form-control" required maxlength="7">
	      </p>
	      <p>
	      	Kelas
	      </p>
	      <p>
	      	<select name="Kelas" class="form-control">
	      		<?php 
	      			foreach ($data_kelas->result_array() as $showkelas) {
	      				echo "<option value='$showkelas[id_kelas]'>$showkelas[nama_kelas]</option>";
	      			}
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
</div>

<!-- Modal Edit Siswa -->
<?php 
	foreach ($data_siswa->result() as $show) :
?>
<div class="modal fade" id="modal-edit-<?php echo $show->id_user ;?>">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Tambah Data Siswa</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <form method="POST" action="<?php echo base_url();?>index.php/admin/Siswa/Perbaharui">
	    <div class="modal-body">
	    	<p>
	    		<input type="hidden" name="id_user" value="<?php echo $show->id_user ;?>">
	    	</p>
	      <p>
	      	Nama Siswa
	      </p>
	      <p>
	      	<input type="text" name="nama" class="form form-control" required value="<?php echo $show->nama_siswa ;?>">
	      </p>
	      <p>
	      	NIS
	      </p>
	      <p>
	      	<input type="text" name="username" class="form form-control" disabled required value="<?php echo $show->username ;?>">
	      </p>
	      <p>
	      	Password 
	      </p>
	      <p>
	      	<input type="password" name="password" class="form form-control" required maxlength="7" value="<?php echo $show->panserword2 ;?>">
	      </p>
	      <p>
	      	Kelas
	      </p>
	      <p>
	      	<select name="Kelas" class="form-control">
	      		<option value="<?php echo $show->id_kelas;?>"><?php echo $show->nama_kelas;?></option>
	      		<?php 
	      			foreach ($data_kelas->result_array() as $showkelas) {
	      				echo "<option value='$showkelas[id_kelas]'>$showkelas[nama_kelas]</option>";
	      			}
	      		?>
	      	</select>
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
<?php 
	endforeach;
?>

<!-- Modal Hapus Siswa -->
<?php 
	foreach ($data_siswa->result() as $show) :
?>
<div class="modal fade" id="modal-hapus-<?php echo $show->id_user ;?>">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Hapus Data Siswa</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <form method="POST" action="<?php echo base_url();?>index.php/admin/Siswa/Hapus">
	    <div class="modal-body">
	    	<p>
	    		<input type="hidden" name="id_user" value="<?php echo $show->id_user ;?>">
	    	</p>
	    	<p>
	    		Apakah anda yakin akan menghapus data Siswa <b><?php echo $show->nama_siswa ;?></b>
	    	</p>
	    	<p>
	    		<b>NB : </b>Jika anda menghapus data siswa tersebut, maka data hasil ujian atau quiz dari siswa tersebut akan ikut terhapus.!!
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
<?php
	endforeach;
?>