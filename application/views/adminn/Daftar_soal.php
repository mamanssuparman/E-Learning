<div class="flash-data" data-flashdataok="<?php echo $this->session->flashdata('berhasil');?>">
</div>
<p>
	<h3>List Data Bank Soal</h3>
</p>
&nbsp;
<div class="row">
	<div class="col-md-12">
		<button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus"></i> Add Soal</button>
		<table id="example1" class="table table-bordered table-hover table-nowrap">
			<thead>
				<tr>
					<th>No</th>
					<th>Soal</th>
					<th>Topik Soal</th>
					<th>Jumlah Jawaban</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no=1;
					foreach ($data_soal->result_array() as $showsoal): ?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $showsoal['soal'];?></td>
						<td><?php echo $showsoal['topik_nama'];?></td>
						<td><?php echo $showsoal['jumlah_jawaban'];?></td>
						<td>
						<a href="<?php echo base_url();?>index.php/adminn/jawaban/index/<?php echo $showsoal['id_soal'];?>"><button class="btn btn-xs btn-success" title="Tambah Jawaban" data-toggle="modal" data-target="#modal-edit-"><li class="fa fa-check-square"></li></button></a>
						<button class="btn btn-xs btn-success" title="Edit Soal" data-toggle="modal" data-target="#modal-edit-soal-<?php echo $showsoal['id_soal'];?>"><li class="fa fa-edit"></li></button>
						<button class="btn btn-xs btn-danger" title="Hapus Soal" data-toggle="modal" data-target="#modal-hapus-<?php echo $showsoal['id_soal'];?>"><li class="fa fa-times"></li></button>
						</td>
					</tr>	
				<?php	endforeach;
				?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal Edit Soal -->
<?php 
	foreach ($data_soal->result_array() as $showsoal): 
?>
<div class="modal fade" id="modal-edit-soal-<?php echo $showsoal['id_soal'];?>">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Edit Data Soal</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <form method="POST" action="<?php echo base_url();?>index.php/adminn/Soal/Update/">
	    <div class="modal-body">
	      <p>
	      	SOAL <input type="hidden" name="id_soal" value="<?php echo $showsoal['id_soal'];?>">
	      </p>
	      <p>
	      	<textarea class="ckeditor" id="ckeditor" name="soal">
	      		<?php echo $showsoal['soal'] ?>
	      	</textarea>
	      </p>
	    </div>
	    <div class="modal-footer justify-content-between">
	      <button type="button" class="btn btn-danger" data-dismiss="modal"><li class="fa fa-times"></li> Batal</button>
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
<!-- Modal Hapus Soal -->
<?php 
	foreach ($data_soal->result_array() as $showsoal): 
?>
<div class="modal fade" id="modal-hapus-<?php echo $showsoal['id_soal'];?>">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Hapus Data Soal</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <form method="POST" action="<?php echo base_url();?>index.php/adminn/Soal/Delete_soal_daftar/">
	    <div class="modal-body">
	      <p>
	      	<input type="hidden" name="id_soal" value="<?php echo $showsoal['id_soal'];?>">
	      </p>
	      <p>
	      	Apakah anda yakin akan menghapus data soal tersebut.!!?
	      </p>
	      <p>
	      	<b>NB :</b> Jika anda menghapus data soal, maka data jawaban dan hasil tes siswa akan ikut terhapus.!!
	      </p>
	    </div>
	    <div class="modal-footer justify-content-between">
	      <button type="button" class="btn btn-danger" data-dismiss="modal"><li class="fa fa-times"></li> Batal</button>
	      <button type="submit" class="btn btn-success"><li class="fa fa-check"></li> Hapus</button>
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