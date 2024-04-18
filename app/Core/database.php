<?php


/**
 * database connection
 */
class Database
{
	
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
		$conn = $this->connect();
		$stm = $conn->prepare($query);
		if ($stm) {
			$check = $stm->execute($data);
			if ($check) {
				if ($data_type == "object") {
					$data = $stm->fetchAll(PDO::FETCH_OBJ);
				}else {
					$data = $stm->fetchAll(PDO::FETCH_ASSOC);
				}

				if (is_array($data) && count($data) > 0) {
					return $data;
				}
				
			}
		}

		return false;
	}





} // End Class