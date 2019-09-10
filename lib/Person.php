<?php include_once 'config/init.php'; ?>
<?php
class Person {
	private $db;

	public function __construct() {
		$this->db = new Database;
	}

	public function displayAllPerson() {
		return $this->db->getAll('tblperson');
	}
}