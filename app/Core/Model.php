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
		$this->query_type = "select";

		$column = addslashes($column);
		$this->query = "SELECT * FROM " . $this->table . " WHERE " . $column . " = :".$column;
		// echo $query;
		$data =  $this->query($this->query,[
			$column => $value,
		]);

		// run functions after select
		if (is_array($data)) {
			if(property_exists($this, 'afterSelect')) {
				foreach($this->afterSelect as $func) {
					// note: the $func is just a variable holding the real value such as generate_user_id which makes it $this->generate_user_id() for instance as the $func gets replaced by the content value
					$data = $this->$func($data);
				}
			}	
		}

		return $data;
	}

	public function getWhere($column, $value)
	{
		$this->query_type = "select";

		$column = addslashes($column);
		$this->query = "SELECT * FROM " . $this->table . " WHERE " . $column . " = :".$column;
		// echo $query;
		$data =  $this->query($this->query,[
			$column => $value,
		]);

		// run functions after select
		if (is_array($data)) {
			if(property_exists($this, 'afterSelect')) {
				foreach($this->afterSelect as $func) {
					// note: the $func is just a variable holding the real value such as generate_user_id which makes it $this->generate_user_id() for instance as the $func gets replaced by the content value
					$data = $this->$func($data);
				}
			}	
		}

		if (is_array($data)) {
			$data = $data[0];
		}
		
		return $data;
	}

	public function findAll($order = "asc")
	{
		$this->query_type = "select";

		$this->query = "SELECT * FROM " . $this->table . " order by id " . $order;
		// echo $query;
		$data =  $this->query($this->query);

		// run functions after select
		if (is_array($data)) {
			if(property_exists($this, 'afterSelect')) {
				foreach($this->afterSelect as $func) {
					// note: the $func is just a variable holding the real value such as generate_user_id which makes it $this->generate_user_id() for instance as the $func gets replaced by the content value
					$data = $this->$func($data);
				}
			}
		}

		return $data;
	}

	public function insert($data)
	{
		$this->query_type = "insert";

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

		$this->query = "INSERT INTO " . $this->table . " (" . $columns . ") VALUES (:" . $values . ")";
		// print_r($query);

		return $this->query($this->query,$data);
	}

	public function update($id, $data)
	{	
		$this->query_type = "update";	
		$this->query = "UPDATE " . $this->table . " SET ";
		foreach ($data as $key => $value) {		
			$this->query .= $key . " = :" . $key . ", ";
		}
		$this->query = trim($this->query, ", ");
		$this->query .= " WHERE id = :id";
		$data['id'] = $id;
		// echo $query;

		return $this->query($this->query,$data);
	}

	public function delete($id)
	{
		$this->query = "DELETE FROM " . $this->table . " WHERE id =:id";
		// echo $query;
		return $this->query($this->query,[
			'id' => $id,
		]);
	}




} // End Class