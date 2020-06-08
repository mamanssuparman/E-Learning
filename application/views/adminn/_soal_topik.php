<div class="row">
	<div class="col-md-12">
	<table id="example1" class="table table-bordered table-hover table-responsive">
		<thead>
			<tr>
			<td>No</td>
			<td>Soal</td>
			<td>Jumlah Jawaban</td>
			<td>Aksi</td>	
			</tr>
		</thead>
			<?php
				$no=1;
				foreach ($data_soal_topik->result_array() as $showsoal): ?>
				<tr class="auto">
					<td><?php echo $no++; ?></td>
					<td><?php echo $showsoal['soal'];?></td>
					<td><?php echo $showsoal['jumlah_jawaban'];?></td>
					<td>
					<a href="<?php echo base_url();?>index.php/adminn/jawaban/index/<?php echo $showsoal['id_soal'];?>"><button class="btn btn-xs btn-success" title="Tambah Jawaban" data-toggle="modal" data-target="#modal-edit-"><li class="fa fa-edit"></li></button></a>
					<button class="btn btn-xs btn-warning" title="Edit Soal" data-toggle="modal" data-target="#modal-edit-soal-<?php echo $showsoal['id_soal'];?>"><li class="fa fa-edit"></li></button>
					<button class="btn btn-xs btn-danger" title="Hapus Soal" data-toggle="modal" data-target="#modal-hapus-soal-<?php echo $showsoal['id_soal'] ?>"><li class="fa fa-times"></li></button>
					</td>
				</tr>
			<?php	endforeach;
			?>
	</table>
	</div>
</div>