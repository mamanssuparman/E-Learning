<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-widget widget-user-2">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-warning">
          <div class="widget-user-image">
            <img class="img-circle elevation-2" src="<?php echo base_url('_assets/default.jpg') ?>" alt="User Avatar">
          </div>
          <!-- /.widget-user-image -->
<?php 
    foreach ($data_siswa->result_array() as $showsiswa):
?>
          <h3 class="widget-user-username"><?php echo $showsiswa['nama_siswa'];?></h3>
          <h5 class="widget-user-desc"><?php echo $showsiswa['nama_kelas'];?></h5>
        </div>
        <div class="card-footer p-0">
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                NIS
              </div>
              <div class="col-md-8">
                <input type="text" name="nis" class="form-control" value="<?php echo $showsiswa['username'] ?>">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                Nama
              </div>
              <div class="col-md-8">
                <input type="text" name="nama" class="form-control" value="<?php echo $showsiswa['nama_siswa'] ?>">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                Alamat
              </div>
              <div class="col-md-8">
                <textarea rows="2" cols="8" name="alamat" class="form-control"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-md-10">
                
              </div>
              <div class="col-md-2">
                <input type="button" name="simpan" class="btn btn-success" value="Perbaharui">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php 
  endforeach;
?>
</div>
