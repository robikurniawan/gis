<?php
session_start();
header('Content-Type: application/json');

require ('config.php');
$kec = $_SESSION['kecamatan'];
$user = $_SESSION['id_user'];
if($_SESSION['level'] == 'a'){
	$sql = "SELECT a.*, b.nama_kecamatan as nama_kecamatan,
	c.nama_status as nama_status, c.warna as warna
	FROM lokasi_lahan AS a JOIN kecamatan AS b
	ON a.kecamatan = b.id
	JOIN status AS c
	ON a.status = c.id ORDER BY a.id";
}else{
	$sql = "SELECT a.*, b.nama_kecamatan as nama_kecamatan,
	c.nama_status as nama_status, c.warna as warna
	FROM lokasi_lahan AS a JOIN kecamatan AS b
	ON a.kecamatan = b.id
	JOIN status AS c
	ON a.status = c.id WHERE a.id_user = '$user' ORDER BY a.id";
}


$data = mysqli_query($link,$sql);

$json = '{"bengkulu": {';
$json .= '"lahan":[ ';
while($x = mysqli_fetch_assoc($data)){
	$json .= '{';
	$json .= '"id":"'.$x['id'].'",
		"nama_lokasi":"'.htmlspecialchars($x['nama_lokasi']).'",
		"kecamatan":"'.htmlspecialchars($x['nama_kecamatan']).'",
		"status":"'.$x['nama_status'].'",
		"keterangan":"'.htmlspecialchars($x['keterangan']).'",
		"alamat":"'.htmlspecialchars($x['alamat']).'",
		"polygon":"'.$x['polygon'].'",
		"warna":"'.$x['warna'].'",
		"gambar":"'.$x['gambar'].'"
	},';
}

$json = substr($json,0,strlen($json)-1);
$json .= ']';
$json .= '}}';

echo $json;
// testing
?>
