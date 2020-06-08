<form method="POST" action="<?php echo base_url();?>index.php/adminn/Mat_pel/Update/">
<div class="modal-body">
<input type="hidden" name="id_mapel" value="<?php echo $this->uri->segment(4) ;?>">
<?php 
    foreach ($data_mat_pel->result_array() as $showmatpel):
?>
    <p>
    Nama Mapel
    </p>
    <p>
    <input type="text" name="nama_mapel" class="form form-control" required autocomplete="OFF" value="<?php echo $showmatpel['nama_mapel'];?>">
    </p>
    <p>
    Deskripsi 
    </p>
    <p>
    <textarea class="form form-control" cols="5" rows="2" name="deskripsi" required=""><?php echo $showmatpel['deskripsi'];?></textarea>
    </p>
    <p>
    Kelas
    </p>
    <?php 
        endforeach;
    ?>
    <?php 
        $hasil= str_replace(","," ",$tampil_pilihan);
    ?>
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
</div>
<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-danger" data-dismiss="modal"><li class="fa fa-undo"></li> Batal</button>
    <button type="submit" class="btn btn-success"><li class="fa fa-save"></li> Perbaharui</button>
</div>
</form>
