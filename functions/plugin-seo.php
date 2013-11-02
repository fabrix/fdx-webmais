<?php
// **************************************************************************
// S.E.O
// **************************************************************************
function csv_tags() {
	$posttags = get_the_tags();
	foreach((array)$posttags as $tag) {
		@$csv_tags .= $tag->name . ',';
	}
	echo $csv_tags;
}

function head_meta_desc() {
	/* >> user-configurable variables */
	$default_blog_desc = ''; // default description (setting overrides blog tagline)
	$post_desc_length  = 30; // description length in # words for post/Page
	$post_use_excerpt  = 1; // 0 (zero) to force content as description for post/Page
	$custom_desc_key   = 'description'; // custom field key; if used, overrides excerpt/content
	/* << user-configurable variables */

	global $cat, $cache_categories, $wp_query, $wp_version;
	if(is_single() || is_page()) {
		$post = $wp_query->post;
		$post_custom = get_post_custom($post->ID);
		@$custom_desc_value = $post_custom["$custom_desc_key"][0];

		if($custom_desc_value) {
			$text = $custom_desc_value;
		} elseif($post_use_excerpt && !empty($post->post_excerpt)) {
			$text = $post->post_excerpt;
		} else {
			$text = $post->post_content;
		}
		$text = str_replace(array("\r\n", "\r", "\n", "  "), " ", $text);
		$text = str_replace(array("\""), "", $text);
		$text = trim(strip_tags($text));
		$text = explode(' ', $text);
		if(count($text) > $post_desc_length) {
			$l = $post_desc_length;
			$ellipsis = '...';
		} else {
			$l = count($text);
			$ellipsis = '';
		}
		$description = '';
		for ($i=0; $i<$l; $i++)
			$description .= $text[$i] . ' ';

		$description .= $ellipsis;
	} elseif(is_category()) {
		$category = $wp_query->get_queried_object();
		$description = trim(strip_tags($category->category_description));
	} else {
		$description = (empty($default_blog_desc)) ? trim(strip_tags(get_bloginfo('description'))) : $default_blog_desc;
	}

	if($description) {
		echo $description;
	}
}
?>