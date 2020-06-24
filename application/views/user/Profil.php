<div class="row">
  <div class="col-md-3 cok-xs-12">
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="<?=base_url('_assets/'.$siswa['foto'])?>" alt="User profile picture">
        <h3 class="profile-username text-center"><?=$siswa['nama_siswa']?></h3>

        <p class="text-muted text-center"><?=$kelas['nama_kelas']?></p>
        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>Username</b> <a class="pull-right"><?=$siswa['username']?></a>
          </li>
          <li class="list-group-item">
            <b>Tempat Lahir</b> <a class="pull-right"><?=$siswa['tempat_lahir']?></a>
          </li>
          <li class="list-group-item">
            <b>Tanggal Lahir</b> <a class="pull-right"><?=$siswa['tanggal_lahir']?></a>
          </li>
          <li class="list-group-item">
            <b>Jenis Kelamin</b> <a class="pull-right"><?=$siswa['jenis_kelamin']?></a>
          </li>
        </ul>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>