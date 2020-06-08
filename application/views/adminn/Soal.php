<div class="flash-data" data-flashdataok="<?php echo $this->session->flashdata('berhasil');?>">
</div>
<div class="row">
	<div class="col-md-12">
	<form method="POST" action="<?php echo base_url();?>index.php/adminn/Soal/Add/">
	<div class="col-md-12">
	<p>
		<input type="hidden" name="id_topik" value="<?php echo $this->uri->segment(4);?>">
	</p>
	<p>
	<h3> Soal untuk Topik : 
	<?php 
		foreach ($data_topik->result_array() as $showtopik) {
			echo "$showtopik[topik_nama]";
		}
	?>
	</h3>
	</p>
	<p>
		<textarea name="soal" class="ckeditor" id="ckeditor">
			
		</textarea>
	</p>
	<p>
		<button type="submit" name="simpan" class="btn btn-success btn-md"><li class="fa fa-save"> Simpan</li></button>
	</p>
	</div>
	</form>
	</div>
</div>
<hr>
<?php 
	$this->load->view('adminn/_soal_topik.php');
?>
</div>

<!-- Modal Edit Soal -->
<?php 
	foreach ($data_soal_topik->result_array() as $showsoal):
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
	foreach ($data_soal_topik->result_array() as $showsoal):
?>
<div class="modal fade" id="modal-hapus-soal-<?php echo $showsoal['id_soal'];?>">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Edit Data Soal</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <form method="POST" action="<?php echo base_url();?>index.php/adminn/Soal/Delete/">
	    <div class="modal-body">
	    	<p>
	    		Apakah anda yakin akan menghapus soal tersebut.!? 
	    		<input type="hidden" name="id_soal" value="<?php echo $showsoal['id_soal'];?>">
	    		<input type="hidden" name="id_topik" value="<?php echo $this->uri->segment(4);?>">
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