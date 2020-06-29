<div class="flash-data" data-flashdataok="<?php echo $this->session->flashdata('berhasil');?>">
</div>
<div class="row">
	<div class="col-md-12">
		<h3> Daftar Soal Topik : 
		<?php 
			foreach ($data_topik->result_array() as $showtopik) {
				echo "$showtopik[topik_nama]";
			}
		?>
		</h3>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		<a href="<?php echo base_url();?>index.php/admin/Soal/index/<?php echo $this->uri->segment(4);?>/<?php echo sha1($this->uri->segment(4)); ?>"> <button type="button" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Add Soal</button> </a>
		<table id="example1" class="table table-bordered table-hover table-nowrap">
			<thead>
				<tr>
					<th>No</th>
					<th>Soal</th>
					<th>Jumlah Jawaban</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no=1;
					foreach ($data_soal->result_array() as $showsoal) :
						echo "<tr>";
							echo '<td>'.$no++.'</td>';
							echo "<td>$showsoal[soal]</td>";
							echo "<td>$showsoal[jumlah_jawaban]</td>"; ?>
							<td>
							<button class="btn btn-xs btn-success" title="Edit Soal" data-toggle="modal" data-target="#modal-edit-<?php echo $showsoal['id_soal'];?>"><li class="fa fa-edit"></li></button>
							<button class="btn btn-xs btn-danger" title="Hapus Soal" data-toggle="modal" data-target="#modal-hapus-<?php echo $showsoal['id_soal'];?>"><li class="fa fa-times"></li></button>
							</td>
				<?php		echo "</tr>";
					endforeach;
				?>
			</tbody>
		</table>
	</div>
</div>
<!-- Modal Edit Soal -->
<?php 
	foreach ($data_soal->result_array() as $showsoal) :
?>
<div class="modal fade" id="modal-edit-<?php echo $showsoal['id_soal'];?>">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Tambah Data Topik</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <form method="POST" action="<?php echo base_url();?>index.php/admin/Soal/Update_list/">
	    <div class="modal-body">
	    	<p><h4>Data Soal :</h4>
	    	<input type="hidden" name="id_soal" value="<?php echo $showsoal['id_soal'] ?>">
	    	<input type="hidden" name="id_topik" value="<?php echo $this->uri->segment(5);?>">
	    	</p>
	    	<p>
	    		<textarea class="ckeditor" id="ckditor" name="soal">
	    			<?php 
	    				echo "$showsoal[soal]";
	    			?>
	    		</textarea>
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
<?php 
	endforeach;
?>
<!-- Modal Hapus Soal -->
<?php 
	foreach ($data_soal->result_array() as $showsoal) :
?>
<div class="modal fade" id="modal-hapus-<?php echo $showsoal['id_soal'];?>">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Hapus Soal</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <form method="POST" action="<?php echo base_url();?>index.php/adminn/Soal/Delete_list/">
	    <div class="modal-body">
	    	<input type="hidden" name="id_soal" value="<?php echo $showsoal['id_soal'] ?>">
	    	<input type="hidden" name="id_topik" value="<?php echo $this->uri->segment(4);?>">
	    	<p>
	    		Apakah anda yakin akan menghapus data soal tersebut.!!!!
	    	</p>
	    	<p>
	    	</p>
	    </div>
	    <div class="modal-footer justify-content-between">
	      <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
	      <button type="submit" class="btn btn-success">Hapus</button>
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