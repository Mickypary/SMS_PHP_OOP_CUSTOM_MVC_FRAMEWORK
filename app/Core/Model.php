<?php


/**
 * main model
 */
class Model extends Database
{

	function __construct()
	{
		// var_dump(property_exists($this, 'table'));
		// echo Model::class;
		if(!property_exists($this, 'table')) {
			$this->table = strtolower($this::class) . "s";
		}

	}

	public function where($column, $value)
	{
		$column = addslashes($column);
		$query = "SELECT * FROM " . $this->table . " WHERE " . $column . " = :".$column;
		// echo $query;
		return $this->query($query,[
			$column => $value,
		]);
	}

	public function findAll()
	{
		$query = "SELECT * FROM " . $this->table;
		// echo $query;
		return $this->query($query);
	}




} // End Class