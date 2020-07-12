 <!-- DIRECT CHAT -->

 <div class="box box-warning direct-chat direct-chat-warning">

      <div class="box box-warning direct-chat direct-chat-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Diskusi kelas <?=$kelas['nama_kelas']?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <!-- Conversations are loaded here -->
          <div class="direct-chat-messages">
            <div class="showChat"></div>
          </div>
          <!--/.direct-chat-messages-->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <form class="kirim">
            <div class="input-group">
              <input type="text" name="diskusi_chat" placeholder="ketik pesan ..." class="form-control">
              <input type="hidden" name="kelas" value="<?=$kelas['id_kelas']?>">
              <span class="input-group-btn">
                    <button type="button" class="btn btn-warning btn-flat b-kirim">Send</button>
                  </span>
            </div>
          </form>
        </div>
        <!-- /.box-footer-->
      </div>
      <script>
  var url = '<?=base_url('')?>';

  var chat_kelas = '<?=$kelas['id_kelas']?>' ;

  var chat_kelas = '<?=$kelas['id_kelas']?>';

  $(document).ready(function(){
    //ambil data
    showChat();

    var pusher = new Pusher('ce5acc28a4dea6008c9c', {
        cluster: 'ap1',
        forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
        if(data.message === 'success'){
            showChat();
        }
    });

    function showChat() {
      $.ajax({

        url   : url+'guru/Join_forum/getChat',

        url   : url+'guru/join_forum/getChat',

        data : {
            kelas : chat_kelas,
        },
        type  : 'post',
        success : function(response){
            $('.showChat').html(response);
        }
      });
    }
    $('.b-kirim').on('click',function() {
      var f = $('.kirim').serialize();
      $.ajax({

        url   : url+'guru/Join_forum/kirimChat',

        url   : url+'guru/join_forum/kirimChat',

        type  : 'post',
        data  : f,
        success : function(response){
            $('[name="diskusi_chat"]').val('');
            $(".direct-chat-messages").scrollTop($(".direct-chat-messages").height()); 
        }
      });
    })
  })
</script>