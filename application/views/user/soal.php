<?php 
$tu= $s['id_tes_user'];
$poin=$s['tes_score_benar'];
 ?>
<div class="row">
  <div class="col-md-3 col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Sisa Waktu</h3>
      </div>
      <div class="box-body">
        <div id="demo"></div>
      </div>
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
          <div class="pull-right" style="padding-bottom: 5px;">
            <a style="margin-right: 5px;" href="<?=base_url('user/quiz/selesai/'.$s['id_tes_user'])?>" class="btn btn-success selesai" title="">Selesai</a>
          </div>  
        <!-- /.box-body -->
        <!-- /.box-footer-->
        </div>
      <!--/.direct-chat -->
      </div>
  </div>
</div>
<div class="row">
  <?php if ($s['tes_user_status'] == 3): ?>
    <?php $this->session->set_flashdata('eror', 'tes selesai'); ?>
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
    var poin = <?=$poin?>;
    var id_tes_user = <?=$tu?>;
    $.ajax({
      type : 'post',
      data : {
        id_jawaban : val,
        id_tes_soal : id_tes_soal,
        poin : poin,
        id_tes_user : id_tes_user,
      },
      url : url+'ubahJawaban',
      success : function(response) {
      }
    })
  }
  $(".selesai").on('click',function(e) {
    e.preventDefault();
    const href = $(this).attr('href')
    Swal.fire({
      title : 'Apakah anda yakin menghentikan tes?',
      type  : 'warning',
      showCancelButton : true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yakin',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.value) {
        document.location.href = href;
      }
    })
  })
// Set the date we're counting down to
var countDownDate = new Date("<?=$selisih?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = hours + "Jam "
  + minutes + "menit " + seconds + "detik ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>