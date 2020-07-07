<div class="flash-data" data-flashdataok="<?php echo $this->session->flashdata('berhasil');?>">
</div>
<div class="row">
	<div class="col-md-12">
		<a href="<?php echo base_url(); ?>index.php/guru/Quiz"><button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i> Add Quiz</button></a>
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
								<a href="<?php echo base_url();?>index.php/guru/Quiz/Perbaharui/<?php echo $showquiz['id_tes'];?>/<?php echo sha1($showquiz['id_tes']) ?>" class="btn btn-primary btn-xs" title="Edit Quiz"><li class="fa fa-edit"></li></a>
								<!-- <a href="" class="btn btn-danger btn-xs" title="Hapus Quiz"><li class="fa fa-times"></li> </a> -->
								<button class="btn btn-danger btn-xs" title="Hapus Quiz" data-toggle="modal" data-target="#modal-hapus-quiz-<?php echo $showquiz['id_tes'] ?>"> <li class="fa fa-times"></li> </button>
							</td>

				<?php	echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</div>
</div>
<!-- Modal Hapus Quiz -->
<?php 
	foreach ($data_quiz->result_array() as $showquiz) :
?>
<div class="modal fade" id="modal-hapus-quiz-<?php echo $showquiz['id_tes'] ?>">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Hapus Data Quiz</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <form method="POST" action="<?php echo base_url();?>index.php/guru/Daftar_quiz/Delete/<?php echo sha1($showquiz['id_tes']) ?>">
	    <div class="modal-body">
			<p>
				<input type="hidden" name="array" value="<?php echo $showquiz['id_tes'] ?>">
			</p>	
	      <p>
		  Apakah anda yakin akan menghapus data quiz <b> <?php echo $showquiz['tes_nama'] ?></b> ?
	      </p>
	      <p>
	      	
	      </p>
	    </div>
	    <div class="modal-footer justify-content-between">
	      <button type="button" class="btn btn-danger" data-dismiss="modal"><li class="fa fa-times"></li> Batal</button>
	      <button type="submit" class="btn btn-success"><li class="fa fa-check"></li> Ya</button>
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