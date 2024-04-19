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

	public function insert(array $data)
	{
		// get the keys in the array
		$keys = array_keys($data);

		// break the array to string with comma
		$columns = implode(",", $keys);

		// break the array to string with comma
		$values = implode(", :", $keys);

		$query = "INSERT INTO " . $this->table . " (" . $columns . ") VALUES (:" . $values . ")";
		print_r($query);

		return $this->query($query,$data);
	}

	public function update($id, $data)
	{		
		$query = "UPDATE " . $this->table . " SET ";
		foreach ($data as $key => $value) {		
			$query .= $key . " = :" . $key . ", ";
		}
		$query = trim($query, ", ");
		$query .= " WHERE id = :id";
		$data['id'] = $id;
		// echo $query;

		return $this->query($query,$data);
	}

	public function delete($id)
	{
		$query = "DELETE FROM " . $this->table . " WHERE id =:id";
		echo $query;
		return $this->query($query,[
			'id' => $id,
		]);
	}




} // End Class