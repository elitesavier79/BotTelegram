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

	
