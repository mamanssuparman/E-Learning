<div class="flash-data" data-flashdataok="<?php echo $this->session->flashdata('berhasil');?>">
</div>
<div class="row">
	<div class="col-md-12">
		<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i> Add Quiz</button>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		<table id="example1" class="table table-bordered table-hover table-nowrap">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Ujian</th>
					<th>Nilai Maksimal</th>
					<th>Waktu Mulai</th>
					<th>Waktu Selesai</th>
					<th>Durasi Waktu</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no=1;
					foreach ($data_quiz->result_array() as $showquiz) {
						echo "<tr>";
							echo '<td>'.$no++.'</td>';
							echo "<td>$showquiz[tes_nama]</td>";
							echo "<td>$showquiz[tes_score_maksimal]</td>";
							echo "<td>$showquiz[tes_mulai]</td>";
							echo "<td>$showquiz[tes_selesai]</td>";
							echo "<td>$showquiz[durasi_waktu]</td>"; ?>
							<td>
								<a href="<?php echo base_url();?>index.php/adminn/Quiz/Edit/<?php echo $showquiz['id_tes'];?>" class="btn btn-primary btn-xs" title="Edit Quiz"><li class="fa fa-edit"></li></a>
								<a href="" class="btn btn-danger btn-xs" title="Hapus Quiz"><li class="fa fa-recycle"></li> </a>
							</td>

				<?php	echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</div>
</div>