<?php
include "Client_game.php";

if ($_POST['aksi'] == 'tambah') {
    $data_game = array(
        "id_game" => $_POST['id_game'],
        "id_detailgame" => $_POST['id_detailgame'],
        "id_topup" => $_POST['id_topup'],
        "tanggal" => $_POST['tanggal'],
        "email" => $_POST['email'],
        "aksi" => $_POST['aksi']
    );
    $abc->tambah_game($data_game);
    header("location: game.php");
} else if ($_POST['aksi'] == 'ubah') {
    $data_game = array(
        "id_game" => $_POST['id_game'],
        "id_detailgame" => $_POST['id_detailgame'],
        "id_topup" => $_POST['id_topup'],
        "tanggal" => $_POST['tanggal'],
        "email" => $_POST['email'],
        "aksi" => $_POST['aksi']
    );
    $abc->ubah_game($data_game);
    header("location: game.php");
} else if ($_GET['aksi'] == 'hapus') {
    $data_game = array("id_game"=>$_GET['id_game'],"aksi"=>$_GET['aksi']);
    $abc->hapus_game($data_game);
    header("location: game.php");
}
unset($abc, $data_game);
?>