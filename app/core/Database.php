<?php 

Trait Database
{
	
	/**
	 * @return PDO
	 */
	private function connect(): PDO {
		$string = "mysql:hostname=".DBHOST.";dbname=".DBNAME;
		return new PDO($string,DBUSER,DBPASS);
	}
	
	/**
	 * @param $query
	 * @param array $data
	 *
	 * @return bool|array
	 */
	public function query($query, array $data = []): bool|array {

		$con = $this->connect();
		$stm = $con->prepare($query);

		$check = $stm->execute($data);
		if($check)
		{
			$result = $stm->fetchAll(PDO::FETCH_OBJ);
			if(is_array($result) && count($result))
			{
				return $result;
			}
		}

		return false;
	}
	
	/**
	 * @param       $query
	 * @param array $data
	 *
	 * @return false|mixed
	 */
	public function get_row($query, array $data = []): mixed {

		$con = $this->connect();
		$stm = $con->prepare($query);

		$check = $stm->execute($data);
		if($check)
		{
			$result = $stm->fetchAll(PDO::FETCH_OBJ);
			if(is_array($result) && count($result))
			{
				return $result[0];
			}
		}

		return false;
	}
	
}


