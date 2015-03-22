<?php

namespace Mpwarfwk\Database;

use PDO;

class PdoDatabase {

	private $database;
	private $dbConnection;

	public function __construct() {

		$this->dbConnection = require('../src/Config/DatabaseConfig.php');

		$db = $this->dbConnection["DATABASE"];
		$host = $this->dbConnection["HOST"];
		$user = $this->dbConnection["USER"];
		$pwd = $this->dbConnection["PASSWORD"];
					
		$this->database = new PDO('mysql:dbname=' . $db . ';host=' . $host, $user, $pwd);
	    $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $this->database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	}

	public function selectAllFromTable($table) {

		$statement = $this->database->prepare("SELECT * FROM $table");
		$statement->execute();
		return $statement->fetchAll();
	}

	public function selectFromTable($query, $data = NULL) {

		//ESPERA RECIBIR QUERIES CON ESTA ESTRUCTURA => 
		//"SELECT email FROM subscribers" o "SELECT email FROM subscribers WHERE id = :id"

		$statement = $this->database->prepare($query);
		if($data != NULL){
			foreach ($data as $key => $actualValue) {
				$statement->bindValue(":$key", $actualValue);
			}
		}
		$statement->execute();
		return $statement->fetchAll();
	}


	public function insertInTable($query, $data) {

		//ESPERA RECIBIR QUERIES CON ESTA ESTRUCTURA => "INSERT INTO subscribers SET email = :email"
		$statement = $this->database->prepare($query);
		foreach ($data as $key => $actualValue) {
			$statement->bindValue(":$key", $actualValue);
		}
		return $statement->execute();
	}

	public function deleteFromTable($table, $id, $value) {

		$statement = $this->database->prepare("DELETE FROM $table WHERE $id = '$value' LIMIT 1");
		return $statement->execute();
	}

	public function updateTable($query, $data) {
		
		//ESPERA RECIBIR QUERIES CON ESTA ESTRUCTURA => "UPDATE subscribers SET email = :email WHERE id = :id" 
		$statement = $this->database->prepare($query);
		foreach ($data as $key => $actualValue) {
			$statement->bindValue(":$key", $actualValue);
		}
		return $statement->execute();
	}  
}