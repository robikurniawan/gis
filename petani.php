<?php 
  if (isset($_POST['submit'])) {
    // echo "<h3>".$_POST['koor']."</h3>";
    $q = mysqli_query($link,"INSERT INTO lokasi_lahan (nama_lokasi,kecamatan,status,polygon) VALUES ('$_POST[nm_lokasi]','$_POST[kec]','$_POST[status]','$_POST[koor]')  ");

    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated');
    window.location.href='dashboard.php?page=home;
    </script>");
  }
  ?>

<link rel="stylesheet" href="css/style.css">

<body onload="initialize()">
  <section class="content">
    <div class="row">
    <?php
    $no = 1;
    $q = mysqli_query($link,"SELECT a.* , b.* FROM user a INNER JOIN kecamatan b ON a.kecamatan = b.id ORDER BY a.id_user DESC ");
    while($data = mysqli_fetch_array($q)){
    ?>
		  <div class="col-md-2">
        <div class="box box-primary">
          <div class="box-header with-border text-center">
              <img src="assets/AdminLTE-2.3.11/dist/img/avatar.png"  class="img-responsive" alt="">
              <a href="#"><h5><b><?= $data['nama_lengkap'] ?></b></h5></a>
              <h5><?= $data['alamat'] ?></h5>
          </div>
        </div>
      </div>
    <?php 
    }
    ?>
    </div>
  </section>
 


  <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false'></script>
  <script  src="js/index.js"></script>


</body>


