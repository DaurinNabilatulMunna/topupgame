<?php
error_reporting(1); // error ditampilkan
class Client_detail
{	private $url;
	
    // function yang pertama kali di-load saat class dipanggil
	public function __construct($url)
	{	$this->url = $url;		
		unset($url);
	}	

	// function untuk menghapus selain huruf dan angka
	public function filter($data)
	{	$data = preg_replace('/[^a-zA-Z0-9]/','',$data);
		return $data;
		unset($data);
	}

	public function tampil_semua_detailgame()
	{	
		$client = curl_init($this->url);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
		$response = curl_exec($client);
		curl_close($client);
		$data = json_decode($response);		
		// mengembalikan data
		return $data;
		// menghapus variable dari memory
		unset($data,$client,$response);
	}
	
	public function tampil_detailgame($id_detailgame)
	{	
		$id_detailgame = $this->filter($id_detailgame);
		$client = curl_init($this->url."?aksi=tampil&id_detailgame$id_detailgame=".$id_detailgame);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
		$response = curl_exec($client);
		curl_close($client);
		$data = simplexml_load_string($response);	
		return $data; 
		unset($id_detailgame,$client,$response,$data);		
	}	

	public function tambah_detailgame($data)
	{	
		$data = '{"id_detailgame":"' . $data['id_detailgame'] . '","nama_game":"' . $data['nama_game'] . '","kategori_game":"' . $data['kategori_game'] . '","rating":"' . $data['rating'] . '","size":"' . $data['size'] . '","aksi":"' . $data['aksi'] . '"}';
		$c = curl_init();
		curl_setopt($c,CURLOPT_URL,$this->url);
		curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($c,CURLOPT_POST,true);
		curl_setopt($c,CURLOPT_POSTFIELDS,$data);
		$response = curl_exec($c);
		curl_close($c);
		unset($data,$c,$response);
	}

	public function ubah_detailgame($data)
	{	
		$data = '{"id_detailgame":"' . $data['id_detailgame'] . '","nama_game":"' . $data['nama_game'] . '","kategori_game":"' . $data['kategori_game'] . '","rating":"' . $data['rating'] . '","size":"' . $data['size'] . '","aksi":"' . $data['aksi'] . '"}';
		$c = curl_init();
		curl_setopt($c,CURLOPT_URL,$this->url);
		curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($c,CURLOPT_POST,true);
		curl_setopt($c,CURLOPT_POSTFIELDS,$data);
		$response = curl_exec($c);
		curl_close($c);
		unset($data,$c,$response);
	}
	
	public function hapus_detailgame($data)
	{	
		$id_detailgame = $this->filter($data['id_detailgame']);
		$data = '{"id_detailgame":"' . $id_detailgame . '","aksi":"' . $data['aksi'] . '"}';
		$c = curl_init();
		curl_setopt($c,CURLOPT_URL,$this->url);
		curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($c,CURLOPT_POST,true);
		curl_setopt($c,CURLOPT_POSTFIELDS,$data);
		$response = curl_exec($c);
		curl_close($c);
		unset($id_detailgame,$data,$c,$response);		
	}	
	
	// function yang terakhir kali di-load saat class dipanggil
	public function __destruct()
	{	// hapus variable dari memory
		unset($this->options,$this->api);	
	}
}

$url = 'http://192.168.56.38/cinashop/server/server_detail.php';
// buat objek baru dari class Client
$api_detail = new Client_detail($url);
?>