<div class="row">
	<div class="col-md-12">
		<table id="example1" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Judul Materi</th>
					<th>Isi</th>
					<th>Mata Pelajaran</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no=1;
					foreach ($data_materi->result_array() as $showmateri):
						echo "<tr>";
							echo '<td>'.$no++.'</td>';
							echo "<td>$showmateri[judul_materi]</td>"; ?>
							<td> <?php echo $showmateri['detail_materi'] ; ?> <a href="<?php echo base_url();?>index.php/adminn/List_materi/Detail/<?php echo $showmateri['id_materi'] ;?>"><button class="btn btn-info btn-xs"><li class="fa fa-search"></li>Lihat</button></a> </td>
							<?php echo "<td>$showmateri[nama_mapel]</td>"?>
							<td>
							<button class="btn btn-xs btn-success" title="Edit Materi" data-toggle="modal" data-target="#modal-edit-<?php echo $showmateri['id_materi']; ?>"><li class="fa fa-edit"></li></button>
							<button class="btn btn-xs btn-warning" title="Hapus Materi" data-toggle="modal" data-target="#modal-hapus-<?php echo $showmateri['id_materi'];?>"><li class="fa fa-times"></li></button>
							</td>
					<?php	echo "</tr>";
					endforeach;
				?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal Edit Materi -->
<?php 
	foreach ($data_materi->result_array() as $showmateri) :
?>
<div class="modal fade" id="modal-edit-<?php echo $showmateri['id_materi'] ?>">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Edit Materi</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <form method="POST" action="<?php echo base_url();?>index.php/adminn/List_materi/Update/">
	    <div class="modal-body">
	    	<input type="hidden" name="id_materi" value="<?php echo $showmateri['id_materi'];?>">
	      <p>
	      	Judul Materi
	      </p>
	      <p>
	      <input type="text" class="form form-control" name="judul_materi" value="<?php echo $showmateri['judul_materi'] ?>">
	      </p>
	      <p>
	      	Detail Materi
	      </p>
	      <p>
	      	<textarea class="ckeditor" id="ckditor" name="detail_materi">
	      	<?php echo $showmateri['detail_materi'];?>
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

<!-- Modal Hapus Materi -->
<?php 
	foreach ($data_materi->result_array() as $showmateri) :
?>
<div class="modal fade" id="modal-hapus-<?php echo $showmateri['id_materi'];?>">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Hapus Materi</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <form method="POST" action="<?php echo base_url();?>index.php/adminn/List_materi/Delete/">
	    <div class="modal-body">
	    	<input type="hidden" name="id_materi" value="<?php echo $showmateri['id_materi'];?>">
	      <p>
	      	Apakah anda yakin akan menghapus data materi <b><?php echo $showmateri['judul_materi'];?></b> ??
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