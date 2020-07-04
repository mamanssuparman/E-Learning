<div class="flash-data" data-flashdataok="<?php echo $this->session->flashdata('berhasil');?>">
</div>
<p>
	<h3>Import Data Guru</h3>
</p> 
<div class="container">
    <div class="row">
        <div>
            <a href="<?php echo base_url();?>download/Format_import _guru.xlsx"><button class="btn btn-warning"> <li class="fa fa-download"></li> Download Format Import Guru</button></a>
        </div>
    </div>
</div>
<div>
    
	<div class="row" >
        <div class="col-md-12">
            Pilih terlebih dahulu kelas sebelum melakukan Import Data
            <form action="<?php echo base_url();?>index.php/admin/Import_guru/Import_data" enctype="multipart/form-data" method="POST">
                <p>
                File yang di import harus berektensi *.xlsx
                <p>
                NB : File yang di import / di Upload harus sesuai format, agar tidak terjadi hal-hal yang tidak di inginkan.!
                </p>
                <input type="file" name="filenya" class="form form-control">
                </p>
                <p>
                <input type="submit" name="simpan" value="Upload" class="btn btn-primary">
                </p>
            </form>
        </div>

	</div>

</div>