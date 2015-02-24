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