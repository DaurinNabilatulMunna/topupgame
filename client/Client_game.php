<?php
error_reporting(1); // error ditampilkan
class Client_game
{	private $url;
	
    // function yang pertama kali di-load saat class dipanggil
	public function __construct($url)
	{	$this->url = $url;		
		unset($url);
	}	

	// function untuk menghapus selain huruf dan angka
	public function filter($data_game)
	{	$data_game = preg_replace('/[^a-zA-Z0-9]/','',$data_game);
		return $data_game;
		unset($data_game);
	}

	public function tampil_semua_game()
	{	
		$client = curl_init($this->url);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
		$response = curl_exec($client);
		curl_close($client);
		$data_game = json_decode($response);		
		// mengembalikan data_game
		return $data_game;
		// menghapus variable dari memory
		unset($data_game,$client,$response);
	}
	
	public function tampil_game($id_game)
	{	
		$id_game = $this->filter($id_game);
		$client = curl_init($this->url."?aksi=tampil&id_game$id_game=".$id_game);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
		$response = curl_exec($client);
		curl_close($client);
		$data_game = simplexml_load_string($response);	
		return $data_game; 
		unset($id_game,$client,$response,$data_game);		
	}	

	public function tambah_game($data_game)
	{	
		$data_game = '{"id_game":"' . $data_game['id_game'] . '","id_detailgame":"' . $data_game['id_detailgame'] . '","id_topup":"' . $data_game['id_topup'] . '","tanggal":"' . $data_game['tanggal'] . '","email":"' . $data_game['email'] . '","aksi":"' . $data_game['aksi'] . '"}';
		$c = curl_init();
		curl_setopt($c,CURLOPT_URL,$this->url);
		curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($c,CURLOPT_POST,true);
		curl_setopt($c,CURLOPT_POSTFIELDS,$data_game);
		$response = curl_exec($c);
		curl_close($c);
		unset($data_game,$c,$response);
	}

	public function ubah_game($data_game)
	{	
		$data_game = '{"id_game":"' . $data_game['id_game'] . '","id_detailgame":"' . $data_game['id_detailgame'] . '","id_topup":"' . $data_game['id_topup'] . '","tanggal":"' . $data_game['tanggal'] . '","email":"' . $data_game['email'] . '","aksi":"' . $data_game['aksi'] . '"}';
		$c = curl_init();
		curl_setopt($c,CURLOPT_URL,$this->url);
		curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($c,CURLOPT_POST,true);
		curl_setopt($c,CURLOPT_POSTFIELDS,$data_game);
		$response = curl_exec($c);
		curl_close($c);
		unset($data_game,$c,$response);
	}
	
	public function hapus_game($data_game)
	{	
		$id_game = $this->filter($data_game['id_game']);
		$data_game = '{"id_game":"' . $id_game . '","aksi":"' . $data_game['aksi'] . '"}';
		$c = curl_init();
		curl_setopt($c,CURLOPT_URL,$this->url);
		curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($c,CURLOPT_POST,true);
		curl_setopt($c,CURLOPT_POSTFIELDS,$data_game);
		$response = curl_exec($c);
		curl_close($c);
		unset($id_game,$data_game,$c,$response);		
	}	
	
	// function yang terakhir kali di-load saat class dipanggil
	public function __destruct()
	{	// hapus variable dari memory
		unset($this->options,$this->api);	
	}
}

$url = 'http://192.168.56.38/cinashop/server/server_game.php';
// buat objek baru dari class Client
$abc = new Client_game($url);
?>