<?php
include "Client_detail.php";

if ($_POST['aksi'] == 'tambah') {
    $data = array(
        "id_detailgame" => $_POST['id_detailgame'],
        "nama_game" => $_POST['nama_game'],
        "kategori_game" => $_POST['kategori_game'],
        "rating" => $_POST['rating'],
        "size" => $_POST['size'],
        "aksi" => $_POST['aksi']
    );
    $api_detail->tambah_detailgame($data);
    header("location: detailgame.php");
} else if ($_POST['aksi'] == 'ubah') {
    $data = array(
        "id_detailgame" => $_POST['id_detailgame'],
        "nama_game" => $_POST['nama_game'],
        "kategori_game" => $_POST['kategori_game'],
        "rating" => $_POST['rating'],
        "size" => $_POST['size'],
        "aksi" => $_POST['aksi']
    );
    $api_detail->ubah_detailgame($data);
    header("location: detailgame.php");
} else if ($_GET['aksi'] == 'hapus') {
    $data = array("id_detailgame"=>$_GET['id_detailgame'],"aksi"=>$_GET['aksi']);
    $api_detail->hapus_detailgame($data);
    header("location: detailgame.php");
}
unset($api_detail, $data);
?>