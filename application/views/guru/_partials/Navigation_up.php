<nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->

          <!-- Tasks: style can be found in dropdown.less -->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('_assets/default.jpg') ?>" class="user-image" alt="User Image">
              <span class="hidden-xs">
                <?php
                  foreach ($data_pengguna->result_array() as $show) :
                    echo $show['nama'];
                ?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url('_assets/default.jpg') ?>" class="img-circle" alt="User Image">
                <p>
                  <?php 
                    echo $show['nama'];
                  ?>
                  <small>Guru</small>
                </p>
              </li>
             
              <!-- Menu Body -->
              <li class="user-body">
                                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url();?>index.php/admin/Profile/index/<?php echo sha1($show['unsername']) ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url();?>index.php/Logout1" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
              <?php 
                endforeach;
              ?>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>