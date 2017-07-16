<?php

class Mysql
{

	private $hostname = 'localhost';
	private $username = 'root';
	private $password = '';
	private $dbName = 'VicNet';
	public $mysqli;

	public function __construct()
	{
		$this->mysqli = new mysqli($this->hostname, $this->username, $this->password, $this->dbName);
		if ($this->mysqli->connect_errno) {
			return '<ul class="alert alert-danger"><li>Error Connecting to the Database</li></ul>';
		} else {
			return '<ul class="alert alert-success"><li>Connected to the Database</li></ul>';
		}
	}

	public function __destruct()
	{
		return $this->mysqli->close();
	}

}

?>