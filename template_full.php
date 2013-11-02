<?php
/*
Template Name: Full Width
*/
?>
<?php get_header(); ?>
<div id="contentfull">
<div class="postarea">
<?php if (have_posts()) : while (have_posts()) : the_post();

the_content(__('Read more', 'webmais'));

wp_link_pages('before=<div id="page-links">PAGINAS:&after=</div>&next_or_number=number&pagelink= %');

endwhile; endif; ?>
<div class="clear" id="fluidbarr"></div>
<?php get_template_part('includes/share'); ?>
</div>
</div>
<?php get_footer(); ?>