<div class="flash-data" data-flashdataok="<?php echo $this->session->flashdata('berhasil');?>">
</div>
	<H3>Data Soal : </H3>
	<hr>
	<?php 
		foreach ($data_soal->result_array() as $showsoal) : ?>
		<p>
			<?php echo $showsoal['soal'];?>
		</p>	
	<?php	endforeach;
	?>
	<hr>
	<p>
		Soal
	</p>
	<form method="POST" action="<?php echo base_url();?>index.php/adminn/jawaban/Add/">
	<p>
		<input type="hidden" name="id_soal" value="<?php echo $this->uri->segment(4);?>">
	</p>
	<p>
		<input type="hidden" name="id_soal" value="<?php echo $this->uri->segment(4);?>">
		<textarea class="ckeditor" id="ckeditor" name="jawaban">
			
		</textarea>
	</p>
	<p>
		Status Jawaban
	</p>
	<p>
		<select name="status_jawaban" class="form-control">
			<option value="0"> Salah </option>
			<option value="1"> Benar </option>
		</select>
	</p>
	<p>
		<button class="btn btn-success btn-md" type="submit" name="simpan"><li class="fa fa-save"></li> Simpan</button>
	</p>
	</form>
	<hr>
	<p>
		<table id="example1" class="table table-bordered table-hover table-nowrap">
			<thead>
				<tr>
					<th>No</th>
					<th>Jawaban</th>
					<th>Status Jawaban</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<?php
			$no=1;
			foreach ($data_jawaban->result_array() as $showjawaban): ?>
				<tr>
					<td>
					<?php echo $no++ ;?>
					</td>
					<td>
					<?php echo $showjawaban['jawaban'] ?>
					</td>
					<?php 
						if ($showjawaban['status_jawaban']=='1') { 
						echo "<td><b>Benar</b></td>";
						} 
						else{
						echo "<td>Salah</td>";
						}
					?>
					<td>Button</td>
				</tr>
			<?php endforeach;
			?>
		</table>
	</p>