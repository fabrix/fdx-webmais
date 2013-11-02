<?php get_header();

 if (option::get('default_layout') == 'Default') {include (TEMPLATEPATH . '/includes/layout/index_default.php');
 } elseif (option::get('default_layout') == 'Galeria') {include (TEMPLATEPATH . '/includes/layout/index_galeria.php');
 } else {include (TEMPLATEPATH . '/includes/layout/index_default.php');
 }
echo '<div id="sidebar">';
if ( is_active_sidebar( 'sidebar_home' ) ) {dynamic_sidebar( 'sidebar_home' );}
get_sidebar();
echo '</div>';

get_footer(); ?>