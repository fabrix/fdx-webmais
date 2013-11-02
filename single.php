<?php get_header(); ?>

  <div id="contentleft">
<div class="postarea">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div id="post-<?php the_ID(); ?>">
<?php get_template_part('includes/share'); ?>
<div class="float-right comment-balloon sprite"><a href="<?php the_permalink(); ?>#disqus_thread" title="Coment&aacute;rios"><?php $commentscount = get_comments_number(); echo $commentscount; ?></a></div>
<h1 class="title"><?php the_title(); ?></h1>
          <ul class="post-meta">
             <?php
$arc_year = get_the_time('Y');
$arc_month = get_the_time('m');
$arc_day = get_the_time('d');
?>
<li class="date"><a href="<?php echo get_day_link($arc_year, $arc_month, $arc_day); ?>"><?php the_time( get_option('date_format') ); ?></a></li>
<li class="author"><?php the_author_posts_link(); ?></li>
<li class="category"><?php the_category(', '); ?></li>
<?php if(function_exists('the_views')) { ?>
<li class="vistas cursorooff" title="visualiza&ccedil;&otilde;es"><a href="#"><?php the_views();?></a></li>
<?php } ?>
</ul>
<div class="clear"></div>
<hr class="title" />
<?php if (option::get('ads_post') <> "" ) : ?>
<div style=" float: right"> <?php echo option::get('ads_post'); //fdx?></div>
<?php endif; ?>

<div<?php if (option::get('ads_class') <> "") { ?> class="<?php echo option::get('ads_class');?>"<?php }?> <?php if (option::get('ads_id') <> "") { ?>id="<?php echo option::get('ads_id');?>"<?php }?>>
<?php the_content();?>
</div>

<?php wp_link_pages('before=<div id="page-links">PAGINAS:&after=</div>&next_or_number=number&pagelink= %'); ?>

<div class="clear"></div>
<?php if(function_exists('the_ratings')) { ?>
<div class="rating"><?php the_ratings(); ?></div>
<div class="clear"></div>
<?php } ?>
<?php the_tags( '<span class="tags">', '</span><span class="tags">', '</span>'); ?>
<?php endwhile; endif; ?>
</div>
<div class="clear"></div>
</div>
<div class="postarea">
<?php get_template_part('includes/related_posts'); ?>
</div>
<div class="postarea">
<?php comments_template(); ?>
</div>

</div>

<div id="fnp-nav">
    <div class="fnp-previous"><?php previous_post_link('%link', '<div class="fnp-box-left"><div class="fnp-content-left"><div class="fnp-content-border"></div><div class="fnp-nav-title">Anterior</div><div class="fnp-nav-link">%title</div></div></div>') ?></div>
    <div class="fnp-next"><?php next_post_link('%link', '<div class="fnp-box-right"><div class="fnp-content-right"><div class="fnp-content-border"></div><div class="fnp-nav-title">Pr&oacute;ximo</div><div class="fnp-nav-link">%title</div></div></div>') ?></div>
</div>


<div id="sidebar">
<?php if ( is_active_sidebar( 'sidebar_post' ) ) {dynamic_sidebar( 'sidebar_post' );}
get_sidebar();
?>
</div>
<?php get_footer(); ?>

