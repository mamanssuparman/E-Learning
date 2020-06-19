<form name="save" method="POST" action="<?php echo base_url();?>index.php/adminn/Quiz/Add/">
	<div class="row">
		<div class="col-md-12">
			<p>
				Nama Tes/ Quiz
			</p>
			<p>
				<input type="text" name="tes_nama" required class="form-control">
			</p>
			<p>
				Deskripsi
			</p>
			<p>
				<input type="text" name="tes_detail" required class="form-control">
			</p>
			<p>
				Rentang Waktu
			</p>
			<p>
				<input type="text" class="form-control" id="reservationtime" name="rentangwaktu">
			</p>
			<p>
				Kelas
			</p>
			<p>
				<select multiple="multiple" data-placeholder="Pilih Kelas" style="width: 100%;" required name="id_kelas[]">
		      		<?php 
		      			foreach ($data_kelas->result_array() as $showkelas):
		      				echo "<option value='$showkelas[id_kelas]'>$showkelas[nama_kelas] [$showkelas[jumlah_siswa]]</option>";
		      			endforeach;
		      		?>
		      	</select>
			</p>
			<p>
				Poin Dasar
			</p>
			<p>
				<input type="text" name="tes_score_benar" class="form-control">
			</p>
			<p>
				Waktu Tes
			</p>
			<p>
				<input type="number" name="durasi_waktu" class="form-control">
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
				<input type="number" name="tes_jumlah_soal" class="form-control">
			</p>
			<p>
				Acak Soal
			</p>
			<p>
				<input type="checkbox" name="tes_acak_soal" value="1">
			</p>
			<p>
				<input type="submit" name="simpan" class="btn btn-primary btn-md" value="Simpan">
			</p>
		</div>
	</div>
</form>