<?php 

class Database {
	// menulisa data database yang ada di config
	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $db_name = DB_NAME;

	// membuat variable unruk koneksi
	private $dbh; // database handler
	private $stmt;

	public function __construct()
	{
		// data source name
		$dsn = 'mysql:host='. $this->host.';dbname='. $this->db_name;

		// membuat optimasi
		$option = [
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		];

		try{
			$this->dbh = new PDO($dsn, $this->user,  $this->pass, $option);
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function query($query)
	{
		$this->stmt = $this->dbh->prepare($query);
	}

	// binding data
	public function bind($param, $value, $type = null)
	{
		if ( is_null($type)) {
			Switch( true ){
				case is_int($value) :
					$type = PDO::PARAM_INT;// integer
					break;
				case is_bool($value) :
					$type = PDO::PARAM_BOOL;// boolean
					break;
				case is_null($value) :
					$type = PDO::PARAM_NULL; // null / kosong
					break;
				default :
					$type = PDO::PARAM_STR;// string
			}
		}

		$this->stmt->bindValue($param, $value, $type);
	}

	//eksekusi 
	public function execute()
	{
		$this->stmt->execute();
	}

	// result
	// hasil banyak data
	public function resultSet()
	{
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}


	// data cuma satu
	public function single()
	{
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function rowCount()
	{
		return $this->stmt->rowCount();
	}


}