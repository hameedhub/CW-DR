<?php 

/**
 * 
 */
class Auth
{
	
	function __construct($db)
	{
		$this->db = $db;
	}
	private function sanitize($input, $type){
		
		if($type === 'email'){
		 	return filter_var($input, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		}
		if($type === 'string'){
			return filter_var($input, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		}
		

	}
	public function register($payload, $role = 'user')
	{
		print_r($payload);
		
		$name = $this->sanitize($payload["name"], 'string');
		$email = $this->sanitize($payload["email"], 'email');
		$password = $this->sanitize($payload["password"],'string');
		$phone = $this->sanitize($payload["phone"], 'string');
		$address = $this->sanitize($payload["email"], 'string');

		$id = $this->db->insert("INSERT INTO `users` (name, email, password, phone, address, role) VALUES 
			('".$name."', '".$email."', '".password_hash($password, PASSWORD_DEFAULT)."', '".$phone."', '".$address."', '".$role."' )");

		echo $id;
		if (is_numeric($id)) {

			return true;
		}
		return false;

	}

	public function login($payload = array())
	{
		// validation
		
	}


}

?>