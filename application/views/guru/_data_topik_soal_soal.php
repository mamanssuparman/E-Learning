<div class="flash-data" data-flashdataok="<?php echo $this->session->flashdata('berhasil');?>"></div>
<div class="row">
	<div class="col-md-12">
		<h4>Soal Untuk Topik : </h4>
	</div>
</div>
<hr> 
<div class="container-responsive">
<div class="row">
</div>
<form action="<?php echo base_url();?>index.php/guru/Topik_soal/Add_soal/<?php echo $this->uri->segment(5);?>" method="POST">
    <input type="hidden" name="array" value="<?php echo $this->uri->segment(4) ?>">
    <textarea name="soal" id="ckeditor" class="ckeditor">
    </textarea>
    <br>
    <input type="submit" name="simpan" value="SIMPAN" class="btn btn-primary btn-md">
</form>
</div>
<hr>
<br>
<div class="row">

	<div class="col-md-12">
	
		<div class="table-responsive">
		<table id="example1" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th width="50" align="center">No</th>
					<th width="600">Soal</th>
                    <th width="100">Jumlah Jawaban</th>
                    <th width="100">Aksi</th>
				</tr>
			</thead>
			<tbody>
               <?php 
                    $no=1;
                    foreach ($data_soal->result_array() as $tampilkan):
               ?>

               <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $tampilkan['soal'] ?></td>
                        <td><?php echo $tampilkan['jumlah_jawaban'] ?></td>
                        <td>
                         <a href="<?php echo base_url(); ?>index.php/guru/Topik_soal/Jawaban/<?php echo $tampilkan['id_soal'] ?>/<?php echo sha1($tampilkan['id_soal']) ?>/<?php echo $this->uri->segment(4) ?>"><button class="btn btn-warning btn-xs" type="button" title="Tambah Jawaban"> <li class="fa fa-plus"></li> </button></a>
                         <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-edit-soal-<?php echo $tampilkan['id_soal'] ?>" title="Edit Soal"><i class="fa fa-edit"></i></button>
                        </td>
               </tr>
               <?php 
                    endforeach;
               ?>
			</tbody>
		</table>
		</div>
	</div>
</div>

<!-- Modal Edit Soal -->
<?php 
     foreach ($data_soal->result_array() as $tampilkan) :
?>
<div class="modal fade" id="modal-edit-soal-<?php echo $tampilkan['id_soal'] ?>">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Edit Data Soal</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <form method="POST" action="<?php echo base_url();?>index.php/guru/Topik_soal/Update_soal/<?php echo sha1($tampilkan['id_soal']) ?>">
         <input type="hidden" name="arraytopik" id="" value="<?php echo $this->uri->segment(4) ?>">
         <input type="hidden" name="arraysoal" id="" value="<?php echo $tampilkan['id_soal'];?>">
         <div class="modal-body">
	      	<textarea name="soal" id="ckeditor" class="ckeditor">
                    <?php echo $tampilkan['soal'] ;?>
               </textarea>
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