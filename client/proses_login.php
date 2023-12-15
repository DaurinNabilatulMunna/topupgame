<?php
include "Client_login.php";

if ($_POST['login'] == 'Login') {
    $data = array(
        "id_login" => $id_login,
        "username" => $username,
        'password' => $password,
        'aksi' => $_POST['login']
    );
    $data2 = $abc->login($data);

    if ($data2) {
        setcookie('jwt', $data2->jwt, time() + 3600);
        setcookie('id_login', $data2->id_login, time() + 3600);
        setcookie('username', $data2->username, time() + 3600);
        setcookie('password', $data2->password, time() + 3600);
        header('location:index.php');
        // if ($data2->level == "Admin") {
        //     setcookie('jwt', $data2->jwt, time() + 3600);
        //     setcookie('id_login', $data2->id_login, time() + 3600);
        //     setcookie('username', $data2->username, time() + 3600);
        //     setcookie('password', $data2->password, time() + 3600);
        //     header('location:index.php');
        // } else if ($data2->level == "User") {
        //     setcookie('jwt', $data2->jwt, time() + 3600);
        //     setcookie('id_login', $data2->id_login, time() + 3600);
        //     setcookie('username', $data2->username, time() + 3600);
        //     setcookie('password', $data2->password, time() + 3600);
        //     header('location:user.php');
        // } else {
        //     header('location:login.php');
        // }
    } else {
        header('location:login.php');
    }
} else if ($_GET['aksi'] == 'logout') {
    session_unset();
    session_destroy();
    header('location:index.php');
}
unset($abc, $data, $data2);
