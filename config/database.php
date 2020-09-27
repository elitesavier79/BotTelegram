<?php

	class Database {
		private $host = 'localhost';
		private $user = 'id14714306_zavetradatabase';
		private $password = 'Belajar2020pastibisa!';
		private $database = 'id14714306_tokozavetra';

		public function koneksi(){
		
				try{
					$conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
                    return $conn;
				}
				catch(PDOException $e){
					echo "Koneksi gagal : " . $e->getMessage();
				}
		
		}
	}

	$database = new Database();
	$connect = $database->koneksi();

	$stmt = $connect->prepare("SELECT * FROM barang");
	$stmt ->execute();
	$barang = $stmt->fetchAll(PDO::FETCH_ASSOC);

	print_r($barang);
