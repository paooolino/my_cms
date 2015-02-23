<?php
/**
 * Front controller pattern
 * http://www.phptherightway.com/pages/Design-Patterns.html
 * 	
 * The front controller pattern is where you have a single entrance point for 
 * your web application (e.g. index.php) that handles all of the requests. 
 * This code is responsible for loading all of the dependencies, processing 
 * the request and sending the response to the browser. The front controller 
 * pattern can be beneficial because it encourages modular code and gives you 
 * a central place to hook in code that should be run for every request (such
 * as input sanitization).
 *
 * @package MyCMS
 */

require( dirname( __FILE__ ) . '/mycms-entrypoint.php' );
