
  <ul class="sidebar-menu" data-widget="tree">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
        <li>
          <a href="<?php echo base_url('');?>index.php/guru/Dashboard/">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
<!-- Menu Siswa -->
    <li 
    <?php
      if ($judul=='Siswa') {
        echo "class='active treeview'";
      }
      else{
        echo "class='treeview'";
      }
     ?>
    >
      <a href="#">
        <i class="fa fa-users"></i> <span>Siswa</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        
        <li
        <?php 
          if ($subjudul='Kelas') {
            echo "class='active'>";
          }
          else{
            echo "class=''>";
          }
        ?>
        <a href="<?php echo base_url();?>index.php/guru/Kelas"><i class="fa fa-circle-o"></i> Data Kelas</a></li>
      </ul>
    </li>
<!-- End Menu Siswa -->
<!-- Menu Guru -->
    <li 
    <?php
      if ($judul=='Materi') {
        echo "class='active treeview'";
      }
      else{
        echo "class='treeview'";
      }
     ?>
    >
      <a href="#">
        <i class="fa fa-book"></i> <span>Materi</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li 
        <?php 
          if ($subjudul='Materi Pelajaran') {
            echo "class='active'>";
          }
          else{
            echo "class=''>";
          }
        ?>
        <a href="<?php echo base_url();?>index.php/guru/Mat_pel"><i class="fa fa-circle-o"></i> Materi Pelajaran</a></li>
      </ul>
    </li>
<!-- End Menu Guru -->
<!-- Materi Bank Soal-->
    <li 
    <?php
      if ($judul=='Bank Soal') {
        echo "class='active treeview'";
      }
      else{
        echo "class='treeview'";
      }
     ?>
    >
      <a href="#">
        <i class="fa fa-bank"></i> <span>Bank Soal</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li 
        <?php 
          if ($subjudul='Topik Soal') {
            echo "class='active'>";
          }
          else{
            echo "class=''>";
          }
        ?>
        <a href="<?php echo base_url();?>index.php/admin/Topik_soal"><i class="fa fa-circle-o"></i> Topik dan Soal</a></li>
      </ul>
    </li>
<!-- End Materi Pelajaran -->
<!-- Quiz / Ulangan -->
    <li 
    <?php
      if ($judul=='Quiz') {
        echo "class='active treeview'";
      }
      else{
        echo "class='treeview'";
      }
     ?>
    >
      <a href="#">
        <i class="fa fa-users"></i> <span>Quiz / Ulangan</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li 
        <?php 
          if ($subjudul='Buat Quiz') {
            echo "class='active'>";
          }
          else{
            echo "class=''>";
          }
        ?>
        <a href="<?php echo base_url();?>index.php/admin/Quiz/"><i class="fa fa-circle-o"></i> Buat Quiz</a></li>
        <li
        <?php 
          if ($subjudul='Daftar Data Quiz') {
            echo "class='active'>";
          }
          else{
            echo "class=''>";
          }
        ?>
        <a href="<?php echo base_url();?>index.php/admin/Daftar_quiz/"><i class="fa fa-circle-o"></i> List Data Quiz</a></li>
      </ul>
    </li>
<!-- End Menu Quiz/Ulangan -->
<!-- Menu Chat / Forum -->
 <li 
    <?php
      if ($judul=='Forum') {
        echo "class='active treeview'";
      }
      else{
        echo "class='treeview'";
      }
     ?>
    >
      <a href="#">
        <i class="fa fa-wechat"></i> <span>Forum/Chat</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li 
        <?php 
          if ($subjudul='List Group Chat') {
            echo "class='active'>";
          }
          else{
            echo "class=''>";
          }
        ?>
        <a href="<?php echo base_url();?>index.php/adminn/Forum/"><i class="fa fa-circle-o"></i> List Group Chat</a></li>
      </ul>
    </li>
<!-- End Menu Chat/ Forum -->
  </ul>
