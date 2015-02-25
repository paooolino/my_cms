<?php
/**
 * MyCMS Functions
 *
 * @package MyCMS
 */

function the_title() {
	global $the_query;
	echo $the_query->get_title();
}

function get_header() {
    include( ABSPATH . 'themes/'. THEME_NAME .'/header.php' );
}

function get_footer() {
    include( ABSPATH . 'themes/'. THEME_NAME .'/footer.php' );
}
