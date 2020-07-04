<div class="row">
  <div class="col-12">
    
      <!-- DIRECT CHAT -->
      <div class="box   ">
        <div class="box-header with-border">
          <h3 class="box-title">Quiz kelas <?=$kelas['nama_kelas']?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table class="table table-hover tbl">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Tes</th>
                <th>Jumlah Soal</th>
                <th>Waktu Mulai</th>
                <th>Batas Waktu</th>
                <th>Detail</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!--/.direct-chat -->

  </div>
</div>
<div class="modal fade" id="soal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url('user/quiz/mulai')?>">
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" name="id_tes" value="">
          <label>Nama Soal</label>
          <input type="text" name="nama" readonly value="" class="form-control">
        </div>
        <div class="form-group">
          <label>Detail Soal</label>
          <input type="text" name="detail" readonly value="" class="form-control">
        </div>
        <div class="form-group">
          <label>Jumlah Soal</label>
          <input type="text" name="jumlah" readonly value="" class="form-control">
        </div>
        <div class="form-group">
          <label>Poin Dasar</label>
          <input type="text" name="poin" readonly value="" class="form-control">
        </div>
        <div class="form-group">
          <label>Waktu Mulai</label>
          <input type="text" name="waktu" readonly value="" readonly  class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary" id="m" disabled="disabled">Mulai</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script>

  var table;
  var btn = document.getElementById('m');
  $(document).ready(function(){
    $('#soal').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'post',
            url : '<?=base_url('user/quiz/infoSoal')?>',
            data :  'rowid='+ rowid,
            dataType: 'JSON',
            success : function(response){
              //menampilkan data ke dalam modal
              $('[name="id_tes"]').val(response.data.id_tes);
              $('[name="nama"]').val(response.data.tes_nama);
              $('[name="detail"]').val(response.data.tes_detail);
              $('[name="jumlah"]').val(response.data.tes_jumlah_soal);
              $('[name="poin"]').val(response.data.tes_score_benar);
              $('[name="waktu"]').val('<?=date('Y-m-d H:i:s')?>');
              btn.disabled = false;
            }
        });
     });
    table = $('.tbl').DataTable({
      "processing"  : true,
      "serverSide"  : true,
      "searching" : false,
      "order"       : [],
      "ajax" : {
        "url" :  "<?php echo base_url('user/quiz/ajax_list') ?>",
        "type":   "POST",
      },
      "language" :{
        "sEmptyTable" : "Tidak ada data",
       
        "paginate"  : {
          "next"  : "Berikutnya",
          "previous" : "Sebelumnya"
        },
        "zeroRecords" : "Data tidak di temukan",
        "lengthMenu"  : "Menampilkan _MENU_ data",
        "loadingRecords": "Mohon Tunggu",
        "processing"  : "Mohon Tunggu",
        "info":           "Menampilkan _START_ to _END_ of _TOTAL_ data",
        "infoEmpty":      "Menampilkan 0 sampai 0 dari 0 data",
        "infoFiltered"  : "(Memfilter dari _MAX_ total data )",
      },
      "columDefs": [
      {
        "targets"  : [0],
        "orderable"   : false,
      },
      ],
    });
  });
</script>