<?php 

class Wargaku_model {

	// private $wrg = [
	// 	[
	// 		"nama" => "diki",
	// 		"asal" => "rt 06"
	// 	],
	// 	[
	// 		"nama" => "asa",
	// 		"asal" => "rt 06"
	// 	],
	// 	[
	// 		"nama" => "niki",
	// 		"asal" => "rt 04"
	// 	],
	// 	[
	// 		"nama" => "adi",
	// 		"asal" => "rt 04"
	// 	],
	// ];

	// membuat variable
	private $table = 'wargaku';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}


	public function getAllWargaku()
	{
		//query
		$this->db->query('SELECT * FROM '. $this->table);
		return $this->db->resultSet();// kembalikan hasilnya
	}

	public function getWargakuById($id)
	{
		$this->db->query('SELECT * FROM '.$this->table.' WHERE id=:id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function tambahDataWargaku($data)
	{
		$query = "INSERT INTO wargaku VALUES ('', :nama, :asal)";
	 	// jalankan query
		$this->db->query($query);
		// binding
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('asal', $data['asal']);

		// eksekusi
		$this->db->execute();

		// mengembalikann nilai
		$this->db->rowCount();

	}

	public function editDataWargaku($data)
	{
		$query = "UPDATE wargaku SET nama = :nama, asal = :asal WHERE id = :id";

		$this->db->query($query);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('asal', $data['asal']);
		$this->db->bind('id', $data['id']);

		$this->db->execute();

		return $this->db->rowCount();

	}

	public function hapusDataWargaku($id)
	{
		$query = "DELETE FROM wargaku WHERE id = :id";
		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariDataWargaku()
	{
		$keyword = $_POST['keyword'];
		$query = "SELECT * FROM wargaku WHERE nama LIKE :keyword";
		$this->db->query($query);
		$this->db->bind('keyword', "%$keyword%");
		return $this->db->resultSet();
	}



}