<div class="flash-data" data-flashdataok="<?php echo $this->session->flashdata('berhasil');?>"></div>
<?php 
    foreach ($data_soal->result_array() as $tampilkansoal):
?>
<div class="row">
	<div class="col-md-12">
        <h4> <b> Detail Soal :</b></h4>
        <h5><?php echo $tampilkansoal['soal'] ?></h5>
	</div>
</div>
<hr> 
<div class="container-responsive">
<div class="row">
</div>
<form action="<?php echo base_url();?>index.php/guru/Topik_soal/Add_jawaban/<?php echo $this->uri->segment(5);?>" method="POST">
<h4> Data Jawaban nya :</h4>
    <input type="hidden" name="arraysoal" value="<?php echo $this->uri->segment(4) ?>">
    <input type="hidden" name="arraytopik" id="" value="<?php echo $this->uri->segment(6) ?>">
    <textarea name="jawaban" id="ckeditor" class="ckeditor">
    </textarea>
    <br>
    <select name="status_jawaban" id="" class="form form-control"> 
        <option value="0">Salah</option>
        <option value="1">Benar</option>
    </select>
    <br>
    <input type="submit" name="simpan" value="SIMPAN" class="btn btn-primary btn-md">
</form>
<?php 
endforeach;
?>
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
					<th width="600">Jawaban</th>
                    <th width="100">Status Jawaban</th>
                    <th width="100">Aksi</th>
				</tr>
			</thead>
			<tbody>
               <?php 
               $no=1;
                    foreach ($data_jawaban->result_array() as $tampilkanjawaban):
               ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $tampilkanjawaban['jawaban'] ?></td>
                        <td>
                            <?php 
                            if ($tampilkanjawaban['status_jawaban']==0) {
                                echo "Salah";
                            }
                            else{
                                echo "<b> Benar </b>";
                            }
                            ?>
                        </td>
                        <td>
                            <button class="btn btn-warning btn-xs" title="Perbaharui Jawaban" data-toggle="modal" data-target="#modal-edit-jawaban-<?php echo $tampilkanjawaban['id_jawaban'] ?>"> <li class="fa fa-edit"></li> </button>
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

<!-- Modal Edit Jawaban -->
<?php 
    foreach ($data_jawaban->result_array() as $tampilkanjawaban) :
?>
<div class="modal fade" id="modal-edit-jawaban-<?php echo $tampilkanjawaban['id_jawaban'] ?>">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Edit Data Jawaban</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <form method="POST" action="<?php echo base_url();?>index.php/guru/Topik_soal/Update_jawaban/<?php echo sha1($tampilkanjawaban['id_jawaban']) ?>">
         <input type="hidden" name="arraysoal" id="" value="<?php echo $this->uri->segment(4) ?>">
         <input type="hidden" name="arraytopik" id="" value="<?php echo $this->uri->segment(6)?>">
         <input type="hidden" name="arrayjawaban" id="" value="<?php echo $tampilkanjawaban['id_jawaban'] ?>">
         <div class="modal-body">
	      	<textarea name="jawaban" id="ckeditor" class="ckeditor">
                    <?php echo $tampilkanjawaban['jawaban'] ?>
               </textarea>
        </div>
        <div class="container-fluid">
        <select name="status_jawaban" id="" class="form form-control">
            <option value="0">Salah</option>
            <option value="1">Benar</option>
        </select>
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