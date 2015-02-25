<?php
/**
 * MyCMS Functions
 *
 * @package MyCMS
 */

function the_title( $id = 0 ) {
	echo get_the_title( $id );
}

function get_the_title( $id = 0 ) {
	global $the_query;
    if( $id == 0 ) {
        return $the_query->get_title();  
    } else {
        $page = get_page( $id );
        return $page["title"];
    }
}

function the_permalink( $id = 0 ) {
    echo get_the_permalink( $id );
}

function get_the_permalink( $id = 0 ) {
    global $the_query;
    if( $id == 0 ) {
        return $the_query->get_permalink();  
    } else {
        $page = get_page( $id );
        return $page["slug"];
    }
}

function get_header() {
    include( ABSPATH . 'themes/'. THEME_NAME .'/header.php' );
}

function get_footer() {
    include( ABSPATH . 'themes/'. THEME_NAME .'/footer.php' );
}

function nav_menu() {
    global $DB;
    $query = "SELECT * FROM menuitems WHERE menu_id = 0 ORDER BY menuitem_order";
    $items = $DB->select($query, array());
    $html = '<ul>';
    foreach( $items as $item ) {
        if( $item["menuitem_type"] == "page" ) {
            $html .= '<li><a href="'. get_the_permalink($item["type_id"]) .'">'. get_the_title($item["type_id"]) .'</a></li>';
        }
    }
    $html .= '</ul>';
    echo $html;
}

function get_page( $id ) {
    return array(
        "slug" => "slug",
        "title" => "title"
    );
}