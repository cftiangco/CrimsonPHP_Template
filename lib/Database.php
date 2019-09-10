<?php

class Database {
	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $dbname = DB_NAME;

	private $dbh;
	private $stmt;
	private $error;

	/* CONSTRUCTOR PDO CONFIGURATION */
	public function __construct() {
		/* SET dsn */
		$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

		/* SET PDO OPTIONS */
		$options = array (
			PDO::ATTR_PERSISTENT =>	 true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		);

		/* CREATE PDO instance */
		try {
			$this->dbh = new PDO($dsn,$this->user,$this->pass,$options);
		} catch (PDOException $err) {
			echo $err->getMessage();
		}
	}

	/* SET DATABASE QUERY */
	public function query($sql,$parameters = []) {
		$this->stmt = $this->dbh->prepare($sql);

		try {
			return $this->stmt->execute($parameters);
		} catch(PDOException $e) {
			echo 'Error Found:' . $e->getMessage();
		}
		
	}

	/* FETCH MULTIPLE RESULT*/
	public function fetchAll() {
		return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}

	/* FETCH SINGLE RESULT */
	public function fetch() {
		return $this->stmt->fetch(PDO::FETCH_OBJ);
	}

}