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
    private static $TABLE_NAME = 'account';              
    private static $DATABASE_PARAMS = ['localhost','root','1337','zimlab'];

	public static function findAll() : array {
		//$mysqli = new mysqli("localhost", "root", "1337", "zimlab");
		$mysqli = new mysqli(...self::$DATABASE_PARAMS);
		$result = $mysqli->query("SELECT * FROM ".self::$TABLE_NAME);
		$mysqli->close();
		$output = array();
		while ($el = $result->fetch_object())
			array_push($output, $el);
		return $output;
	}
	public static function findPage(int $page, int $size) : array {
        $start = $page * $size;
        $query = "SELECT * FROM ".self::$TABLE_NAME." LIMIT $start, $size";
		$mysqli = new mysqli(...self::$DATABASE_PARAMS);
		$result = $mysqli->query($query);
		$mysqli->close();
		$output = array();
		while ($el = $result->fetch_object())
			array_push($output, $el);
		return $output;
	}

	public function create() {
		$array_representation = (array)$this;
		$params = implode(', ', array_keys($array_representation));
		foreach (array_keys($array_representation) as $element) {
			if (isset($array_representation[$element]))
				$array_representation[$element] = "'$array_representation[$element]'";
			else
				$array_representation[$element] = 'NULL';	
		}
		$values = implode(', ', array_values($array_representation));
		$query = "INSERT INTO ".self::$TABLE_NAME."($params) VALUES ($values)";
		$mysqli = new mysqli(...self::$DATABASE_PARAMS);
		$mysqli->query($query);
		$mysqli->close();
	}

	public static function delete($id) {
		$query = "DELETE FROM ".self::$TABLE_NAME." WHERE id=$id";
		$mysqli = new mysqli(...self::$DATABASE_PARAMS);
		$mysqli->query($query);
		$mysqli->close();
	}

	public function update() {
		$array_representation = (array)$this;
		$set_array = [];
		foreach (array_keys($array_representation) as $element) {
			if (isset($array_representation[$element])) 
				array_push($set_array, "$element='$array_representation[$element]'");
		}
		$set_string = implode(', ', $set_array);
		$query = "UPDATE ".self::$TABLE_NAME." SET $set_string WHERE id=$this->id";
		$mysqli = new mysqli(...self::$DATABASE_PARAMS);
        echo $query;
		$mysqli->query($query);
		$mysqli->close();
	}

    public function fill($array) {
        $object_vars = get_object_vars($this);
        foreach ($object_vars as $field=>$value) {
            if (isset($array[$field]) && $array[$field] != '')
                $this->$field = $array[$field];
        }
    }
}

