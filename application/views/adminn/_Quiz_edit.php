<?php
	foreach ($data_quiz->result() as $showquiz):
?>
<form name="save" method="POST" action="<?php echo base_url();?>index.php/adminn/Quiz/Update/">
	<div class="row">
		<div class="col-md-12">
			<input type="text" name="id_tes" value="<?php echo $this->uri->segment(4);?>">
			<p>
				Nama Tes/ Quiz
			</p>
			<p>
				<input type="text" name="tes_nama" required class="form-control" value="<?php echo $showquiz->tes_nama ;?>">
			</p>
			<p>
				Deskripsi
			</p>
			<p>
				<input type="text" name="tes_detail" required class="form-control" value="<?php echo $showquiz->tes_detail ;?>">
			</p>
			<p>
				Rentang Waktu
			</p>
			<p>
				<input type="text" class="form-control" id="reservationtime" name="rentangwaktu" value="<?php echo $showquiz->tes_mulai ;?> - <?php echo $showquiz->tes_selesai ;?>">
			</p>
			<p>
				Kelas
				<?php 
					echo $tampil_pilih_kelas;
				?>
				 <?php 
					$hasil= str_replace(","," ",$tampil_pilih_kelas);
				?>
			</p>
			<p>
				<select name="id_kelas[]"  multiple data-placeholder="Select a State" style="width: 100%;" required">
				<?php 
					foreach ($data_kelas->result() as $tampilkelas) { ?>
					<option value="<?php echo $tampilkelas->id_kelas ?>"
					<?php 
						if (preg_match("/$tampilkelas->id_kelas/i",$hasil)) {
							echo "selected";
						}
					?>
					
					><?php echo $tampilkelas->nama_kelas;?></option>
				<?php  }
				?>
				</select>
			</p>
			<p>
				Poin Dasar
			</p>
			<p>
				<input type="text" name="tes_score_benar" class="form-control" value="<?php echo $showquiz->tes_score_benar ;?>">
			</p>
			<p>
				Waktu Tes
			</p>
			<p>
				<input type="number" name="durasi_waktu" class="form-control" value="<?php echo $showquiz->durasi_waktu ;?>">
			</p>
			<p>
				Topik Ujian
			</p>
			<p>
				<select name="id_topik" class="form-control">
					<?php
						foreach ($data_topik->result_array() as $showtopik) { ?>
						<option value="<?php echo $showtopik['id_topik'] ?>"> <?php echo $showtopik['topik_nama']?> [ <?php echo $showtopik['jumlah_soal']; ?> ]</option>	
					<?php	}
					?>
				</select>
			</p>
			<p>
				Jumlah Soal
			</p>
			<p>
				<input type="number" name="tes_jumlah_soal" class="form-control" value="<?php echo $showquiz->tes_jumlah_soal ;?>">
			</p>
			<p>
				Acak Soal
			</p>
			<p>
				<input type="checkbox" name="tes_acak_soal" value="1" 
				<?php 
					if ($showquiz->tes_acak_soal =='1') {
						echo "checked";
					}
				?>
				>
			</p>
			<p>
				<input type="submit" name="simpan" class="btn btn-primary btn-md" value="Simpan">
			</p>
		</div>
	</div>
</form>
<?php 
	endforeach;
?>