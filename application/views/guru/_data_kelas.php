<div class="flash-data" data-flashdataok="<?php echo $this->session->flashdata('berhasil');?>"></div>
<div class="row">
	<div class="col-md-12">
		<h4>Daftar Nama Kelas yang Di Ajar.</h4>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
		<table id="example1" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th width="50" align="center">No</th>
					<th width="600">Kelas</th>
					<th width="200">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no=1;
					foreach ($data_kelas->result() as $show): ?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $show->nama_kelas ;?></td>
					<td>
					<a href="<?php echo base_url();?>index.php/guru/Kelas/data_siswa/<?php echo $show->id_kelas ?>/<?php echo sha1($show->id_kelas);?>"> <button class="btn btn-xs btn-success" title="Lihat Daftar Siswa"><li class="fa fa-search"></li></button></a>
					</td>
				</tr>		
				<?php endforeach;
				?>
			</tbody>
		</table>
		</div>
	</div>
</div>
