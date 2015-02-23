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
