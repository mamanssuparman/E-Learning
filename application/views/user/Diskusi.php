<div>
  <div class="card direct-chat direct-chat-primary">
    <div class="card-header">
      <h3 class="card-title">Class Diskusi</h3>

      <div class="card-tools">
        <span data-toggle="tooltip" title="3 New Messages" class="badge badge-primary">Diskusi Kelas</span>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <!-- Conversations are loaded here -->
      <div class="direct-chat-messages">
        <!-- Message. Default to the left -->
        <div class="direct-chat-msg">
          <div class="direct-chat-infos clearfix">
            <span class="direct-chat-name float-left">Users 2</span>
            <span class="direct-chat-timestamp float-right">9 April 2020</span>
          </div>
          <!-- /.direct-chat-infos -->
          <img class="direct-chat-img" src="<?php echo base_url('_assets/default.jpg')?>" alt="message user image">
          <!-- /.direct-chat-img -->
          <div class="direct-chat-text">
            Cek
          </div>
          <!-- /.direct-chat-text -->
        </div>
        <!-- /.direct-chat-msg -->

        <!-- Message to the right -->
        <div class="direct-chat-msg right">
          <div class="direct-chat-infos clearfix">
            <span class="direct-chat-name float-right">OmenArt</span>
            <span class="direct-chat-timestamp float-left">9 April 2020</span>
          </div>
          <!-- /.direct-chat-infos -->
          <img class="direct-chat-img" src="<?php echo base_url('_assets/default.jpg')?>" alt="message user image">
          <!-- /.direct-chat-img -->
          <div class="direct-chat-text">
            Ya di coba
          </div>
          <!-- /.direct-chat-text -->
        </div>
        <!-- /.direct-chat-msg -->

        <!-- Message. Default to the left -->
        <div class="direct-chat-msg">
          <div class="direct-chat-infos clearfix">
            <span class="direct-chat-name float-left">Users</span>
            <span class="direct-chat-timestamp float-right">9 April 2020</span>
          </div>
          <!-- /.direct-chat-infos -->
          <img class="direct-chat-img" src="<?php echo base_url('_assets/default.jpg')?>" alt="message user image">
          <!-- /.direct-chat-img -->
          <div class="direct-chat-text">
            siip
          </div>
          <!-- /.direct-chat-text -->
        </div>
        <!-- /.direct-chat-msg -->

        <!-- Message to the right -->
        <div class="direct-chat-msg right">
          <div class="direct-chat-infos clearfix">
            <span class="direct-chat-name float-right">OmenArt</span>
            <span class="direct-chat-timestamp float-left">9 April 2020</span>
          </div>
          <!-- /.direct-chat-infos -->
          <img class="direct-chat-img" src="<?php echo base_url('_assets/default.jpg')?>" alt="message user image">
          <!-- /.direct-chat-img -->
          <div class="direct-chat-text">
            OK terima kasih
          </div>
          <!-- /.direct-chat-text -->
        </div>
        <!-- /.direct-chat-msg -->

      </div>
      <!--/.direct-chat-messages-->

      <!-- Contacts are loaded here -->
      <!-- /.direct-chat-pane -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <form action="<?php echo base_url();?>index.php/user/Diskusi/send/" method="post">
        <div class="input-group">
          <input type="text" name="diskusi" placeholder="Type Message ..." class="form-control">
          <span class="input-group-append">
            <button type="submit" class="btn btn-primary">Send</button>
          </span>
        </div>
      </form>
    </div>
    <!-- /.card-footer-->
  </div>
</div>