<?php
session_start();
include "config.php";
if (isset($_POST['login'])) {
error_reporting(0);

$username = $_POST['username'];
$pass     = sha1($_POST['password']);


    $sql = mysqli_query($link,"SELECT * FROM user WHERE username='$username' AND password='$pass'");
    if(mysqli_num_rows($sql)==1){//jika berhasil akan bernilai 1
        $qry = mysqli_fetch_array($sql);
        $_SESSION['id_user']   = $qry['id_user'];
        $_SESSION['username']   = $qry['username'];
        $_SESSION['password']   = $qry['password'];
        $_SESSION['nm_lengkap'] = $qry['nama_lengkap'];
        $_SESSION['level']      = $qry['level'];
        $_SESSION['kecamatan']      = $qry['kecamatan'];

        header('Location:dashboard.php?page=home');
    }else{
        $error = "<div class='alert alert-danger alert-dismissible'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          <i class='icon fa fa-ban'></i>
            Maaf, Username atau Password Anda Salah, Silahkan Coba Lagi.
        </div>";
    }
}

if (isset($_POST['regis'])) {
    $pass     = sha1($_POST['password']);
   $q = mysqli_query($link,"INSERT INTO user (nama_lengkap,username,password,kecamatan,alamat,level) 
                            VALUES ('$_POST[nm_lengkap]','$_POST[username]','$pass','$_POST[kecamatan]','$_POST[alamat]','p')
                        ");
     $result = "<div class='alert alert-success alert-dismissible'>
     <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
     <i class='icon fa fa-ban'></i>
      Registrasi Berhasil, Silahkan Login.
   </div>";

}

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GIS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <style>
    .btn{
        border-radius:6px;
    }
  </style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- <body class="hold-transition login-page" style="
    
"> -->

<body class="hold-transition login-page" style="font-family:helvetica;background-image: url('dist/img/bg.png') ;
			background-position: center center;
			background-repeat:  no-repeat;
			background-attachment: fixed;
			background-size:  cover;">

<!-- <div class="row" style="background-color:#9e9e9eb5; height:100%;" > -->
<div class="row">
    <div class="col-md-12">
        <center>
            <img src="dist/img/gis.png" alt="" width="50%" style="margin-top:150px;">
            <br>
            <button class="btn btn-lg btn-primary" data-toggle="modal" data-target="#modelId"><i class="fa fa-sign-in"></i>   Masuk  </button>
            &nbsp&nbsp&nbsp&nbsp
            <button class="btn btn-lg btn-success" data-toggle="modal" data-target="#modalup" > <i class="fa fa-user-plus"></i>    Registrasi Petani  </button>

        </center>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                <h4 class="modal-title" id="modelTitleId">Sign In</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                <?php
                if (isset($error)) {
                echo $error;
                }
                ?>
                <form action="" method="post">
                <div class="form-group has-feedback">
                    <input type="text" name="username" class="form-control" placeholder="Username" autofocus autocomplete="off">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                    
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                    <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
                </form>
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div> -->
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalup" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                <h4 class="modal-title" id="modelTitleId">Registrasi Petani </h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                <?php
                if (isset($result)) {
                echo  $result;
                }
                ?>
                <form action="" method="post">
                <div class="form-group has-feedback">
                    <input type="text" name="nm_lengkap" class="form-control" placeholder="Nama Lengkap" autofocus>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <select name="kecamatan" class="form-control" id="">
                        <option value="">Pilih Kecamatan</option>
                        <?php 
                        $q = mysqli_query($link,"SELECT * FROM kecamatan");
                        while($data = mysqli_fetch_array($q)){
                            echo "<option value='$data[id]'>$data[nama_kecamatan]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group has-feedback">
                    <textarea name="alamat" class="form-control" placeholder="Alamat Lengkap"></textarea>
                </div>

                <div class="form-group has-feedback">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                    
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                    <button type="submit" name="regis" class="btn btn-primary btn-block btn-flat">Registrasi</button>
                    </div>
                    <!-- /.col -->
                </div>
                </form>
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div> -->
        </div>
    </div>
</div>


<script>
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM
        
    });
</script>


<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>


