<div class="row">
  <div class="col-12">
    
      <!-- DIRECT CHAT -->
      <div class="box   ">
        <div class="box-header with-border">
          <h3 class="box-title">Materi kelas <?=$kelas['nama_kelas']?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table class="table table-hover tbl">
            <thead>
              <tr>
                <th>No</th>
                <th>Materi</th>
                <th>Guru</th>
                <th>Mata Pelajaran</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
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
<script>
  var table
  $(document).ready(function(){
    table = $('.tbl').DataTable({
      "processing"  : true,
      "serverSide"  : true,
      "order"       : [],
      "ajax" : {
        "url" :  "<?php echo base_url('user/materi/ajax_list') ?>",
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