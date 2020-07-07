<div class="flash-data" data-flashdataok="<?php echo $this->session->flashdata('berhasil');?>">
</div>
	<H3>Data Soal : </H3>
	<hr>
	<?php 
		foreach ($data_soal->result_array() as $showsoal) : ?>
		<p>
			<?php echo $showsoal['soal'];?>
		</p>	
	<?php	endforeach;
	?>
	<hr>
	<p>
		Soal
	</p>
	<form method="POST" action="<?php echo base_url();?>index.php/admin/jawaban/Simpan/<?php echo sha1($this->uri->segment(4)) ?>">
	<p>
		<input type="hidden" name="id_soal" value="<?php echo $this->uri->segment(4);?>">
	</p>
	<p>
		<input type="hidden" name="id_soal" value="<?php echo $this->uri->segment(4);?>">
		<textarea class="ckeditor" id="ckeditor" name="jawaban">
			
		</textarea>
	</p>
	<p>
		Status Jawaban
	</p>
	<p>
		<select name="status_jawaban" class="form-control">
			<option value="0"> Salah </option>
			<option value="1"> Benar </option>
		</select>
	</p>
	<p>
		<button class="btn btn-success btn-md" type="submit" name="simpan"><li class="fa fa-save"></li> Simpan</button>
	</p>
	</form>
	<hr>
	<p>
		<div class="table-responsive">
		<table id="example1" class="table table-bordered table-hover table-nowrap">
			<thead>
				<tr>
					<th>No</th>
					<th>Jawaban</th>
					<th>Status Jawaban</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<?php
			$no=1;
			foreach ($data_jawaban->result_array() as $showjawaban): ?>
				<tr>
					<td>
					<?php echo $no++ ;?>
					</td>
					<td>
					<?php echo $showjawaban['jawaban'] ?>
					</td>
					<?php 
						if ($showjawaban['status_jawaban']=='1') { 
						echo "<td><b>Benar</b></td>";
						} 
						else{
						echo "<td>Salah</td>";
						}
					?>
					<td>
						<button class="btn btn-xs btn-warning" title="Edit Jawaban" data-toggle="modal" data-target="#modal-edit-<?php echo $showjawaban['id_jawaban'] ?>"><li class="fa fa-edit"></li></button>
						<button class="btn btn-xs btn-danger" title="Hapus Jawaban" data-toggle="modal" data-target="#modal-hapus-<?php echo $showjawaban['id_jawaban'] ?>"><li class="fa fa-times"></li></button>
					</td>
				</tr>
			<?php endforeach;
			?>
		</table>
		</div>
		
	</p>

<!-- Modal Edit Jawaban -->
<?php 
	foreach ($data_jawaban->result_array() as $showjawaban):
?>
<div class="modal fade" id="modal-edit-<?php echo $showjawaban['id_jawaban'] ?>">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Edit Data Jawaban</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <form method="POST" action="<?php echo base_url();?>index.php/admin/jawaban/Perbaharui/<?php echo $this->uri->segment(4); ?>/<?php echo sha1($showjawaban['id_jawaban']); ?>">
	    <div class="modal-body">
			<p>
				<input type="text" name="array" id="" value="<?php echo $showjawaban['id_jawaban'] ?>">
			</p>
	    	<p>
	    		<textarea class="ckeditor" id="ckeditor" name="jawaban">
				<?php 
					echo $showjawaban['jawaban'];
				?>
				</textarea>
			</p>
			<p>
				<select name="status_jawaban" id="" class="form form-control">
					<option value="0">Salah</option>
					<option value="1">Benar</option>
				</select>
			</p>
	    </div>
	    <div class="modal-footer justify-content-between">
	      <button type="button" class="btn btn-danger" data-dismiss="modal"><li class="fa fa-times"></li> Batal</button>
	      <button type="submit" class="btn btn-success"><li class="fa fa-check"></li> Perbaharui</button>
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
<!-- Modal Hapus Jawaban -->
<?php 
	foreach ($data_jawaban->result_array() as $showjawaban) :
?>
<div class="modal fade" id="modal-hapus-<?php echo $showjawaban['id_jawaban'] ?>">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Hapus Jawaban</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <form method="POST" action="<?php echo base_url();?>index.php/admin/jawaban/Hapus/<?php echo sha1($showjawaban['id_jawaban']) ?>/<?php echo $this->uri->segment(4); ?>">
	    <div class="modal-body">
			<p>
				<input type="text" name="array" id="" value="<?php echo $showjawaban['id_jawaban'] ?>">
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