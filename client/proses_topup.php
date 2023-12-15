<?php
include "Client_topup.php";

if ($_POST['aksi'] == 'tambah') {
    $data_topup = array(
        "id_topup" => $_POST['id_topup'],
        "id_detailgame" => $_POST['id_detailgame'],
        "topup" => $_POST['topup'],
        "harga" => $_POST['harga'],
        "pembayaran" => $_POST['pembayaran'],
        "aksi" => $_POST['aksi']
    );
    $api_topup->tambah_topup($data_topup);
    header("location: topup.php");
} else if ($_POST['aksi'] == 'ubah') {
    $data_topup = array(
        "id_topup" => $_POST['id_topup'],
        "id_detailgame" => $_POST['id_detailgame'],
        "topup" => $_POST['topup'],
        "harga" => $_POST['harga'],
        "pembayaran" => $_POST['pembayaran'],
        "aksi" => $_POST['aksi']
    );
    $api_topup->ubah_topup($data_topup);
    header("location: topup.php");
} else if ($_GET['aksi'] == 'hapus') {
    $data_topup = array("id_topup"=>$_GET['id_topup'],"aksi"=>$_GET['aksi']);
    $api_topup->hapus_topup($data_topup);
    header("location: topup.php");
}
unset($api_topup, $data_topup);
?>