<?php
// **************************************************************************
// widget (NÃO USAR ACENTUAÇÃO OU CARACTERES ESPECIAIS)
// **************************************************************************
 if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'1-Home Page',
    'id'   => 'sidebar_home',
	'description'   => 'Este widget aparece na HomePage',
	'before_title' => '<h3 class="widget-head">',
	'after_title' => '</h3>',//este id aparece antes de todos, ver classe nativas
	'before_widget' => '<div class="sidebar-widget">',
	'after_widget'  => '</div>',
	));
register_sidebar(array('name'=>'2-Postagens',
    'id'   => 'sidebar_post',
	'description'   => 'Este widget aparece nas postagens',
	'before_title' => '<h3 class="widget-head">',
	'after_title' => '</h3>',//este id aparece antes de todos, ver classe nativas
	'before_widget' => '<div class="sidebar-widget">',
	'after_widget'  => '</div>',
	));
register_sidebar(array('name'=>'3-P&aacute;ginas',
    'id'   => 'sidebar_pagina',
	'description'   => 'Este widget aparece nas P&aacute;ginas',
	'before_title' => '<h3 class="widget-head">',
	'after_title' => '</h3>',//este id aparece antes de todos, ver classe nativas
	'before_widget' => '<div class="sidebar-widget">',
	'after_widget'  => '</div>',
	));
register_sidebar(array('name'=>'4-Arquivo',
    'id'   => 'sidebar_arquivo',
	'description'   => 'Este widget aparece nos arquivos',
	'before_title' => '<h3 class="widget-head">',
	'after_title' => '</h3>',//este id aparece antes de todos, ver classe nativas
	'before_widget' => '<div class="sidebar-widget">',
	'after_widget'  => '</div>',
	));
register_sidebar(array('name'=>'5-Autor',
    'id'   => 'sidebar_autor',
	'description'   => 'Este widget aparece no arquivo do autor',
	'before_title' => '<h3 class="widget-head">',
	'after_title' => '</h3>',//este id aparece antes de todos, ver classe nativas
	'before_widget' => '<div class="sidebar-widget">',
	'after_widget'  => '</div>',
	));
register_sidebar(array('name'=>'6-Fluid*',
    'id'   => 'sidebar_fluid',
	'description'   => 'Este widget aparece na base de *todos as paginas e deslizante, acompanha a barra de rolagem.',
	'before_title' => '<h3 class="widget-head">',
	'after_title' => '</h3>',//este id aparece antes de todos, ver classe nativas
	'before_widget' => '<div class="sidebar-widget">',
	'after_widget'  => '</div>',
	));
register_sidebar(array('name'=>'7-Restrito',
    'id'   => 'sidebar_restrito',
	'description'   => 'Este widget aparece na pagina (arquivo, retrito)',
	'before_title' => '<h3 class="widget-head">',
	'after_title' => '</h3>',//este id aparece antes de todos, ver classe nativas
	'before_widget' => '<div class="sidebar-widget">',
	'after_widget'  => '</div>',
	));


//~~~~~~~~~~~~~~~~~personalizado~~~~~~~~~~~~~~~
require('newsletter_mais.php' );
require('sidebar_menu.php' );
require('sidebar_menu_galeria.php' );
require('author_page.php' );

// **************************************************************************
// funçoes usadas no widgets
// **************************************************************************


// postagens recentes
function fdx_recent_news($number=0) {
$recent = new WP_Query( 'ignore_sticky_posts=1&showposts=' . $number );
while( $recent->have_posts() ) : $recent->the_post();
global $post; global $wp_query; ?>
             <li><div class="sidebar-archive-img the-post-image">
                            <?php  if ( has_post_thumbnail()) {
                echo '<a href="' . get_permalink() . '" title="' . esc_attr($post->post_title) . '">';
                echo the_post_thumbnail('cat-thumb', (array('title' => ''.esc_attr($post->post_title).'')));
                echo '</a>';
                  }
                   else { ?>
           <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><div class="imgoff1"></div></a>
           <?php } ?>
                        </div>

                 <div class="sidebar-archive-text"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		    	 <br/><span class="date"><?php the_time( get_option('date_format') ); ?></span></div>
                 </li>
<?php endwhile;wp_reset_query(); }

// Postagens populares nos ultimos 30 dias
function fdx_popular_posts($instance) {
        global $wpdb;
   		$instance = wp_parse_args($instance);
 		$time_start = date('c', strtotime($instance['lapse'], current_time('timestamp', 0)));
		$classes = preg_replace('/\s\s+/', '', preg_replace('~[,.]~', ' ', $instance['classes']));
 		$popular_posts =  $wpdb->get_results("SELECT id, post_title, post_status, guid, COUNT(comment_post_ID) AS post_comment_count FROM " . $wpdb->prefix . "posts JOIN " . $wpdb->prefix . "comments ON id = comment_post_ID WHERE post_status = 'publish' AND comment_approved = 1 AND comment_date > '" . $time_start . "' GROUP BY id ORDER BY post_comment_count DESC, post_date DESC LIMIT " . $instance['number_posts']);
        $classes = explode(" ", $classes);
        if(!empty($popular_posts)){
			foreach($popular_posts as $k => $post){
				$class = isset($classes[$k]) && !empty($classes[$k]) ? $classes[$k] : 'no-color';
                unset($thumbnail);
                $thumbnail = get_the_post_thumbnail($post->id, 'cat-thumb', (array('title' => ''.esc_attr($post->post_title).'')));
			      if ($thumbnail){ ?>
				<li><div class="sidebar-archive-img the-post-image"><a href="<?php echo get_permalink($post->id); ?>"><?php echo $thumbnail ?></a></div><div class="sidebar-archive-text"><a href="<?php echo get_permalink($post->id); ?>">  <?php echo get_the_title($post->id); ?></a></div><div class="comment-balloon2 sprite pop-<?php echo $class; ?>"><a href="<?php echo get_permalink($post->id); ?>#disqus_thread"><?php echo  $post->post_comment_count; ?></a></div></li>
                  <?php } else { ?>
                  <li><div class="sidebar-archive-img the-post-image"><a href="<?php echo get_permalink($post->id); ?>"><div class="imgoff1"></div></a></div><div class="sidebar-archive-text"><a href="<?php echo get_permalink($post->id); ?>">  <?php echo get_the_title($post->id); ?></a></div><div class="comment-balloon2 sprite pop-<?php echo $class; ?>"><a href="<?php echo get_permalink($post->id); ?>#disqus_thread"><?php echo  $post->post_comment_count; ?></a></div></li>
    <?php } } } wp_reset_query(); }


// random post
function fdx_tandom_post($number=0) {
$random = new WP_Query( array ( 'orderby' => 'rand', 'posts_per_page' => $number ) );
while( $random->have_posts() ) : $random->the_post();
global $post; global $wp_query; ?>
             <li><div class="sidebar-archive-img the-post-image">
                            <?php  if ( has_post_thumbnail()) {
                echo '<a href="' . get_permalink() . '" title="' . esc_attr($post->post_title) . '">';
                echo the_post_thumbnail('cat-thumb', (array('title' => ''.esc_attr($post->post_title).'')));
                echo '</a>';
                  }
                   else { ?>
           <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><div class="imgoff1"></div></a>
           <?php } ?>
                        </div>

                 <div class="sidebar-archive-text"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		    	  <br/><span class="category"><?php the_category(', '); ?></span></div>
                 </li>
<?php endwhile;wp_reset_query(); }
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~end */?>
