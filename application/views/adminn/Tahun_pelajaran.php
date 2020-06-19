
<?php echo validation_errors();?>
<div class="row">
	<div class="col-md-12">
		<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i> Add Tahun Pelajaran</button>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		<table id="example1" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th width="50" align="center">No</th>
					<th width="600">Tahun Pelajaran</th>
					<th width="200">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no=1;
					foreach ($data_tapel->result_array() as $showtapel):
						echo "<tr>";
							echo '<td>'.$no++.'</td>';
							echo "<td> $showtapel[nama_tapel]</td>";
							echo "<td><button class='btn btn-danger btn-xs' title='Hapus Tahun Pelajaran' data-toggle='modal' data-target='#modal-hapus-$showtapel[id_tapel]'><li class='fa fa-times'></li></button></td>";
						echo "</tr>";
					endforeach;
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
	      <h4 class="modal-title">Tambah Tahun Pelajaran</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <form method="post" action="<?php echo base_url();?>index.php/admin/Tahun_pelajaran/Simpan">
	    <div class="modal-body">
	      <p>
	      	Nama Tahun Pelajaran
	      </p>
	      <p>
	      	<input type="text" name="nama_tapel" class="form form-control" required placeholder="Contoh : 2020/2021">
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
<!-- Modal Hapus Tapel -->
<?php 
foreach ($data_tapel->result_array() as $showtapel):
?>
<div class="modal fade" id="modal-hapus-<?php echo $showtapel['id_tapel'] ?>">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Hapus Tahun Pelajaran</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <form method="post" action="<?php echo base_url();?>index.php/admin/Tahun_pelajaran/Hapus">
	    <div class="modal-body">
	    	<input type="hidden" name="id_tapel" value="<?php echo $showtapel['id_tapel'] ?>">
	      <p>
	      	Apakah anda yakin akan menghapus Data tahun pelajaran <b> <?php echo $showtapel['nama_tapel'] ;?> </b>
	      </p>
	      <p>NB :</p>
	      <p>Jika anda menghapus data tahun pelajaran maka data siswa pada tahun pelajaran tersebut akan ikut terhapus.!!</p>
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