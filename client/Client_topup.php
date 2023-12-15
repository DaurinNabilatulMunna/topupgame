<?php
error_reporting(1); // error ditampilkan
class Client_topup
{	private $url;
	
    // function yang pertama kali di-load saat class dipanggil
	public function __construct($url)
	{	$this->url = $url;		
		unset($url);
	}	

	// function untuk menghapus selain huruf dan angka
	public function filter($data_topup)
	{	$data_topup = preg_replace('/[^a-zA-Z0-9]/','',$data_topup);
		return $data_topup;
		unset($data_topup);
	}

	public function tampil_semua_topup()
	{	
		$client = curl_init($this->url);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
		$response = curl_exec($client);
		curl_close($client);
		$data_topup = json_decode($response);		
		// mengembalikan data_topup
		return $data_topup;
		// menghapus variable dari memory
		unset($data_topup,$client,$response);
	}
	
	public function tampil_topup($id_topup)
	{	
		$id_topup = $this->filter($id_topup);
		$client = curl_init($this->url."?aksi=tampil&id_topup$id_topup=".$id_topup);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
		$response = curl_exec($client);
		curl_close($client);
		$data_topup = simplexml_load_string($response);	
		return $data_topup; 
		unset($id_topup,$client,$response,$data_topup);		
	}	

	public function tambah_topup($data_topup)
	{	
		$data_topup = '{"id_topup":"' . $data_topup['id_topup'] . '","id_detailgame":"' . $data_topup['id_detailgame'] . '","topup":"' . $data_topup['topup'] . '","harga":"' . $data_topup['harga'] . '","pembayaran":"' . $data_topup['pembayaran'] . '","aksi":"' . $data_topup['aksi'] . '"}';
		$c = curl_init();
		curl_setopt($c,CURLOPT_URL,$this->url);
		curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($c,CURLOPT_POST,true);
		curl_setopt($c,CURLOPT_POSTFIELDS,$data_topup);
		$response = curl_exec($c);
		curl_close($c);
		unset($data_topup,$c,$response);
	}

	public function ubah_topup($data_topup)
	{	
		$data_topup = '{"id_topup":"' . $data_topup['id_topup'] . '","id_detailgame":"' . $data_topup['id_detailgame'] . '","topup":"' . $data_topup['topup'] . '","harga":"' . $data_topup['harga'] . '","pembayaran":"' . $data_topup['pembayaran'] . '","aksi":"' . $data_topup['aksi'] . '"}';
		$c = curl_init();
		curl_setopt($c,CURLOPT_URL,$this->url);
		curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($c,CURLOPT_POST,true);
		curl_setopt($c,CURLOPT_POSTFIELDS,$data_topup);
		$response = curl_exec($c);
		curl_close($c);
		unset($data_topup,$c,$response);
	}
	
	public function hapus_topup($data_topup)
	{	
		$id_topup = $this->filter($data_topup['id_topup']);
		$data_topup = '{"id_topup":"' . $id_topup . '","aksi":"' . $data_topup['aksi'] . '"}';
		$c = curl_init();
		curl_setopt($c,CURLOPT_URL,$this->url);
		curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($c,CURLOPT_POST,true);
		curl_setopt($c,CURLOPT_POSTFIELDS,$data_topup);
		$response = curl_exec($c);
		curl_close($c);
		unset($id_topup,$data_topup,$c,$response);		
	}	
	
	// function yang terakhir kali di-load saat class dipanggil
	public function __destruct()
	{	// hapus variable dari memory
		unset($this->options,$this->api);	
	}
}

$url = 'http://192.168.56.38/cinashop/server/server_topup.php';
// buat objek baru dari class Client
$api_topup = new Client_topup($url);
?>