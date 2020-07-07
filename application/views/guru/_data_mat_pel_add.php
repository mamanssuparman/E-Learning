<h3>
<?php 
	echo $judulbesar;
?>
</h3>
<hr>
<form method="POST" action="<?php echo base_url();?>index.php/guru/Mat_pel/Save_materi/<?php echo $this->uri->segment(4) ?>">
    <p>
        <input type="hidden" value="<?php echo sha1($this->uri->segment(4)); ?>" name="arraymateri">
    </p>
    <p>
		Judul Materi
	</p>
	<p>
		<input type="text" name="judul_materi" class="form form-control" required>
	</p>
	<p>
		Detail Materi
	</p>
	<p>
		<textarea class="ckeditor" id="ckeditor" name="detail_materi">
			
		</textarea>
	</p>
	<p>
		<button class="btn btn-success btn-md" name="simpan" type="submit"><li class="fa fa-save"></li> Simpan</button>
	</p>
</form>