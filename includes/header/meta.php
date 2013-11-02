<?php if ( is_attachment() ) { ?>

<title><?php wp_title()?></title>
<meta name="description" content="<?php $parent = get_post($post->post_parent); echo $parent->post_title; ?>(<?php the_ID(); ?>)" />
<meta property="og:image" content="<?php echo wp_get_attachment_url(); ?>"/>
<meta name="robots" content="index, follow" />

<link href="<?php echo get_template_directory_uri(); ?>/library/thumbnailScroller/jquery.thumbnailScroller.css" rel="stylesheet" />
<style type="text/css">
.gallery { margin:0 !important;}
.gallery dt{ padding-top: 5px; padding-left: 0} 
.gallery-item .gallery-icon img{padding:0 !important}
</style>


<?php } elseif ((is_single() || is_page() )) { ?>

<title><?php global $page, $paged;
       wp_title( '|', true, 'right' );
    	bloginfo( 'name' );
    	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'P&aacute;gina %s'), max( $paged, $page ) );?></title>
<meta name="keywords" content="<?php if(function_exists('csv_tags')) { csv_tags(); } ?>" />
<meta name="description" content="<?php if(function_exists('head_meta_desc')) { head_meta_desc(); } ?>" />
<meta name="robots" content="index, follow" />


<?php } elseif ( (is_home()  || is_front_page() ) ) {?>

<title><?php global $page, $paged;
       wp_title( '|', true, 'right' );
    	bloginfo( 'name' );
    	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'P&aacute;gina %s'), max( $paged, $page ) );?></title>

<meta name="keywords" content="<?php echo option::get('home_meta_key');?>" />
<meta name="description" content="<?php if (option::get('home_desc_key') <> "" ) { echo option::get('home_desc_key'); } else  { bloginfo('description'); } ?>" />
<meta name="robots" content="index, follow" />





<?php } elseif (is_search()) { ?>
<meta name="robots" content="noindex, nofollow" />
<title></title>

<?php } else { ?>

<title><?php global $page, $paged;
       wp_title( '|', true, 'right' );
    	bloginfo( 'name' );
    	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'P&aacute;gina %s'), max( $paged, $page ) );?></title>
<meta name="robots" content="noindex, follow" />
<?php }?>