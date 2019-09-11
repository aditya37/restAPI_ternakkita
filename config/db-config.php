<?php
/*
* ====================================================
* Date Cretated  : 09-09-2019
* database       : MySQL
* creator        : Aditya Rahman
* Database name  : db_ternakkita
* ====================================================
*/
class database {

	private $host = "localhost";
	private $username = "admin";
	private $pass = "lymousin";
	private $db = "db_ternakkita";

	protected $koneksi;

	public function __construct(){

		if (!isset($this->koneksi)){ // cek koneksi ke database server --start--

			$this->koneksi = new mysqli($this->host,$this->username,$this->pass,$this->db);

			if(!$this->koneksi){ // validasi koneksi ke database server --start--
				echo "Cannot connect to database server";
				exit();
			} // validasi koneksi ke database server --stop--

		} // cek koneksi ke database server --stop--

		return $this->koneksi;
	}


}
