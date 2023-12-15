<?php
error_reporting(1);	// error ditampilkan
// header('Content-Type: text/xml; charset=UTF-8');
include "Database.php";
// buat objek baru dari class Database
$abc = new Database();

if (isset($_SERVER['HTTP_ORIGIN'])) {
	header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
	header('Access-Control-Allow-Credentials: true');
	header('Access-Control-Max-Age: 86400');
}

if ($_SERVER['REQUEST METHOD'] == 'OPTIONS') {
	if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
		header("Access-Control-Allow_Methods: GET, POST, OPTIONS");
	if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
		header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
	exit(0);
}
$postdata = file_get_contents("php://input");

// function untuk menghapus selain huruf dan angka
function filter($data_topup)
{
	$data_topup = preg_replace("/[^a-zA-Z0-9]/", "", $data_topup);
	return $data_topup;
	unset($data_topup);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$data_topup = json_decode($postdata);
	$id_topup = $data_topup->id_topup;
	$id_detailgame = $data_topup->id_detailgame;
	$topup = $data_topup->topup;
	$harga= $data_topup->harga;
	$pembayaran= $data_topup->pembayaran;
	$aksi = $data_topup->aksi;

	if ($aksi == 'tambah') {
		$data4 = array(
			'id_topup' => $id_topup,
			'id_detailgame' => $id_detailgame,
			'topup' => $topup,
			'harga' => $harga,
			'pembayaran' => $pembayaran
		);
		/* echo $data4['id_detailgame']; */
		$abc->tambah_topup($data4);
		
	} elseif ($aksi == 'ubah') {
		$data4 = array(
			'id_topup' => $id_topup,
			'id_detailgame' => $id_detailgame,
			'topup' => $topup,
			'harga' => $harga,
			'pembayaran' => $pembayaran,
			'aksi' => $aksi,
		);
		$abc->ubah_topup($data4);
	} elseif ($aksi == 'hapus') {
		$abc->hapus_topup($id_topup);
	}

	unset($postdata, $data_topup, $data4, $id_topup, $id_detailgame, $topup, $harga, $pembayaran, $aksi, $abc);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if (($_GET['aksi'] == 'tampil') and (isset($_GET['id_topup']))) {
		$id_topup= filter($_GET['id_topup']);
		$data_topup = $abc->tampil_topup($id_topup);
		echo json_encode($data_topup);
	} else {
		$data_topup = $abc->tampil_semua_topup();
		echo json_encode($data_topup);
	}

	unset($postdata, $data_topup, $id_topup, $abc);
}