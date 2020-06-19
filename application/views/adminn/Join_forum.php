<div class="box box-warning direct-chat direct-chat-warning">
<div class="box-header with-border">
    <h3 class="box-title">Direct Chat</h3>

    <div class="box-tools pull-right">
    <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow">3</span>
    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
    </button>
    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts"
            data-widget="chat-pane-toggle">
        <i class="fa fa-comments"></i></button>
    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
    </button>
    </div>
</div>
<!-- /.box-header -->
<div class="box-body">
    <!-- Conversations are loaded here -->
    <div class="direct-chat-messages">
    <!-- Message. Default to the left -->
    <?php 
        foreach ($data_diskusi->result_array() as $showdiskusi):
            if ($showdiskusi['id_guru']!=$this->session->userdata('id_guru')) { ?>

            <div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right"><?php echo $showdiskusi['alias'] ?></span>
                        <span class="direct-chat-timestamp pull-left"><?php echo $showdiskusi['waktu'] ?></span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="<?php echo base_url('_assets/default.jpg') ?>" alt="message user image">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        <?php
                            echo $showdiskusi['diskusi_chat'];
                        ?>
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>

           <?php }
           else{
    ?>
    <div class="direct-chat-msg">
        <div class="direct-chat-info clearfix">
        <span class="direct-chat-name pull-left"><?php echo $showdiskusi['alias'] ?></span>
        <span class="direct-chat-timestamp pull-right"><?php echo $showdiskusi['waktu'] ?></span>
        </div>
        <!-- /.direct-chat-info -->
        <img class="direct-chat-img" src="<?php echo base_url('_assets/default.jpg') ?>" alt="message user image">
        <!-- /.direct-chat-img -->
        <div class="direct-chat-text">
        <?php
            echo $showdiskusi['diskusi_chat'];
        ?>
        </div>
        <!-- /.direct-chat-text -->
    </div>
           <?php }
        endforeach;
    ?>
    <!-- /.direct-chat-msg -->

    <!-- Message to the right -->
    <!-- /.direct-chat-msg -->

    <!-- Message. Default to the left -->
    <!-- /.direct-chat-msg -->

    </div>
    <!--/.direct-chat-messages-->

    <!-- Contacts are loaded here -->
    <!-- /.direct-chat-pane -->
</div>
<!-- /.box-body -->
<div class="box-footer">
    <form action="<?php echo base_url();?>index.php/adminn/Join_forum/Send/<?php echo $this->uri->segment(4); ?>" method="post">
    <div class="input-group">
        <input type="hidden" name="id_guru" value="<?php echo $this->session->userdata('id_user');?>">
        <input type="text" name="isi" placeholder="Type Message ..." class="form-control">
        <span class="input-group-btn">
            <button type="submit" class="btn btn-warning btn-flat">Send</button>
            </span>
    </div>
    </form>
</div>
<!-- /.box-footer-->
</div>