<?php
/*
 * MyCMS_DB
 */
/**
 * The MyCMS Database class.
 *
 */
 
class MyCMS_DB {
	
	private $db;
	
	public function check_db_connection() {
		try {
			$this->db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.'', DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}
		catch(PDOException $e) {
			return false;
		}	
		
		return true;
	}

	public function check_db_tables() {
		// TO DO
		return 1;
	}

	public function create_db_tables() {
		// TO DO
		return 1;
	}
	
	public function select( $query, $data ) {
		try {
			$stmt = $this->db->prepare($query);
			$stmt->execute($data);
			return $stmt->fetchAll(PDO::FETCH_ASSOC);			
		} catch(PDOException $ex) {
			//
		}
	}
	
}