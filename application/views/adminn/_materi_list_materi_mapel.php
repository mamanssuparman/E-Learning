<div class="flash-data" data-flashdataok="<?php echo $this->session->flashdata('berhasil');?>">
</div>
<div class="row">
	<div class="col-md-12">
		<h3>
		<?php 
			echo $judulbesar;
		?>
		</h3>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<a href="<?php echo base_url();?>index.php/admin/Materi/Add/<?php echo $this->uri->segment(4);?>" class="btn btn-info pull-right"><li class="fa fa-plus"></li> Tambah Materi</a>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
	<div class="row">
		
		<div class="col-md-12">
			<div class="table-responsive">
			<table id="example1" class="table table-bordered table-hover">
				<thead>
					<th>No</th>
					<th>Judul Materi</th>
					<th>Detail Materi</th>
					<th>Action</th>
				</thead>
				<tbody>
					<?php 
						$no=1;
						foreach ($data_list_mapel->result_array() as $showmaterimapel):
							echo "<tr>";
								echo '<td>'.$no++.'</td>';
								echo "<td>$showmaterimapel[judul_materi]</td>";
								echo "<td>$showmaterimapel[detail_materi]</td>";?>
								<td>
									<a href="<?php echo base_url();?>index.php/adminn/List_materi/Detail/<?php echo $showmaterimapel['id_materi'];?>" class="btn btn-info btn-xs" title="Lihat Materi"><li class="fa fa-search"></li> </a>
									<button class="btn btn-danger btn-xs" data-toggle="modal" data-target='#modal-hapus-<?php echo $showmaterimapel['id_materi'] ?>'> <li class="fa fa-times"></li> </button>
								</td>
						
						<?php	echo "</tr>";
						endforeach;
					?>
				</tbody>
			</table>	
			</div>
		</div>
	</div>
	</div>
</div>
<!-- Modal lihat materi -->
<?php 
	foreach ($data_list_mapel->result_array() as $showmaterimapel):
?>
<div class="modal fade" id="modal-hapus-<?php echo $showmaterimapel['id_materi'] ?>">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Hapus Materi Pelajaran</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <form method="post" action="<?php echo base_url();?>index.php/admin/Materi/Hapus/<?php echo $showmaterimapel['id_materi'] ?>/<?php echo $this->uri->segment(4);?>">
	    <div class="modal-body">
	    	<input type="hidden" name="id_tapel" value="<?php echo $showmaterimapel['id_materi'] ?>">
	      <p>
	      	Apakah anda yakin akan menghapus Materi <b> <?php echo $showmaterimapel['judul_materi'] ;?> </b>
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