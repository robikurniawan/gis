<?php
session_start();
header('Content-Type: application/json');
require ('config.php');

$kecamatan = isset($_GET['kecamatan']) ? $_GET['kecamatan'] : '';
$status = isset ($_GET['status']) ? $_GET['status'] : '';
$level = $_SESSION['level'];
$user = $_SESSION['id_user'];
if ($level == "a") {

$q = '';

if ($kecamatan != '' && $status == '') {
	$q = "WHERE a.kecamatan = '".$kecamatan."'";
} 

if ($kecamatan != '' && $status != '' ) {
	$q = "WHERE a.status = '".$status."' AND a.kecamatan = '".$kecamatan."'";
}

if ($kecamatan == '' && $status != '') {
	$q = "WHERE a.status = '".$status."'";
}

if ($kecamatan == '' && $status == '') {
	$q = "";
}

}else{
	$q = '';

	if ($kecamatan != '' && $status == '') {
		$q = "WHERE a.kecamatan = '".$kecamatan."' AND a.id_user = '".$user."'  ";
	} 

	if ($kecamatan != '' && $status != '' ) {
		$q = "WHERE a.status = '".$status."' AND a.kecamatan = '".$kecamatan."' AND a.id_user = '".$user."'  ";
	}

	if ($kecamatan == '' && $status != '') {
		$q = "WHERE a.status = '".$status."' AND a.id_user = '".$user."' ";
	}

	if ($kecamatan == '' && $status == '') {
		$q = " WHERE a.id_user = '".$user."'  ";
	}
}


	$sql = "SELECT a.*, b.nama_kecamatan as nama_kecamatan,  c.nama_status as status, c.warna as warna
						FROM lokasi_lahan AS a
						INNER JOIN kecamatan AS b ON a.kecamatan = b.id
						INNER JOIN status AS c ON a.status = c.id $q ORDER BY a.id ";



$data = mysqli_query($link,$sql);

$json = '{"bengkulu": {';
$json .= '"lahan":[ ';

$polygon = '';
if ($data) {
	while($x = mysqli_fetch_assoc($data)){
		$json .= '{';
		$json .= '"id":"'.$x['id'].'",
			"nama_lokasi":"'.htmlspecialchars($x['nama_lokasi']).'",
			"kecamatan":"'.htmlspecialchars($x['nama_kecamatan']).'",
			"status":"'.$x['status'].'",
			"keterangan":"'.$x['keterangan'].'",
			"alamat":"'.$x['alamat'].'",
			"polygon":"'.$x['polygon'].'",
			"warna":"'.$x['warna'].'"
		},';
	}

	$json = substr($json,0,strlen($json)-1);
	$json .= ']';
	$json .= '}}';
	echo $json;

} else {
	echo "";
}
?>
