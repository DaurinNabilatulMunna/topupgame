<?php
error_reporting(1);

include_once 'core.php';
include_once 'lib/php-jwt/src/BeforeValidException.php';
include_once 'lib/php-jwt/src/ExpiredException.php';
include_once 'lib/php-jwt/src/SignatureInvalidException.php';
include_once 'lib/php-jwt/src/JWT.php';

use \Firebase\JWT\JWT;

include_once "Database.php";
$abc = new Database();

if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header("Content-Type: application/json; charset=UTF-8");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 3600'); // cache selama 1 jam
}

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET,POST,OPTIONS");
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    exit(0);
}

$postdata = file_get_contents("php://input");
$data = json_decode($postdata);

function filter($data)
{
    $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
    return $data;
    unset($data);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($data->id_login) and isset($data->username) and isset($data->password)) {
    $data2['id_login'] = $data->id_login;
    $data2['username'] = $data->username;
    $data2['password'] = $data->password;

    //cek login pengguna
    if ($abc->login($data2)) {
        // generate json web token (jwt)
        $token = array(
            "iat" => $issued_at,
            "exp" => $expiration_time,
            "iss" => $issuer,
            "data" => array(
                "id_login" => $data2['id_login'],
                "username" => $data2['username'],
                "password" => $data2['password']
            )
        );
        // set response code
        http_response_code(200);
        // generate jwt
        $jwt = JWT::encode($token, $key);
        echo json_encode(
            array(
                "message" => "Login Sukses",
                "jwt" => $jwt
            )
        );
    } else {
        // set response code
        http_response_code(401);
        echo json_encode(array("message" => "Login Gagal"));
    }
} else { // error jika tanpa jwt
    // set response code
    http_response_code(401);
    echo json_encode(array("message" => "Acces denied"));
}
unset($abc, $postdata, $data, $data2, $data3, $token, $key, $issued_at, $expiration_time, $issuer, $jwt, $id_barang, $nama_barang, $aksi, $e);
