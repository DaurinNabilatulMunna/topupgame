<?php
error_reporting(1);
class Client_login
{
    private $url;
    public function __construct($url)
    {
        $this->url = $url;
        unset($url);
    }

    public function filter($data)
    {
        $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
        return $data;
        unset($data);
    }

    public function login($data)
    {
        $data = '{
            "id_login":"' . $data['id_login'] . '",
            "username":"' . $data['username'] . '",
            "password":"' . $data['password'] . '",
            "aksi":"' . $data['aksi'] . '"
        }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        $data2 = json_decode($response);
        return $data2;
        unset($data, $data2, $c, $response);
    }
    public function __destruct()
    {
        unset($this->url);
    }
}

$url = 'http://192.168.56.38/cinashop/server/server_login.php';
$abc = new Client_login($url);
