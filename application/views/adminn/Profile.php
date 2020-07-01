<form action="<?php echo base_url();?>index.php/admin/Profile/Update/<?php echo $this->uri->segment(4); ?>" method="POST">
<div class="box-body box-profile">
    <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('_assets/default.jpg') ?>" alt="User profile picture">
<?php 
    foreach ($data_pengguna->result_array() as $showpengguna):
?>
    <h3 class="profile-username text-center"><?php echo $showpengguna['nama'] ?></h3>

    <p class="text-muted text-center">Guru Pengajar</p>

    <ul class="list-group list-group-unbordered">
    <li class="list-group-item">
    <p>
        Username
    </p>
        <input type="text" name="username" value="<?php echo $showpengguna['unsername'];?>" class="form-control" disabled>
    </li>
    <li class="list-group-item">
    <p>
        Nama
    </p>
        <input type="text" name="nama" value="<?php echo $showpengguna['nama'];?>" class="form-control" require>
    </li>
    <li class="list-group-item">
    <p>
        Tempat Lahir
    </p>
        <input type="text" name="tempat_lahir" value="<?php echo $showpengguna['tempat_lahir'];?>" class="form-control">,<input type="date" name="tgl_lahir" id="datemask2 " value="<?php echo $showpengguna['tgl_lahir'];?>" class="form-control inputmask">
    </li>
    <li class="list-group-item">
    <p>
        Password
    </p>
        <input type="password" name="password" value="" class="form-control" placeholder="Password" require>
    </li>
    </ul>
<?php 
    endforeach;
?>
    <button type="submit" class="btn btn-primary btn-md pull-right"><li class="fa fa-save"></li> Perbaharui</button>
</div>
</form>