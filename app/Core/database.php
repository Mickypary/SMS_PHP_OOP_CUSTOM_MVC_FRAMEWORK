<?php


/**
 * database connection
 */
class Database
{
	protected $query;
	protected $query_type = "select";

	private function connect()
	{
		// code...
		$string = DBDRIVER.":host=".DBHOST.";dbname=".DBNAME;
		if(!$dsn = new PDO($string, DBUSER, DBPASS)) {
			die("Could not connect to database");
		}

		return $dsn;
	}

	public function query($query, $data = array(), $data_type = "object")
	{

		// $conn = $this->connect();
		// $stm = $conn->prepare($query);

		// if ($stm) {
		// 	$check = $stm->execute($data);
		// 	if ($check) {
		// 		if ($data_type == "object") {
		// 			$data = $stm->fetchAll(PDO::FETCH_OBJ);
		// 		}else {
		// 			$data = $stm->fetchAll(PDO::FETCH_ASSOC);
		// 		}

		// 		if (is_array($data) && count($data) > 0) {
		// 			return $data;
		// 		}

		// 		// return true;
		// 	}
		// }

		// return false;

		$this->query = $query;
		$conn = $this->connect();
		$stm = $conn->prepare($this->query);
		$check = $stm->execute($data);
		if ($check) {

			switch ($this->query_type) {

				// For select query type
				case 'select':
					if ($data_type == "object") {
						$data = $stm->fetchAll(PDO::FETCH_OBJ);
					}else {
						$data = $stm->fetchAll(PDO::FETCH_ASSOC);
					}			

				break;

				case 'update':
					return true;
					break;

				case 'insert':
					return true;
					break;
				
				case 'delete':
					return true;
					break;
				
				default:
					// code...
					break;
			}
			
		}
		

		

		// run functions after select
		if (is_array($data)) {
			if(property_exists($this, 'afterSelect')) {
				foreach($this->afterSelect as $func) {
					// note: the $func is just a variable holding the real value such as generate_user_id which makes it $this->generate_user_id() for instance as the $func gets replaced by the content value
					$data = $this->$func($data);
				}
			}	
		}

		if (is_array($data) && count($data) > 0) {
			return $data;
		}

		return false;


	}





} // End Class