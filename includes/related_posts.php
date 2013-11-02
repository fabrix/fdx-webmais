<?php
$tags = wp_get_post_tags($post->ID);
if ($tags) {
	$tag_ids = array();
	foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

	$args=array(
		'tag__in' => $tag_ids,
		'post__not_in' => array($post->ID),
		'showposts'=>4, // Number of related posts that will be shown.
		'ignore_sticky_posts'=>1
	);
	$my_query = new wp_query($args);
	if( $my_query->have_posts() ) {
		echo '<div class="relacionados">ARTIGOS RELACIONADOS:</div>';
        echo '<ul class="clearfix" style="list-style: none; margin:0 0 4px -6px; padding: 0 0 0 0">';
        while ($my_query->have_posts()) {
			$my_query->the_post();
		?>
			<li style="float: left; margin: 0 0 0 6px; width: 142px"><div class="the-post-image">
             <?php  if ( has_post_thumbnail()) {
                echo '<a class="fdx_tooltip" data-placement="top" href="' . get_permalink() . '" title="' . esc_attr($post->post_title) . '">';
                echo the_post_thumbnail('thumbnail', (array('title' => '')));
                echo '</a>';
                  }
                   else { ?>
           <div class="the-post-image"><a class="fdx_tooltip" data-placement="top" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><div class="imgoff2"></div></a>
           <?php } ?></div></li>
		<?php } ?>
            </ul>
<?php wp_reset_query();	} } ?>
