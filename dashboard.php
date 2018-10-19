<?php
session_start();
require('config.php'); ?>

<!-- #ROBIKURNIAWAN -->

<!-- asdd -->


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GIS Pertanian</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?libraries=drawing&geometry"></script>
    <script src="app.js"></script>


  <!-- Bootstrap 3.3.6 -->
  <!-- <link rel="stylesheet" href="assets/AdminLTE-2.3.11/bootstrap/css/bootstrap.min.css"> -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <!-- Ionicons -->

  <!-- Theme style -->
  <link rel="stylesheet" href="assets/AdminLTE-2.3.11/dist/css/AdminLTE.min.css">

  <!-- <link href="assets/datatables/css/dataTables.bootstrap.css" rel="stylesheet"> -->


  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="assets/AdminLTE-2.3.11/dist/css/skins/_all-skins.min.css">





  <style media="screen">
  .modal-header {
    border-bottom-color: #2196F3;
    color: #ffffff;
    background: #2196f3;
    border-radius: 10px 10px 0px 0px;
  }
  /* @media (min-width: 768px) */
  .modal-content {
    -webkit-box-shadow: #a5a5a5c4;
    box-shadow: -1px 1px 20px 5px #a5a5a5c4;
    border-radius: 10px;
    /*margin-top: 40px;*/
  }

  .modal{
    background: rgba(6, 6, 6, 0.63);
  }
  h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6{
    font-family: Helvetica Neue, Segoe UI, Helvetica, Arial, sans-serif;
    font-weight: 400;
  }

  .skin-blue-light .sidebar-menu>li>a{
    font-weight: 500;
  }

  .form-control{
    border-radius: 5px;
  }

  .skin-blue-light .sidebar-menu>li:hover>a, .skin-blue-light .sidebar-menu>li.active>a{
      border-left: 4px solid #3096f3;
  }
  </style>


</head>
<body class="skin-blue-light sidebar-mini" style="font-family:Helvetica Neue, Segoe UI, Helvetica, Arial, sans-serif;">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php/home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b></b>GIS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">GIS <b>BONE</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">

      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- Notifications: style can be found in dropdown.less -->

          <!-- Tasks: style can be found in dropdown.less -->


          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="assets/AdminLTE-2.3.11/dist/img/avatar.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $_SESSION['nm_lengkap']?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="assets/AdminLTE-2.3.11/dist/img/avatar.png" class="img-circle" alt="User Image">

                <p>
                <?= $_SESSION['nm_lengkap']?>
                  <!-- <small>Member since Sept. 2017</small> -->
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">

                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <!-- <a href="#" onclick="loadContent('user/user_v');" class="btn btn-default btn-flat">Profile</a> -->
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="assets/AdminLTE-2.3.11/dist/img/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $_SESSION['nm_lengkap']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        <!-- <li><a href="#" onclick="loadContent('person');"><i class="fa fa-circle-o"></i> Person</a></li> -->
        <li><a href="dashboard.php?page=home"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
        <li><a href="dashboard.php?page=input"><i class="fa fa-users"></i> <span>Input Lahan</span> </a></li>
        <?php
        if ($_SESSION['level'] == "p") {
          echo "<li><a href='dashboard.php?page=lahan'><i class='fa fa-users'></i> <span>Lahan </span></a></li>";
        }

        ?>

        <?php
        if ($_SESSION['level'] == "a") {
          echo "<li><a href='dashboard.php?page=petani'><i class='fa fa-users'></i><span> Petani </span> </a></li>";
        }

        ?>
        <!-- <li><a href="#" onclick="loadContent('user/user_v');"><i class="fa fa-circle-o"></i> Profil</a></li> -->
          <!-- <li><a href="#" onclick="loadContent('berita');"><i class="fa fa-circle-o"></i> Berita</a></li> -->

    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="contentLTE">



    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="text-center">
        <img src="dist/img/logobone.png" alt="" width="5%"><br>
        GIS Pemetaan Lahan Pertanian Kabupaten Bone
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="container">
        <div class="row">


                <?php include "content.php"; ?>


        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2017-2019 Developed By  <a href="https://robikurniawan.com">Robi Kurniawan</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- Bootstrap 3.3.6 -->
<script src="assets/AdminLTE-2.3.11/bootstrap/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="assets/AdminLTE-2.3.11/dist/js/app.min.js"></script>




</body>
</html>
