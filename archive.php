<?php get_header(); ?>

	<div id="contentleft">





			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


           <div class="postarea">
		   <div id="post-<?php the_ID(); ?>">



                       <div class="float-right comment-balloon sprite"><a href="<?php the_permalink(); ?>#disqus_thread" title="Coment&aacute;rios" ><?php $commentscount = get_comments_number(); echo $commentscount; ?></a></div>
           <h1 class="title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>

           <ul class="post-meta">
           <?php
$arc_year = get_the_time('Y');
$arc_month = get_the_time('m');
$arc_day = get_the_time('d');
?>
            <li class="date"><a href="<?php echo get_day_link($arc_year, $arc_month, $arc_day); ?>"><?php the_time( get_option('date_format') ); ?></a></li>
             <li class="author"><?php the_author_posts_link(); ?></li>
              <li class="category"><?php the_category(', '); ?></li>
              <?php if(function_exists('the_views')) {  ?>
               <li class="vistas cursorooff" title="visualiza&ccedil;&otilde;es"><a href="#"><?php the_views(); ?></a></li>
               <?php } ?>
               </ul>



                <div class="alignleft the-post-image">
          <?php  if ( has_post_thumbnail()) {
                echo '<a href="' . get_permalink() . '" title="' . esc_attr($post->post_title) . '">';
                echo the_post_thumbnail('thumbnail', (array('title' => ''.esc_attr($post->post_title).'')));
                echo '</a>';
                  }
                   else { ?>
           <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><div class="imgoff2"></div></a>
           <?php } ?>
           </div>


<?php echo excerpt(40); ?>
<div class="clear"></div>
<?php if(function_exists('the_ratings')) { ?>
<div class="rating_arquiv"><?php the_ratings(); ?></div>
<div class="clear"></div>
<?php } ?> 
<?php the_tags( '<span class="tags">', '</span><span class="tags">', '</span>'); ?>
<div class="clear"></div>

			       </div></div>

				<?php endwhile; endif; ?>

<?php if(function_exists('fdx_pagination')) { fdx_pagination(); }?>


	</div>

<div id="sidebar">
<?php
 if ( is_author()) {
     if ( is_active_sidebar( 'sidebar_autor' ) ) {dynamic_sidebar( 'sidebar_autor' );}
   }

if ( is_active_sidebar( 'sidebar_arquivo' ) ) {dynamic_sidebar( 'sidebar_arquivo' );}

// get_sidebar();
?>
</div>
<?php get_footer(); ?>


