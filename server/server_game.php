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
function filter($data_game)
{
	$data_game = preg_replace("/[^a-zA-Z0-9]/", "", $data_game);
	return $data_game;
	unset($data_game);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$data_game = json_decode($postdata);
	$id_game = $data_game->id_game;
	$id_detailgame = $data_game->id_detailgame;
	$id_topup = $data_game->id_topup;
	$tanggal = $data_game->tanggal;
	$email = $data_game->email;
	$aksi = $data_game->aksi;

	if ($aksi == 'tambah') {
		$data3 = array(
			'id_game' => $id_game,
			'id_detailgame' => $id_detailgame,
			'id_topup' => $id_topup,
			'tanggal' => $tanggal,
			'email' => $email
		);
		/* echo $data3['id_detailgame']; */
		$abc->tambah_game($data3);

	} elseif ($aksi == 'ubah') {
		$data3 = array(
			'id_game' => $id_game,
			'id_detailgame' => $id_detailgame,
			'id_topup' => $id_topup,
			'tanggal' => $tanggal,
			'email' => $email,
			'aksi' => $aksi,
		);
		$abc->ubah_game($data3);
	} elseif ($aksi == 'hapus') {
		$abc->hapus_game($id_game);
	}

	unset($postdata, $data_game, $data3, $id_game, $id_detailgame, $id_topup, $tanggal, $email, $aksi, $abc);

} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if (($_GET['aksi'] == 'tampil') and (isset($_GET['id_game']))) {
		$id_game = filter($_GET['id_game']);
		$data_game = $abc->tampil_game($id_game);
		echo json_encode($data_game);
	} else {
		$data_game = $abc->tampil_semua_game();
		echo json_encode($data_game);
	}

	unset($postdata, $data_game, $id_game, $abc);
}