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
		<a href="<?php echo base_url();?>index.php/adminn/Materi/Add/<?php echo $this->uri->segment(4);?>" class="btn btn-info pull-right"><li class="fa fa-plus"></li> Tambah Materi</a>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
	<div class="row">
		
		<div class="col-md-12">
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
						foreach ($data_list_mapel->result_array() as $showmaterimapel){
							echo "<tr>";
								echo '<td>'.$no++.'</td>';
								echo "<td>$showmaterimapel[judul_materi]</td>";
								echo "<td>$showmaterimapel[detail_materi]</td>";?>
								<td><a href="<?php echo base_url();?>index.php/adminn/List_materi/Detail/<?php echo $showmaterimapel['id_materi'];?>" class="btn btn-info btn-xs" title="Lihat Materi"><li class="fa fa-search"></li> </a></td>
						
						<?php	echo "</tr>";
						}
					?>
				</tbody>
			</table>	
		</div>
	</div>
	</div>
</div>
<!-- Modal lihat materi -->
