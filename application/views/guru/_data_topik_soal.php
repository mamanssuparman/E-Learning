<div class="flash-data" data-flashdataok="<?php echo $this->session->flashdata('berhasil');?>"></div>
<div class="row">
	<div class="col-md-12">
		<h4>Daftar Topik Soal</h4>
	</div>
</div>
<hr> 
<div class="container-responsive">
<button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus"></i> Add Topik Soal</button>
<div class="row">
</div>

</div>

<br>
<div class="row">

	<div class="col-md-12">
	
		<div class="table-responsive">
		<table id="example1" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th width="50" align="center">No</th>
					<th width="200">Nama Topik</th>
                    <th width="500">Deskripsi</th>
                    <th width="100">Jumlah Soal</th>
                    <th> Action</th>
				</tr>
			</thead>
			<tbody>
			   <?php 
			   		$no=1;
			   		foreach ($data_topik->result_array() as $tampilkan):
			   ?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $tampilkan['topik_nama'] ?></td>
						<td><?php echo $tampilkan['topik_detail'] ?></td>
						<td><?php echo $tampilkan['jumlah_soal'] ?></td>
						<td> <a href="<?php echo base_url();?>index.php/guru/Topik_soal/Soal/<?php echo $tampilkan['id_topik'] ?>/<?php echo sha1($tampilkan['id_topik']) ?>"> <button type="button" class="btn btn-primary btn-xs" title="Buat Soal"> <li class="fa fa-plus"></li> </button> </a></td>
					</tr>
			   <?php 
					endforeach;
			   ?>
			</tbody>
		</table>
		</div>
	</div>
</div>

<!-- Modal Tambah Topik -->
<div class="modal fade" id="modal-tambah">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Tambah Data Topik</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <form method="POST" action="<?php echo base_url();?>index.php/guru/Topik_soal/Simpan">
	    <div class="modal-body">
	      	<p>
	      		Materi Pelajaran
			</p>
			<p>
			<select name="nama_mapel" id="" class="form form-control">
				<?php 
					foreach ($nama_mapel_guru->result() as $tampilkan) { ?>
					<option value="<?php echo $tampilkan->nama_mapel ?>"> <?php echo $tampilkan->nama_mapel ?></option>	
				<?php	}
				?>
			</select>
			</p>
			<p>
				Nama Topik
			</p>
			<p>
				<input type="text" name="nama_topik" class="form form-control">
			</p>
			<p>
				Deskripsi Topik
			</p>
			<p>
				<input type="text" name="deskripsi" class="form form-control">
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