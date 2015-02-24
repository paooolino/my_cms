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
		
		$parts = explode("/", $request);
		
		if( count($parts) == 1 ) {
		
			// check for a page with that slug
			$query = "SELECT * FROM pages WHERE page_slug = ?";
			$this->the_query = $DB->select( $query, array($parts[0]) );
			
		}
	}
	
	public function get_query_data() {
		return $this->the_query;
	}
	
}
