<?php foreach ($diskusi as $x): ?>
  <?php if ($x->id_user == $this->session->userdata('id_siswa')): ?>
    <!-- Message to the right -->
    <div class="direct-chat-msg right">
      <div class="direct-chat-info clearfix">
        <span class="direct-chat-name pull-right">Aku</span>
        <span class="direct-chat-timestamp pull-left"><?=$this->elearning->waktu_lalu($x->waktu);?></span>
      </div>
      <!-- /.direct-chat-info -->
      <img class="direct-chat-img" src="<?=base_url()?>_assets/default.jpg" alt="message user image">
      <!-- /.direct-chat-img -->
      <div class="direct-chat-text">
        <?=$x->diskusi_chat?>
      </div>
      <!-- /.direct-chat-text -->
    </div>
    <!-- /.direct-chat-msg -->  
  <?php else: ?>
    <!-- Message. Default to the left -->
    <div class="direct-chat-msg">
      <div class="direct-chat-info clearfix">
        <span class="direct-chat-name pull-left"><?=$x->nama_siswa?></span>
        <span class="direct-chat-timestamp pull-right"><?=$this->elearning->waktu_lalu($x->waktu);?></span>
      </div>
      <!-- /.direct-chat-info -->
      <img class="direct-chat-img" src="<?=base_url()?>_assets/default.jpg" alt="message user image">
      <!-- /.direct-chat-img -->
      <div class="direct-chat-text">
        <?=$x->diskusi_chat?>
      </div>
      <!-- /.direct-chat-text -->
    </div>
    <!-- /.direct-chat-msg -->
  <?php endif ?>
<?php endforeach ?>