<?php // PORTFOLIO
	add_action('init', 'create_portfolio');
	function create_portfolio() {
		$portfolio_args = array(
		'label' 						=> __('Portfolio'),
		'singular_label'		=> __('Portfolio'),
		'public'						=> true,
		'show_ui'						=> true,
		'capability_type'		=> 'post',
		'hierarchical'			=> false,
		'rewrite'						=> true,
        'menu_icon' => get_template_directory_uri() . '/images/_slider.png',
        'exclude_from_search' => true,
		'supports'					=> array('title', 'editor', 'thumbnail')
		);
		register_post_type('work',$portfolio_args);
	}
?>
<?php // PORTFOLIO OPTIONS
   	add_action("admin_init", "add_portfolio");
	add_action('save_post', 'update_website_url');
   	function add_portfolio(){
  	 add_meta_box("portfolio_details", "Portfolio Options", "portfolio_options", "work", "normal", "low");
	}

	function portfolio_options(){
		global $post;
		$custom = get_post_custom($post->ID);
		if (isset($custom["website_url"])) {
		$website_url = $custom["website_url"][0];
		}
	?>
	<div id="portfolio-options">
		<label>Website URL:</label><input name="website_url" value="<?php if (isset($website_url)) { ?><?php if ($website_url == '') ; else ; echo $website_url  ?><?php } ?>" />
	</div>
	<?php
	}
	function update_website_url(){
		global $post;
		if (isset($_POST["website_url"])) {
		update_post_meta($post->ID, "website_url", $_POST["website_url"]);
		}
	}

	// Change the columns for the Portfolio List
	function change_columns( $cols ) {
		$cols = array(
		'cb'						=> '<input type="checkbox" />',
		'title' 				=> __( 'Title', 'trans' ),
		'url'						=> __( 'URL', 'trans' ),
		'thumb' 				=> __( 'Image', 'trans' ),
		'date'					=> __( 'Date', 'trans' ),
		);
		return $cols;
	}
	add_filter( "manage_work_posts_columns", "change_columns" );

	function custom_columns( $column, $post_id ) {
		switch ( $column ) {
			case "url":
			$website_url = get_post_meta( $post_id, 'website_url', true);
			echo '<a href="' . $website_url . '">' . $website_url. '</a>';
			break;
			case "thumb":
			the_post_thumbnail();
			break;
		}
	}
	add_action( "manage_posts_custom_column", "custom_columns", 10, 2 );

	// Make these columns sortable
	function sortable_columns() {
		return array(
		'url'			=> 'url',
		'title'		=> 'title',
		'date'		=> 'date'
		);
	}
	add_filter( "manage_edit-work_sortable_columns", "sortable_columns" );
?>