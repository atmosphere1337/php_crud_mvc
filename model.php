<?php

class Account {
	public $id;	
	public $first_name;	
	public $last_name;	
	public $email;	
	public $company_name;	
	public $position;	
	public $phone1;
	public $phone2;
	public $phone3;
	
	
	public static function findAll()
	{
		$mysqli = new mysqli("localhost", "root", "1337", "zimlab");
		$result = $mysqli->query("SELECT * FROM account");
		$mysqli->close();
		$output = array();
		while ($el = $result->fetch_object())
			array_push($output, $el);
		return $output;
	}
	public function create()
	{
		$array_representation = (array)$this;
		$params = implode(', ', array_keys($array_representation));
		foreach (array_keys($array_representation) as $element) {
			if (isset($array_representation[$element]))
				$array_representation[$element] = "'$array_representation[$element]'";
			else
				$array_representation[$element] = 'NULL';	
		}
		$values = implode(', ', array_values($array_representation));
		$query = "INSERT INTO account($params) VALUES ($values)";
		$mysqli = new mysqli("localhost", "root", "1337", "zimlab");
		$mysqli->query($query);
		$mysqli->close();
	}
	public static function delete($id) {
		$query = "DELETE FROM account WHERE id=$id";
		$mysqli = new mysqli("localhost", "root", "1337", "zimlab");
		$mysqli->query($query);
		$mysqli->close();
	}
	public function update()
	{
		$array_representation = (array)$this;
		$set_array = [];
		foreach (array_keys($array_representation) as $element) {
			if (isset($array_representation[$element])) 
				array_push($set_array, "$element='$array_representation[$element]'");
		}
		$set_string = implode(', ', $set_array);
		$query = "UPDATE account SET $set_string WHERE id=$this->id";
		$mysqli = new mysqli("localhost", "root", "1337", "zimlab");
		$mysqli->query($query);
		$mysqli->close();
	}

}
//		CREATE TABLE account (
//			id INT PRIMARY KEY AUTO_INCREMENT,
//			first_name VARCHAR(60) NOT NULL,
//			last_name VARCHAR(60) NOT NULL,
//			email VARCHAR(100) NOT NULL,
//			company_name VARCHAR(70),
//			position VARCHAR(100),
//			phone1 INT,
//			phone2 INT,
//			phone3 INT,
//			CONSTRAINT unq UNIQUE (id, email)
//		);
?>
