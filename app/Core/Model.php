<?php


/**
 * main model
 */
class Model extends Database
{

	public $errors = array();

	public function __construct()
	{
		// var_dump(property_exists($this, 'table'));
		// echo Model::class;
		if(!property_exists($this, 'table')) {
			$this->table = strtolower($this::class) . "s";
		}
		// echo $this->beforeInsert[0];

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

	public function insert($data)
	{
		// remove unwanted columns
		if(property_exists($this, 'allowedColumns')) {
			foreach($data as $key => $value) {
				if (!in_array($key, $this->allowedColumns)) {
					unset($data[$key]);
				}
			}
		}

		// run functions before insert
		if(property_exists($this, 'beforeInsert')) {
			foreach($this->beforeInsert as $func) {
				// note: the $func is just a variable holding the real value such as generate_user_id which makes it $this->generate_user_id() for instance as the $func gets replaced by the content value
				$data = $this->$func($data);
			}
		}

		// get the keys in the array
		$keys = array_keys($data);

		// break the array to string with comma
		$columns = implode(",", $keys);

		// break the array to string with comma
		$values = implode(", :", $keys);

		$query = "INSERT INTO " . $this->table . " (" . $columns . ") VALUES (:" . $values . ")";
		// print_r($query);

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