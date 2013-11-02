<?php

class medialibUploader {
    public static function init() {
        add_action("admin_head", 'medialibUploader::css');
        add_action("admin_init", 'medialibUploader::initSilentPost');
    }

    public static function action($id, $value, $desc = '', $postid = 0) {
        $output = '';
    	$class = '';
    	$int = self::getSilentPost($id);
    	
    	if ( $value ) { $class = ' has-file'; }
    	$output .= '<input id="' . $id . '" class="upload' . $class . '" type="text" name="'.$id.'" value="' . $value . '" />' . "\n";
    	$output .= '<input id="upload_' . $id . '" class="upload_button button" type="button" value="' . __( 'Upload', 'fdx' ) . '" rel="' . $int . '" />' . "\n";
    	
    	if ($desc != '') {
    		$output .= '<p>' . $desc . '</p>' . "\n";
    	}
    	$output .= '<div class="clear">&nbsp;</div>';
    	$output .= '<div class="screenshot" id="' . $id . '_image">' . "\n";
    	
    	if ( $value != '' ) { 
    		$remove = '<a href="#" class="mlu_remove"></a>';
    		$image = preg_match( '/(^.*\.jpg|jpeg|png|gif|ico*)/i', $value );
    		if ( $image ) {
    			$output .= '<img src="' . $value . '" alt="" width="70" height="70" />'.$remove.'';
    		} else {
    			$parts = explode( "/", $value );
    			for( $i = 0; $i < sizeof( $parts ); ++$i ) {
    				$title = $parts[$i];
    			}

    			$title = __( 'View File', 'fdx');
    			$output .= '<div class="no_image"><span class="file_link"><a href="' . $value . '" target="_blank" rel="external">'.$title.'</a></span>' . $remove . '</div>';
    		}	
    	}
    	$output .= "</div>\n";

    	return $output;
    }

    public static function initSilentPost() {
        register_post_type('fdx', array(
        	'labels' => array(
        		'name' => __('fdx Exporter', 'fdx'),
        	),
        	'public' => true,
        	'show_ui' => false,
        	'capability_type' => 'post',
        	'hierarchical' => false,
        	'rewrite' => false,
        	'supports' => array( 'title', 'editor' ), 
        	'query_var' => false,
        	'can_export' => false,
        	'show_in_nav_menus' => false
        ));
    }

    public static function getSilentPost($token) {
        global $wpdb;

    	$args = array( 'post_type' => 'fdx', 'post_name' => $token, 'post_status' => 'draft', 'comment_status' => 'closed', 'ping_status' => 'closed' );

    	$query = 'SELECT ID FROM ' . $wpdb->posts . ' WHERE post_parent = 0';
    	foreach ( $args as $k => $v ) {
    		$query .= ' AND ' . $k . ' = "' . $v . '"';
    	}
    	
    	$query .= ' LIMIT 1';
    	$posts = $wpdb->get_row( $query );
    	
    	if (count($posts)) {
    		$id = $posts->ID;
    	} else {
    		$words = explode('_', $token);
    		$title = join(' ', $words);
    		$title = ucwords($title);
    		$post_data = array('post_title' => $title);
    		$post_data = array_merge($post_data, $args);
    		$id = wp_insert_post($post_data);
    	}

        return $id;
    }
    
    public static function css() {
        $out = "";
        $out.= '<link rel="stylesheet" href="' . get_option('siteurl') . '/' . WPINC . '/js/thickbox/thickbox.css" type="text/css" media="screen" />' . "\n";
        $out.= '<script type="text/javascript">
                var tb_pathToImage = "' . get_option('siteurl') . '/' . WPINC . '/js/thickbox/loadingAnimation.gif";
                var tb_closeImage = "' . get_option('siteurl') . '/' . WPINC . '/js/thickbox/tb-close.png";
                </script>' . "\n";
        
        echo $out;
    }
}