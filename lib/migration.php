<?php
require_once 'config.php';
require_once 'database.php';

/**
 * 
 */
class Migration
{
	function __construct($db)
	{
		$this->db = $db;
	}

	private function conn()
	{
		$conn = new mysqli(SERVERNAME,USERNAME,PASSWORD);
		// Check connection
		if ($conn->connect_error) {
		  die("Server connection failed: " . $conn->connect_error);
		}
		return $conn;
	}
	private function drop_db()
	{
		$statement="DROP DATABASE IF EXISTS ".DBNAME."";
		if ($this->conn()->query($statement) === TRUE) {
		  echo "============> Database was drop successfully! <============".'<br />';
		} else {
		  echo "Error creating database error : ".$this->conn()->error;
		}
	}
	public function create_db()
	{
		$this->drop_db();
		$statement = "CREATE DATABASE ".DBNAME;
		if ($this->conn()->query($statement) === TRUE) {
		  echo "============> Database created successfully! <=============".'<br />';
		} else {
		  echo "Error creating database error : ".$this->conn()->error;
		}
	}

	public function create_categories_table(){
		$statement = "CREATE TABLE ".DBNAME.".`categories` ( `id` INT NOT NULL AUTO_INCREMENT ,  `name` VARCHAR(50) NOT NULL ,  `route` VARCHAR(100) NOT NULL ,  `updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB";
		if ($this->conn()->query($statement) === TRUE) {
		  echo "============> Categories table successfully migrated! <============".'<br />';
		} else {
		  echo "Error migrating table categories error: ".$this->conn()->error;
		}
	}
	public function migrate_categories(){
		$sql = "INSERT INTO `categories` (name, route)
				VALUES ('Soft&nbsp;Drinks', './product.php'),
					('Whisky', './product.php'),
					('Wine &amp;&nbsp;Champagne', './product.php'),
					('Brandy', './product.php'),
					('Spirits &amp;&nbsp;Liqueurs', './product.php'),
					('Beer', './product.php'),
					('Rum &amp;&nbsp;Gin', './product.php'),
					('Cocktails &amp;&nbsp;Mixers', './product.php')";

		if ($this->db->multi_query($sql) === TRUE) {
			 echo "============> Categories were successfully migrated! <============".'<br />';
		} else {
		  echo "Error migrating categories ";
		}
	}
	public function create_products_table(){
		$statement = "CREATE TABLE ".DBNAME.".`products` ( `id` INT NOT NULL AUTO_INCREMENT ,  `name` VARCHAR(100) NOT NULL ,  `price` FLOAT NOT NULL DEFAULT '0' ,  `qty` INT NOT NULL DEFAULT '0' ,  `img` VARCHAR(200) NOT NULL ,  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,  `updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB;";
			if ($this->conn()->query($statement) === TRUE) {
			  echo "============> Products table successfully migrated! <============".'<br />';
			} else {
			  echo "Error migrating table products error: ".$this->conn()->error;
			}
	}
	public function migrate_products(){
			$sql = "INSERT INTO `products` (name, price, qty, img)
							VALUES ('Pinot Noir', '263.32', '12', '1.jpg'),
								('Chardonnay', '138.02', '10', '2.jpg'),
								('Airén. Airén', '43.74', '5', '3.jpg'),
								('Merlot', '163.31', '10', '4.jpg'),
								('Cabernet Sauvignon', '343.29', '10', '5.jpg'),
								('Tempranillo', '95.22', '10', '1.jpg'),
								('Garnacha', '78.92', '10', '5.jpg'),
								('Merlot', '163.31', '10', '4.jpg'),
								('Airén. Airén', '43.74', '5', '3.jpg'),
								('Sauvignon Blanc', '63.76', '10', '2.jpg')";

			if ($this->db->multi_query($sql) === TRUE) {
				 echo "============> Products were successfully migrated! <============".'<br />';
			} else {
			  echo "Error migrating products ";
			}
	}

	public function create_users_table(){
		// User table migration ....
		$statement = "CREATE TABLE ".DBNAME.".`users` ( `id` INT NOT NULL AUTO_INCREMENT ,  `name` VARCHAR(50) NOT NULL ,  `email` VARCHAR(100) NOT NULL ,  `password` VARCHAR(500) NOT NULL ,  `phone` VARCHAR(15) NOT NULL ,  `address` VARCHAR(100) NOT NULL ,  `role` ENUM('user','admin') NOT NULL ,  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,  `updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB";
		if ($this->conn()->query($statement) === TRUE) {
		  echo "============> Users table successfully migrated! <============".'<br />';
		} else {
		  echo "Error migrating table users error: ".$this->conn()->error;
		}

	}
	public function migrate_users(){
		$sql = "INSERT INTO `users` (name, email, password, phone, address, role)
				VALUES ('John Doe', 'john@example.com', '".password_hash("123456", PASSWORD_DEFAULT)."', '+447000000000', 'London', 'admin'),
					('Mary Moe', 'mary@example.com','".password_hash("123456", PASSWORD_DEFAULT)."', '+447000000000', 'London', 'user'),
					('Julie Dooley', 'julie@example.com','".password_hash("123456", PASSWORD_DEFAULT)."', '+447000000000', 'London', 'user');";

		if ($this->db->multi_query($sql) === TRUE) {
			 echo "============> Users were successfully migrated! <============".'<br />';
		} else {
		  echo "Error migrating users ";
		}
	}
}

$db = new Database();
$mg = new Migration($db);
$mg->create_db();
$mg->create_categories_table();
$mg->create_products_table();
$mg->create_users_table();
$mg->migrate_categories();
$mg->migrate_products();
$mg->migrate_users();




?>