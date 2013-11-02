<?php get_header(); ?>
<div id="contentfull">
<div class="postarea_branco">
<?php if (have_posts()) : while (have_posts()) : the_post();

the_content();

endwhile; endif; ?>
<div class="clear" id="fluidbarr"></div>
</div>
</div>
<?php get_footer(); ?>