<?php
class Database
{	private $host="localhost";	
	private $dbname="cinashop";	
	private $user="root";
	private $password="";
	private $port="3306";
	private $conn;
	
	// function yang pertama kali di-load saat class dipanggil
	public function __construct()
	{	// koneksi database
		try
		{	$this->conn = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->dbname;charset=utf8",$this->user,$this->password);		
		} catch (PDOException $e)
		{	echo "Koneksi gagal";			
		}
	}

	public function login($data)
	{	$query = $this->conn->prepare("SELECT id_login, username, password, level FROM login WHERE id_login=? AND username=? AND password=?");
		$query->execute(array($data['id_login'],$data['username'],$data['password']));
		$data = $query->fetch(PDO::FETCH_ASSOC);		
		return $data;
		$query->closeCursor();
		unset($data);
	}

	public function tampil_semua_detailgame()
	{	$query = $this->conn->prepare("select id_detailgame, nama_game, kategori_game, rating, size from detailgame order by id_detailgame");
		$query->execute();	
		// mengambil banyak data dengan fetchAll	
		$data = $query->fetchAll(PDO::FETCH_ASSOC);		
		// mengembalikan data	
		return $data;	
		// hapus variable dari memory	
		$query->closeCursor();
		unset($data);
	}

	public function tampil_detailgame($id_detailgame)
	{	$query = $this->conn->prepare("select id_detailgame, nama_game, kategori_game, rating, size from detailgame where id_detailgame=?");
		$query->execute(array($id_detailgame));	
		// mengambil satu data dengan fetch	
		$data = $query->fetch(PDO::FETCH_ASSOC);
		return $data;		
		$query->closeCursor();
		unset($detailgame,$data);
	}

	public function tambah_detailgame($data)
	{	$query = $this->conn->prepare("insert ignore into detailgame (nama_game, kategori_game, rating, size) values (?,?,?,?)");
		$query->execute(array($data['nama_game'], $data['kategori_game'],$data['rating'],$data['size'],));	
		$query->closeCursor(); 
		unset($data);
	}

	public function ubah_detailgame($data)
	{	$query = $this->conn->prepare("update detailgame set nama_game=?, kategori_game=?, rating=?, size=? where id_detailgame=?");
		$query->execute(array($data['nama_game'], $data['kategori_game'],$data['rating'],$data['size'],$data['id_detailgame']));	
		$query->closeCursor(); 
		unset($data);
	}

	public function hapus_detailgame($id_detailgame)
	{	$query = $this->conn->prepare("delete from detailgame where id_detailgame=?");
		$query->execute(array($id_detailgame));	
		$query->closeCursor(); 
		unset($id_detailgame);
	}
	

	//UNTUK TABEL GAME 

	public function tampil_semua_game()
	{	
		$query = $this->conn->prepare("select game.id_game, detailgame.nama_game, topup.topup, game.tanggal, game.email from game, detailgame,topup where game.id_detailgame = detailgame.id_detailgame and game.id_topup = topup.id_topup order by id_game");
		$query->execute();	
		// mengambil banyak data dengan fetchAll	
		$data_game = $query->fetchAll(PDO::FETCH_ASSOC);		
		// mengembalikan data	
		return $data_game;	
		// hapus variable dari memory	
		$query->closeCursor();
		unset($data_game);
	}

	public function tampil_game($id_game)
	{	$query = $this->conn->prepare("select id_game,id_detailgame, id_topup, tanggal, email from game where id_game=?");
		$query->execute(array($id_game));	
		// mengambil satu data dengan fetch	
		$data_game = $query->fetch(PDO::FETCH_ASSOC);
		return $data_game ;		
		$query->closeCursor();
		unset($data_game,$data_game );
	}

	public function tambah_game($data_game)
	{	$query = $this->conn->prepare("insert ignore into game (id_detailgame, id_topup, tanggal, email) values (?,?,?,?)");
		$query->execute(array($data_game['id_detailgame'], $data_game['id_topup'],$data_game['tanggal'],$data_game['email'],));	
		$query->closeCursor(); 
		unset($data_game);
	}

	public function ubah_game($data_game)
	{	$query = $this->conn->prepare("update game set id_detailgame=?, id_topup=?, tanggal=?, email=? where id_game=?");
		$query->execute(array($data_game['id_detailgame'], $data_game['id_topup'],$data_game['tanggal'],$data_game['email'],$data_game['id_game']));	
		$query->closeCursor(); 
		unset($data_game);
	}

	public function hapus_game($id_game)
	{	$query = $this->conn->prepare("delete from game where id_game=?");
		$query->execute(array($id_game));	
		$query->closeCursor(); 
		unset($id_game);
	}

	//UNTUK TABEL TOPUP

	public function tampil_semua_topup()
	{	
		$query = $this->conn->prepare("select topup.id_topup, detailgame.nama_game, topup.topup, topup.harga, topup.pembayaran from topup, detailgame where topup.id_detailgame = detailgame.id_detailgame order by id_topup");
		$query->execute();	
		// mengambil banyak data dengan fetchAll	
		$data_topup = $query->fetchAll(PDO::FETCH_ASSOC);		
		// mengembalikan data	
		return $data_topup;	
		// hapus variable dari memory	
		$query->closeCursor();
		unset($data_topup );
	}

	public function tampil_topup($id_topup)
	{	$query = $this->conn->prepare("select id_topup ,nama_game, topup, harga, pembayaran from topup where id_topup=?");
		$query->execute(array($id_topup));	
		// mengambil satu data dengan fetch	
		$data_topup = $query->fetch(PDO::FETCH_ASSOC);
		return $data_topup ;		
		$query->closeCursor();
		unset($data_topup,$data_topup);
	}

	public function tambah_topup($data_topup)
	{	$query = $this->conn->prepare("insert ignore into topup (id_detailgame, topup, harga, pembayaran) values (?,?,?,?)");
		$query->execute(array($data_topup['id_detailgame'], $data_topup['topup'],$data_topup['harga'],$data_topup['pembayaran'],));	
		$query->closeCursor(); 
		unset($data_topup);
	}

	public function ubah_topup($data_topup)
	{	$query = $this->conn->prepare("update topup set id_detailgame=?, topup=?, harga=?, pembayaran=? where id_topup=?");
		$query->execute(array($data_topup['id_detailgame'], $data_topup['topup'],$data_topup['harga'],$data_topup['pembayaran'],$data_topup['id_topup']));		
		$query->closeCursor(); 
		unset($data_topup);
	}

	public function hapus_topup($id_topup)
	{	$query = $this->conn->prepare("delete from topup where id_topup=?");
		$query->execute(array($id_topup));	
		$query->closeCursor(); 
		unset($id_topup);
	}


}?>
