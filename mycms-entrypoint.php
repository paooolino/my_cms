<?php
/**
 * Bootstrap file for setting the ABSPATH constant
 * and loading the mycms-config.php file. 
 *
 * If the mycms-config.php file is not found then an error
 * will be displayed asking the visitor to set up the
 * mycms-config.php file.
 *
 * @package MyCMS
 */
 
/** Define ABSPATH as this file's directory */
define( 'ABSPATH', dirname(__FILE__) . '/' );

if ( file_exists( ABSPATH . 'mycms-config.php') ) {

	/** The config file resides in ABSPATH */
	require_once( ABSPATH . 'mycms-config.php' );
		
} else {
	
	// A config file doesn't exist
	die("A config file doesn't exist!");
	
}

require_once( ABSPATH . 'mycms-includes/functions.php' );


// debug mode
ini_set( 'display_errors', 1 );



// database check
require_once( ABSPATH . 'mycms-includes/database.php' );
$DB = new MyCMS_DB();

if( !$DB->check_db_connection() ) {
	die("A database connection could not be estabilished.");
}
if( !$DB->check_db_tables() ) {
	$DB->create_db_tables();
}



// getting request
$home_url = str_replace( "index.php", "", $_SERVER["PHP_SELF"] );
$request = rtrim(str_replace( $home_url, "", $_SERVER["REQUEST_URI"] ), '/');

// creating query infos
require_once( ABSPATH . 'mycms-includes/query.php' );
$the_query = new MyCMS_Query($request);

// display
define( 'THEME_NAME', 'default' );
require_once( ABSPATH . 'themes/'. THEME_NAME .'/' . $the_query->template . '.php' );



