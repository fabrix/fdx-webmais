<?php get_header(); ?>
	<div id="contentleft">





			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


           <div class="postarea">

        <table border="1" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                      <td width="130" style="font-size: 11px">

                                  	<strong><?php _e("by month", 'webmais'); ?>:</strong>
					<ul>
						<?php wp_get_archives('type=monthly&show_post_count=1'); ?>
					</ul>
                    </td>
                      <td>	<p><strong><?php _e("Tags", 'webmais'); ?>:</strong> </p>
				<?php wp_tag_cloud('smallest=8&largest=30&number='); ?></td>
                    </tr>
                  </table>

</div>
                
				<?php endwhile; endif; ?>




	</div>


<div id="sidebar">
<?php if ( is_active_sidebar( 'sidebar_restrito' ) ) { dynamic_sidebar( 'sidebar_restrito' );} ?>
</div>

<div class="clear" id="fluidbarr"><!-- hack --></div>
<?php get_footer(); ?>