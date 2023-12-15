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
function filter($data)
{
	$data = preg_replace("/[^a-zA-Z0-9]/", "", $data);
	return $data;
	unset($data);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$data = json_decode($postdata);
	$id_detailgame = $data->id_detailgame;
	$nama_game = $data->nama_game;
	$kategori_game = $data->kategori_game;
	$rating= $data->rating;
	$size= $data->size;
	$aksi = $data->aksi;

	if ($aksi == 'tambah') {
		$data2 = array(
			'id_detailgame' => $id_detailgame,
			'nama_game' => $nama_game,
			'kategori_game' => $kategori_game,
			'rating' => $rating,
			'size' => $size
		);
		/* echo $data2['id_detailgame']; */
		$abc->tambah_detailgame($data2);
		
	} elseif ($aksi == 'ubah') {
		$data2 = array(
			'id_detailgame' => $id_detailgame,
			'nama_game' => $nama_game,
			'kategori_game' => $kategori_game,
			'rating' => $rating,
			'size' => $size,
			'aksi' => $aksi,
		);
		$abc->ubah_detailgame($data2);
	} elseif ($aksi == 'hapus') {
		$abc->hapus_detailgame($id_detailgame);
	}

	unset($postdata, $data, $data2, $id_detailgame, $nama_game, $kategori_game, $rating, $size, $aksi, $abc);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if (($_GET['aksi'] == 'tampil') and (isset($_GET['id_detailgame']))) {
		$id_detailgame= filter($_GET['id_detailgame']);
		$data = $abc->tampil_detailgame($id_detailgame);
		echo json_encode($data);
	} else {
		$data = $abc->tampil_semua_detailgame();
		echo json_encode($data);
	}

	unset($postdata, $data, $id_detailgame, $abc);
}