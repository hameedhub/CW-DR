<?php

/**
 * 
 */
class Database
{
	
	public function conn(){
		$conn = new mysqli(SERVERNAME,USERNAME,PASSWORD,DBNAME);
		if ($conn->connect_error) {
			die('Failed to connect database:'.$conn->connect_error);
		}
		return $conn;
	}
	public function multi_query($statement){
		if($this->conn()->query($statement) == TRUE){
			return true;
		}
		return false;
	}
	public function insert($statement){
		if($this->conn()->query($statement) == TRUE){
			$this->conn()->close();
			return $this->conn()->insert_id;
		}
		$this->conn()->close();
		return $this->conn()->error;
	}
	public function select($statement){
		$result = $this->conn()->query($statement);
		$this->conn()->close();
		if ($result->num_rows > 0) {
			return $result->fetch_all(MYSQLI_ASSOC);
		}
		return array();
	}
	public function update($statement, $table, $id){
		if($this->conn()->query($statement) == TRUE){
			return $this->select("'SELECT * FROM ".$table." WHERE id='".$id."'");
		}
		return $this->conn()->error;
	}
	public function delete($statement){
		if($this->conn()->query($statement) == TRUE){
			return true;
		}
		return $this->conn()->error;
	}
}

?>