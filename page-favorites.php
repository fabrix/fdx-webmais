<?php get_header(); ?>
<div id="contentfull">
<div class="postarea">
<?php
$favorite_post_ids = wpfp_get_users_favorites();
echo "<ul class=\"clearfix\" style=\"list-style: none; margin:0 0 4px -6px; padding: 0 0 0 0\">";
if ($favorite_post_ids):
$c = 0;
$favorite_post_ids = array_reverse($favorite_post_ids);
foreach ($favorite_post_ids as $post_id) {
if ($c++ == '50') break; //limit
$p = get_post($post_id);
$thumbnail = wp_get_attachment_image($post_id, 'thumbnail');
echo "<li style=\"float: left; margin: 20px 0 20px 33px; width: 142px\"><div class=\"the-post-image\"><a href='".get_permalink(
$post_id)."' title='". $p->post_title ."'>". $thumbnail ."</a></div>";
echo  wpfp_remove_favorite_link($post_id);
}
echo "</ul>";
echo '<div style="text-align: center">' .wpfp_clear_list_link().'</div>';
else:
echo "<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><div style='text-align: center'><h1>Nenhum Favorito Selecionado!</h1></div><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>";
endif;
?>
<div class="clear"></div>
</div>
</div>
<?php get_footer(); ?>