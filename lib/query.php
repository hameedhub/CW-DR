<?php

/**
 * 
 */
class Query
{
	
	function __construct($db)
	{
		$this->db = $db;
	}
	public function get_categories(){
		return $this->db->select("SELECT * FROM categories");
	}
	public function recent_products(){
		return $this->db->select("SELECT * FROM products ORDER BY id DESC LIMIT 10");
	}
	public function product_details($id){
		return $this->db->select("SELECT * FROM products WHERE id = ".$id);
	}
	public function similar_products(){
		return $this->db->select("SELECT * FROM products LIMIT 5");
	}
}


?>