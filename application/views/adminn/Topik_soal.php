<div class="flash-data" data-flashdataok="<?php echo $this->session->flashdata('berhasil');?>">
</div>
<div class="row">
	<div class="col-md-12">
		<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i> Add Topik</button>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
		<table id="example1" class="table table-bordered table-hover table-nowrap fluid">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Topik</th>
					<th>Deskripsi</th>
					<th>Jumlah Soal</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$no=1;
					foreach ($data_topik->result_array() as $showtopik) : ?>
					<tr>
						<td><?php echo $no++ ; ?></td>
						<td><?php echo $showtopik['topik_nama'] ;?></td>
						<td><?php echo $showtopik['topik_detail'] ;?></td>
						<td><?php echo $showtopik['jumlah_soal'] ;?></td>
						<td>
						<button class="btn btn-xs btn-success" title="Edit Topik" data-toggle="modal" data-target="#modal-edit-<?php echo $showtopik['id_topik']; ?>"><li class="fa fa-edit"></li></button>
						<button class="btn btn-xs btn-danger" title="Hapus Topik" data-toggle="modal" data-target="#modal-hapus-<?php echo $showtopik['id_topik']; ?>"><li class="fa fa-times"></li></button>
						<a href="<?php echo base_url();?>index.php/adminn/Soal/index/<?php echo $showtopik['id_topik'];?>"><button class="btn btn-xs btn-success" title="Tambah Soal" ><li class="fa fa-plus"></li></button></a>
						<a href="<?php echo base_url();?>index.php/adminn/Lihat_soal/index/<?php echo $showtopik['id_topik'];?>"><button class="btn btn-xs btn-warning" title="Lihat Soal" ><li class="fa fa-search"></li></button></a>
						</td>
					</tr>	
				<?php	endforeach;
				?>
			</tbody>
		</table>
		</div>
	</div>
</div>

<!-- Modal tambah Topik -->
<div class="modal fade" id="modal-tambah">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Tambah Data Topik</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <form method="POST" action="<?php echo base_url();?>index.php/adminn/Topik_soal/Add/">
	    <div class="modal-body">
	      <p>
	      	MaPel
	      </p>
	      <p>
	      	<select name="id_mapel" class="form form-control">
	      		<?php
	      			foreach ($data_mapel->result_array() as $showmapel):
	      				echo "<option value='$showmapel[id_mapel]'>$showmapel[nama_mapel]</option>";
	      			endforeach;
	      		?>
	      	</select>
	      </p>
	      <p>
	      	Nama Topik
	      </p>
	      <p>
	      	<input type="text" name="topik_nama" class="form form-control" required autocomplete="false">
	      </p>
	      <p>
	      	Deskripsi 
	      </p>
	      <p>
	      	<input type="text" name="topik_detail" class="form form-control" required>
	      </p>
	    </div>
	    <div class="modal-footer justify-content-between">
	      <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
	      <button type="submit" class="btn btn-success">Simpan</button>
	    </div>
	    </form>
	  </div>
	  <!-- /.modal-content -->
	</div>
<!-- /.modal-dialog -->
</div>

<!-- Modal Edit Topik -->
<?php 
	foreach ($data_topik->result_array() as $showtopik) :
?>
<div class="modal fade" id="modal-edit-<?php echo $showtopik['id_topik'];?>">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Update Data Topik</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <form method="POST" action="<?php echo base_url();?>index.php/adminn/Topik_soal/Update/">
	    <div class="modal-body">
	    	<p>
	    		<input type="hidden" name="id_topik" value="<?php echo $showtopik['id_topik'];?>">
	    	</p>
	      <p>
	      	Nama Topik
	      </p>
	      <p>
	      	<input type="text" name="topik_nama" class="form form-control" required autocomplete="false" value="<?php echo $showtopik['topik_nama'] ;?>">
	      </p>
	      <p>
	      	Deskripsi 
	      </p>
	      <p>
	      	<input type="text" name="topik_detail" class="form form-control" required value="<?php echo $showtopik['topik_detail'];?>">
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
<?php 
	endforeach;
?>

<!-- Modal Hapus Topik -->
<?php 
foreach ($data_topik->result_array() as $showtopik) :
?>
<div class="modal fade" id="modal-hapus-<?php echo $showtopik['id_topik'];?>">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Hapus Data Topik</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <form method="POST" action="<?php echo base_url();?>index.php/adminn/Topik_soal/Delete/">
	    <div class="modal-body">
	      <input type="hidden" name="id_topik" value="<?php echo $showtopik['id_topik'] ;?>">
	      <p>
	      	Apakah anda yakin akan menghapus data topik <b><?php echo $showtopik['topik_nama'] ;?></b>
	      </p>
	      <p>
	      	<b>NB : </b>Jika anda menghapus data topik tersebut, maka soal dan hasil ujian siswa akan ikut terhapus.!!
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