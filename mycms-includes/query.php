<?php
/*
 * MyCMS_Query
 */
/**
 * The MyCMS Query class.
 *
 */
 
class MyCMS_Query {

	private $the_query;
	public $template;
	
	/**
	 * Constructor.
	 *
	 * Sets up the MyCMS query, if parameter is not empty.
	 *
	 * @access public
	 *
	 * @param string|array $query URL query string or array of vars.
	 */
	 
	public function __construct( $request ) {
		global $DB;
		
		$this->template = "404";
		
		$parts = explode("/", $request);

		if( count($parts) == 1 ) {
		
			// check for a page with that slug
			$query = "SELECT * FROM pages 
				WHERE 
					page_slug = ? 
					AND page_status = 'publish'
					AND page_parent = 0
			";
			$data = $DB->select( $query, array($parts[0]) );
			if( count($data) == 1 ) {
				$this->the_query = $data;
				$this->template = "page";
			}
			
		}
	}
	
	public function get_query_data() {
		return $this->the_query;
	}
	
	public function get_title() {
		return $this->the_query[0]["page_title"];
	}
	
}
