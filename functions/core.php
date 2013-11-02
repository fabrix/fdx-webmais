<?php
// enqueue styles
if( !function_exists("fdx_theme_styles") ) {
    function fdx_theme_styles() {
         if (option::get('control_ext') == 'on') { //
          wp_register_style( 'bootstrap', FDX_CDN_BOOTSTRAP_CSS, array(), FDX_PANEL_V, 'all' );
          wp_register_style( 'colorbox', FDX_CDN_COLORBOX2_CSS, array(), FDX_PANEL_V, 'all' );

          wp_enqueue_style( 'bootstrap' );
          wp_enqueue_style( 'colorbox' );
          }
    }
}
add_action( 'wp_enqueue_scripts', 'fdx_theme_styles' );


/* enqueue script
*------------------------------------------------------------*/
if( !function_exists( "fdx_theme_js" ) ) {
  function fdx_theme_js(){
    wp_deregister_script('jquery');

          if (option::get('control_jquery') == 'on') { //
          wp_register_script('jquery', FDX_CDN_JQUERY, 'jquery', FDX_PANEL_V, false); //load header
          } else {
          wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', 'jquery', FDX_PANEL_V, false );  //load header
          }
// CDN e links externos
           if (option::get('control_ext') == 'on') {
           wp_register_script('bootstrap', FDX_CDN_BOOTSTRAP_JS, 'jquery', FDX_PANEL_V, true);
           wp_register_script('colorbox', FDX_CDN_COLORBOX_JS, 'jquery', FDX_PANEL_V, true);
           wp_register_script('cycle', FDX_CDN_CYCLE, 'jquery', FDX_PANEL_V, true);

           wp_enqueue_script('bootstrap');
           wp_enqueue_script('colorbox');
           wp_enqueue_script('cycle');
          }
     wp_enqueue_script('jquery');
   }
}
add_action( 'wp_enqueue_scripts', 'fdx_theme_js' );


/*
*------------------------------------------------------------*/

/* suporte ao menu */
register_nav_menu( 'fdxmenu1', 'Menu Topo');

/* suporte a imagens upload */
if ( function_exists( 'add_theme_support'  ) ) {
	add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 130, 90, true ); //tamanho do thumb
    add_image_size( 'cat-thumb', 60, 60, true ); //extra image

	    update_option('thumbnail_size_w', 130);
	 	update_option('thumbnail_size_h', 90);
        update_option('medium_size_w', 0);
		update_option('medium_size_h', 0);
		update_option('large_size_w', 0);
		update_option('large_size_h', 0);
	}

/* ------------------------------------- */
/*  GALERIA                              */
/* ------------------------------------- */

 /* Remove formatação padrão galeria */
function remove_gallery_css() {
	return "<div class='gallery'>";
   }
add_filter('gallery_style', 'remove_gallery_css');


/* ------------------------------------- */
/*  Box de categoria home                */
/* ------------------------------------- */
function fdx_home_box($cat) {
$cat_quantidade = option::get('number_featured_category');
?>
<div class="nb_col2">
<div class="box_outer">
<div class="news_box">

<div class="news_box_heading">
<h2><a href="<?php echo get_category_link($cat); ?>"><?php echo get_cat_name( $cat ); ?> </a></h2>
</div>
<!--End nb Heading-->

<ul class="nb2_next2_news">
 <?php query_posts(array('showposts' => $cat_quantidade, 'cat' => $cat )); ?>
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
 <li>
 <div class="the-post-image" style="float: left; margin-right: 3px">
<?php  if ( has_post_thumbnail()) {
global $post;
echo '<a href="' . get_permalink().'">';
echo the_post_thumbnail('cat-thumb', (array('title' => ''.esc_attr($post->post_title).'')));
echo '</a>';
}
else { ?>
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><div class="imgoff1"></div></a>
<?php } ?>
</div>
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</li>

 <?php endwhile;endif; ?>
 <?php wp_reset_query(); ?>
 </ul>

</div> <!--News Box-->
</div> <!--Box Outer-->
</div> <!--NB COL-->
<?php }

/* LIMITAR OS CARACTERES DO THE_EXCERTP()
 *------------------------------------------------------------*/
function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
     if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
    return $excerpt;
    }


/* Allow your contributors to upload files
 *------------------------------------------------------------*/
if ( current_user_can('contributor') && !current_user_can('upload_files') )
    add_action('admin_init', 'allow_contributor_uploads');
function allow_contributor_uploads() {
    $contributor = get_role('contributor');
    $contributor->add_cap('upload_files');
}

/* caso o usuario NÃO seja nivel 10, Remover mensagem de atualizaçãot
 *------------------------------------------------------------*/
if ( !current_user_can( 'level_10' ) ) {
add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );
}

/* Hide the Admin Bar
 *------------------------------------------------------------*/
add_filter('show_admin_bar', '__return_false');
?>