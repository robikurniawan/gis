<?php

// result status

if (isset($_POST['update'])) {
	$lahan = $_POST['lahan'];
	$status = $_POST['update'];
	$q = mysqli_query($link,"UPDATE lokasi_lahan SET  status = '$status' WHERE id = '$lahan' ");
	if ($q) {
		echo ' <div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-info"></i> Sukses Update Data !</h4>
		Status Data Lahan Berhasil Diupdate
	  </div>';
	} else {
		echo "gagal";
	}

}

?>
<body  onload="peta_awal()">
<section class="content">
    <div class="row">
	<?php
	if ($_SESSION['level'] == "a") {

	?>
	<div class="col-md-12">
			<div class="box box-primary">
			<div class="box-header with-border">
			<div class="row">
				<div class="col-md-3">
					<select name="kecamatan" id="kecamatan" class="form-control">
						<option value="">Silahkan Pilih Kecamatan</option>
						<?php
							$sql = mysqli_query($link,"SELECT * FROM kecamatan");
							while($val = mysqli_fetch_array($sql)) {
								echo '<option value="'.$val['id'].'">'.$val['nama_kecamatan'].'</option>';
							}
						?>
					</select>
				</div>

				<div class="col-md-3">
					<select name="status" id="status" class="form-control">
						<option value="">Silahkan Pilih Status</option>
						<?php
							$sql = mysqli_query($link,"SELECT * FROM status");
							while($val = mysqli_fetch_array($sql)) {
								echo '<option value="'.$val['id'].'">'.$val['nama_status'].'</option>';
							}
						?>
					</select>
				</div>
				<div class="col-md-3">
					<button type="button" id="search" class="btn btn-primary">Cari Lokasi Lahan</button>
				</div>
			</div>
			<div class="row" style="margin-top:20px;">

				<div class="col-md-12">
					<div id="map-canvas" style="width:100%; height:500px;"></div>
				</div>
			</div>
		</div>
	</div>
	<?php
	}else{
	?>
	<div class="col-md-4">
		<div class="box box-primary" style="height:500px;">
			<div class="box-header with-border">
				<h3 class="box-title">Update Status Lahan</h3>
				<hr>
				<form action="" method="POST">
					<div class="form-group">
						<label for="">Nama </label>
						<select name="lahan" class="form-control" id="">
							<option value="">Pilih Lahan </option>
							<?php
								$q = mysqli_query($link,"SELECT * FROM lokasi_lahan WHERE id_user = '$_SESSION[id_user]' ");
								while($data = mysqli_fetch_array($q)){
									echo "<option value='$data[id]'>$data[nama_lokasi]</option>";
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4 col-xs-12 col-sm-12">
								<button type="submit" name="update" style="width:100%;" value="1" class="btn btn-success">Panen</button>
							</div>
							<div class="col-md-4">
								<button type="submit" name="update" style="width:100%;" value="2" class="btn btn-danger">Gagal</button>
							</div>
							<div class="col-md-4">
								<button type="submit" name="update" style="width:100%;" value="3" class="btn btn-warning">Tanam</button>
							</div>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
	<div class="col-md-8">
			<div class="box box-primary">
			<div class="box-header with-border">
			<div class="row">
				<div class="col-md-4">
					<select name="kecamatan" id="kecamatan" class="form-control">
						<option value="">Silahkan Pilih Kecamatan</option>
						<?php
							$sql = mysqli_query($link,"SELECT * FROM kecamatan");
							while($val = mysqli_fetch_array($sql)) {
								echo '<option value="'.$val['id'].'">'.$val['nama_kecamatan'].'</option>';
							}
						?>
					</select>
				</div>
				<div class="col-md-4">
					<select name="status" id="status" class="form-control">
						<option value="">Silahkan Pilih Status</option>
						<?php
							$sql = mysqli_query($link,"SELECT * FROM status");
							while($val = mysqli_fetch_array($sql)) {
								echo '<option value="'.$val['id'].'">'.$val['nama_status'].'</option>';
							}
						?>
					</select>
				</div>
				<div class="col-md-4">
					<button type="button" id="search" class="btn btn-primary">Cari Lokasi Lahan</button>
				</div>
			</div>
			<div class="row" style="margin-top:20px;">

				<div class="col-md-12">
					<div id="map-canvas" style="width:100%; height:420px;"></div>
				</div>
			</div>
		</div>
	</div>

	<?php
	}
	?>


</div>
</div>
</body>
