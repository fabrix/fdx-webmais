<?php get_header(); ?>
<div id="contentleft">




 <div class="postarea">
              <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>">

<h1 class="title"><?php the_title(); ?></h1>
<ul class="post-meta">
<li class="date" title="P&aacute;gina atualizada em:"><?php the_time( get_option('date_format') ); ?></li>
<li class="author"><?php the_author_posts_link(); ?></li>
</ul>
<hr style="margin-bottom: 15px; margin-top: -10px" />

   <?php the_content(__('Read more', 'webmais'));?>

   <?php wp_link_pages('before=<div id="page-links">PAGINAS:&after=</div>&next_or_number=number&pagelink= %'); ?>

                     
                    </div>
<?php get_template_part('includes/share'); ?>
                    </div>
            <?php endwhile; endif; ?>




</div>

<div id="sidebar">
<div class="sidebar-widget"><h3 class="widget-head">Index</h3>
<div class="textwidget">
<?php
    if(!$post->post_parent){
    // will display the subpages of this top level page
    $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
    }else{
    // diplays only the subpages of parent level
    //$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");

    if($post->ancestors)
    {
    // now you can get the the top ID of this page
    // wp is putting the ids DESC, thats why the top level ID is the last one
    $ancestors = end($post->ancestors);
    $children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0");
    // you will always get the whole subpages list
    }
    }
    if ($children) { ?>

    <ul>
    <?php echo $children; ?>
    </ul>

    </div>
    </div>
    <?php } ?>


<?php
if ( is_active_sidebar( 'sidebar_pagina' ) ) { dynamic_sidebar( 'sidebar_pagina' ); }

get_sidebar();
?>
</div>
<?php get_footer(); ?>