<div class="row">
  <div class="col-md-3 col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Sisa Waktu</h3>
      </div>
      <div class="box-body"></div>
    </div>
  </div>
  <div class="col-md-9 col-xs-12">
      <!-- DIRECT CHAT -->
      <div class="box box-warning direct-chat direct-chat-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Soal <?=$s['tes_nama']?>
           </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <!-- Conversations are loaded here -->
          <div style="padding-left: 5px;display: flex;font-size: 15px;padding-top: 10px">
          <?=$this->uri->segment(4) ?>. <?=htmlspecialchars_decode($soal['soal']) ?>
          </div>
          <div style="padding-left: 5px;font-size: 15px;padding-top: 5px">
            <?php foreach ($jawaban as $x): ?>
              <input type="radio" name="pilihan" <?=($x->tes_jawaban_pilih == 1) ? 'checked' : ''?> onclick="jawaban(this.value)" value="<?=$x->id_jawaban?>"><?=htmlspecialchars_decode($x->jawaban)?><br>

            <?php $ts = $x->id_tes_soal;endforeach ?>
          </div>
        <!-- /.box-body -->
        <!-- /.box-footer-->
        </div>
      <!--/.direct-chat -->
      </div>
  </div>
</div>
<div class="row">
  <?php if ($s['tes_user_status'] != 1): ?>
    <?php redirect('quiz','refresh');?>
  <?php endif ?>
  <div class="col-12">
    <div class="box">
      <div class="box-body">
        <?php foreach ($ambilOrder as $x): ?>
          <?php if ($x->tes_jawaban_pilih != 1): ?>
            <a class="btn btn-default" href="<?=base_url('quiz/soal/'.base64_encode($x->id_tes_user).'/'.$x->tes_order)?>" title=""><?=$x->tes_order?></a>
          <?php else: ?>
            <a class="btn btn-primary" href="<?=base_url('quiz/soal/'.base64_encode($x->id_tes_user).'/'.$x->tes_order)?>" title=""><?=$x->tes_order?></a>
          <?php endif ?>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</div>
<?php $startawal = strtotime($s['tes_user_waktu']);
      $st = date('Y-m-d H:i:s',$startawal);
      $selisih = date('Y-m-d H:i:s',strtotime('+'.$s['durasi_waktu'].'minutes',$startawal));
 ?>
<?php if (date('Y-m-d H:i:s') > $selisih): ?>
  <?php 
    $this->mc->ubah('tbl_tes_user',['tes_user_status' => 3],['id_tes_user' => $s['id_tes_user']]);
   ?>
<?php endif ?>
<script>
  var url = '<?=base_url('user/quiz/')?>';
  function jawaban(val){
    var id_tes_soal = <?=$ts?>;
    $.ajax({
      type : 'post',
      data : {
        id_jawaban : val,
        id_tes_soal : id_tes_soal,
      },
      url : url+'ubahJawaban',
      success : function(response) {
        console.log(response)
      }
    })
  }

</script>