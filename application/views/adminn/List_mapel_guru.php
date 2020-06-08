<div class="flash-data" data-flashdataok="<?php echo $this->session->flashdata('berhasil');?>">
</div>
<div class="row">
	<div class="col-md-12">
		<a href="<?php echo base_url();?>index.php/adminn/Guru/"><button type="button" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Add Guru Pengajar</button></a>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		<table id="example1" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Mapel</th>
					<th>Kelas</th>
					<th>Guru Pengajar</th>
					<th>Tahun Pelajaran</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no=1;
					foreach ($data_mapel_group->result_array() as $showmapelgroup):
						echo "<tr>";
							echo '<td>'.$no++.'</td>';
							echo "<td>$showmapelgroup[nama_mapel]</td>";
							echo "<td>$showmapelgroup[nama_kelas]</td>";
							echo "<td>$showmapelgroup[nama]</td>";
							echo "<td>$showmapelgroup[nama_tapel]</td>";
							echo "<td><button class='btn btn-info btn-xs' data-toggle='modal' data-target='#modal-edit-$showmapelgroup[id_group]' title='Tambah Pengajar'><li class='fa fa-edit'></li></button></td>";
						echo "</tr>";
					endforeach;
				?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal Edit Guru Pengajar -->
<?php 
	foreach ($data_mapel_group->result_array() as $showmapelgroup):
?>
<div class="modal fade" id="modal-edit-<?php echo $showmapelgroup['id_group'];?>">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Tambah Guru Pengajar</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <form method="POST" action="<?php echo base_url();?>index.php/adminn/List_mapel_guru/Add/">
	    <div class="modal-body">
	    	<input type="hidden" name="id_group" value="<?php echo $showmapelgroup['id_group'] ?>">
	      <p>
	      	Nama Pengajar
	      </p>
	      <p>
	      	<select name="id_guru" class="form-control" >
	      		<option value="NULL"> -- Kosongkan --</option>
	      		<?php 
	      			foreach ($data_guru->result_array() as $showguru):
	      				echo "<option value='$showguru[id_guru]'>$showguru[nama]</option>";
	      			endforeach;
	      		?>
	      	</select>
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