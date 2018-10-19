<?php 
  if (isset($_POST['submit'])) {
    // echo "<h3>".$_POST['koor']."</h3>";
    $user = $_SESSION['id_user'];
    $q = mysqli_query($link,"INSERT INTO lokasi_lahan (nama_lokasi,kecamatan,status,polygon,keterangan,id_user) 
              VALUES ('$_POST[nm_lokasi]','$_POST[kec]','$_POST[status]','$_POST[koor]','$_POST[ket]','$user')  ");

    echo "<script>
    window.alert('Succesfully Updated');
    window.location.href='dashboard.php?page=home;
    </script>";
  }
  ?>

<link rel="stylesheet" href="css/style.css">

<body onload="initialize()">
  <section class="content">
    <div class="row">
		  <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
          <div class="col-md-8">
              <div id="map-canvas"></div> 
            </div>
            
            <div class="col-md-4">
            <i>* <small>Drag Koordinat Pada Peta Untuk Menentukan Lokasi Lahan</small></i>
              <form action="" method="POST">
                <input type="hidden" name="kec" value="<?= $_SESSION['kecamatan']?>">
                <div class="form-group">
                  <label for="">Nama Lokasi</label>
                  <input type="text" class="form-control" name="nm_lokasi">
                </div>
                <?php 
                if ($_SESSION['level'] == "a") {
                ?>
                   <div class="form-group">
                    <label for="">Pemilik Lahan</label>
                    <select name="id_user" class="form-control" id="">
                      <option value="">Pilih Petani</option>
                      <?php 
                      $q = mysqli_query($link,"SELECT * FROM user WHERE level = 'p' ");
                      while($data = mysqli_fetch_array($q)){
                        echo "<option value=$data[id_user]> $data[nama_lengkap]</option>";
                      }
                      ?>
                    </select>
                  </div>
                <?php
                } else {
                ?>
                <input type="hidden" name="id_user" value='<?= $_SESSION['id_user']?>' id="">
                <?php
                }
                
                ?>
             
                <div class="form-group">
                  <label for="">Status</label>
                  <select name="status" class="form-control" id="">
                    <option value="">Pilih Status Lahan</option>
                    <?php 
                    $q = mysqli_query($link,"SELECT * FROM status ");
                    while($data = mysqli_fetch_array($q)){
                      echo "<option value=$data[id]> $data[nama_status]</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                    <label for="">Keterangan : </label>
                    <textarea name="ket" class="form-control"></textarea>
                </div>

                <textarea  style="display:none;" name="koor" id="info" required></textarea>
                <button type="submit" class="btn btn-primary"  name="submit">Simpan</button>
              </form>
            </div>
           
          </div>
        </div>
      </div>
    </div>
  </section>
 


  <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false'></script>
  <script  src="js/index.js"></script>


</body>