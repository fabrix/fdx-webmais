<?php get_header(); ?>
	<div id="contentleft">





			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


           <div class="postarea">
		   <div id="post-<?php the_ID(); ?>">

           <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
            <div class="float-right comment-balloon sprite"><a href="<?php the_permalink(); ?>#disqus_thread" title="Coment&aacute;rios" ><?php $commentscount = get_comments_number(); echo $commentscount; ?></a></div>
           <ul class="post-meta">
           <?php
$arc_year = get_the_time('Y');
$arc_month = get_the_time('m');
$arc_day = get_the_time('d');
?>
            <li class="date"><a href="<?php echo get_day_link($arc_year, $arc_month, $arc_day); ?>"><?php the_time( get_option('date_format') ); ?></a></li>
             <li class="author"><?php the_author_posts_link(); ?></li>
              <li class="category"><?php the_category(', '); ?></li>
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


               <?php the_excerpt(); ?>
               <?php the_tags( '<span class="tags">', '</span><span class="tags">', '</span>'); ?>
                           <div class="clear"></div>

			       </div></div>

                   <?php endwhile; ?>

           <?php else : ?>

         <div class="postarea">

       <div style="padding:10px 0 10px 18px">

      <p><strong style="color:red">Nada encontrado!</strong></p>
  <ul><li> Certifique-se de que todas as palavras estejam escritas corretamente.</li>

   <li>Tente palavras-chave diferentes.</li>
   <li>Tente palavras-chave mais gen&eacute;ricas.</li></ul>
             </div>

        </div>

 <?php endif; ?>


<div class="pagination"><?php if(function_exists('fdx_pagination')) { fdx_pagination(); }?></div>


	</div>
			
  <?php get_sidebar(); ?>


<?php get_footer(); ?>