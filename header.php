<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<?php get_template_part('includes/header/meta'); ?>

<?php if(is_single() || is_page()) {
    $temp_post = get_post();
    $user_id = $temp_post->post_author;
?>
<link rel="author" href="<?php the_author_meta("jabber",$user_id); ?>" />
<?php } elseif(is_home()) { if ( option::get('home_author') <> "" ) { ?>
<link rel="author" href="<?php echo option::get('home_author');?>" />
<?php } }?>

<?php if ( option::get('misc_favicon') <> "" ) { ?>
<link rel="shortcut icon" href="<?php echo option::get('misc_favicon');?>"  type="image/x-icon" />
<?php  } else { ?>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico"  type="image/x-icon" />
<?php } ?>

<?php if (option::get('social_opp1') <> "" ) { ?>
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php echo option::get('social_opp1');?>" />
<?php  } else { ?>
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<?php } ?>

<?php if (option::get('control_ext') == 'on') { //cdn ?>
<link rel="stylesheet" id="main" href="<?php echo get_template_directory_uri(); ?>/css/css.php?files=core,rack,<?php echo option::get('esquema_cores');?>" media="all" />
<?php } else {?>
<link rel="stylesheet" id="main" href="<?php echo get_template_directory_uri(); ?>/css/css.php?files=bootstrap,colorbox,core,rack,<?php echo option::get('esquema_cores');?>" media="all" />
<?php } ?>

<?php if (option::get('ativar_style') == 'on') { ?>
<style type="text/css">
/*<![CDATA[*/
body {
<?php if (option::get('bg_css_color') <> "" ) { ?>background:<?php echo option::get('bg_css_color');?>; <?php } ?>
<?php if (option::get('css_text_color') <> "" ) { ?>color:<?php echo option::get('css_text_color');?>;<?php } ?>
<?php if (option::get('css_font_family') <> "" ) { ?>font-family:<?php echo option::get('css_font_family');?>; <?php } ?>
<?php if (option::get('css_font_size') <> "" ) { ?>font-size:<?php echo option::get('css_font_size');?>; <?php } ?>
  }
<?php if (option::get('a_css_color') <> "" ) { ?> a {color:<?php echo option::get('a_css_color');?>} <?php } ?>
<?php if (option::get('ahover_css_color') <> "" ) { ?> a:hover {<?php echo option::get('ahover_css_color');?>} <?php } ?>
/*]]>*/
</style>
<?php } ?>

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>

<?php
if (is_single() || is_page()){
get_template_part('includes/header/single');
}
?>

<?php
if ( option::get('header_code') <> "" ) {
echo stripslashes(option::get('header_code')) . "\n";
}
?>
</head>
<body>
<?php get_template_part('includes/header/top_tabs'); ?>

<div class="holder">
<div class="limite">
<ul id="nav">
<li class="cursorooff"><a href="#">&nbsp;</a></li>
<?php wp_nav_menu( array( 'theme_location' => 'fdxmenu1', 'link_before' => '<span>', 'link_after' => '</span>', 'container' => '', 'items_wrap' => '%3$s', 'menu_class' => 'children' ) ); ?>
</ul>
<form action="/busca/" id="search-form" class="form-search">
<input name="q" class="txt clearc" type="text" value="Busca Por...">
<input class="btn-search" value="" type="submit" title="Buscar">
</form>
</div>
</div>

<div id="content">
<div id="contentfull">
<?php if ( is_home()) {?>
<ul class="breadcrumb2" style="display: block; text-transform: uppercase">
<li><a title="Home" href="<?php get_bloginfo('url'); ?>"><span class="bradhome"></span></a></li>
<li id="jqticker">
<?php
	$args = array( 'numberposts' => '10', 'orderby' => 'rand' );
	$recent_posts = wp_get_recent_posts( $args );
	foreach( $recent_posts as $recent ){
	   	echo '<span><a href="' . get_permalink($recent["ID"]) . '" title="'.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a></span>';
	}
?>
</li></ul>
<script type="text/javascript" language="javascript">
jQuery(document).ready(function(){
  jQuery('#jqticker').cycle({
	 speed: 1500,
	 timeout: 2500,
	 		 height: 28,
             width: 845,

	 fx: 'scrollRight',
	 pause: 1,
	 containerResize: 1
  });
   jQuery('#jqticker').show();
});
</script>
<?php }
else {if(function_exists('fdx_breadcrumbs')) { fdx_breadcrumbs();}
} ?>
</div>