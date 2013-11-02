<?php get_header(); ?>
<div id="contentfull">
<div class="postarea">
<?php if (function_exists('wpfp_link')) {  ?>
<div style="float: left; margin-bottom: -40px"><?php if ( is_user_logged_in() ) {  wpfp_link(); }  else { echo '<a href="'.wp_login_url().'"><span class="btn btn-default">Adicionar a Favoritos: <strong>Login</strong></a></span>';}?></div>
<div class="clear"></div>
<?php }  ?>
<p style="text-align: center"><?php previous_image_link(false, '<span class="btn btn-default">&laquo; ANTERIOR</span>'); ?> &nbsp; <?php next_image_link(false, '<span class="btn btn-default">PR&Oacute;XIMO &raquo;</span>'); ?></p>



<div class="the-post-image" style="text-align: center">
<div<?php if (option::get('ads_class') <> "") { ?> class="<?php echo option::get('ads_class');?>"<?php }?> <?php if (option::get('ads_id') <> "") { ?>id="<?php echo option::get('ads_id');?>"<?php }?>>
<?php echo wp_get_attachment_image( $post->ID, 'full' ); ?><?php if(function_exists('exifography_display_exif')) { echo exifography_display_exif();} ?>
</div>
</div>

<div id="tS2" class="jThumbnailScroller">
<div class="jTscrollerContainer">
<div class="jTscroller the-post-image">
<?php if ( wp_attachment_is_image( get_the_ID() ) ) echo do_shortcode( sprintf( '[gallery id="%1$s" exclude="%2$s" columns="false"]', $post->post_parent, get_the_ID() ) ); ?>
</div>
</div>
<a href="#" class="jTscrollerPrevButton"></a>
<a href="#" class="jTscrollerNextButton"></a>
</div>
<div class="clear" id="fluidbarr"></div>   
<script language="JavaScript" type="text/javascript">
/*<![CDATA[*/
(function($){
window.onload=function(){
   	$("#tS2").thumbnailScroller({
		scrollerType:"clickButtons",
		scrollerOrientation:"horizontal",
		scrollSpeed:2,
		scrollEasing:"easeOutCirc",
		scrollEasingAmount:600,
		acceleration:4,
		scrollSpeed:800,
		noScrollCenterSpace:10,
		autoScrolling:0,
		autoScrollingSpeed:2000,
		autoScrollingEasing:"easeInOutQuad",
		autoScrollingDelay:500
	});
}
})(jQuery);
/*]]>*/
</script>
<script src="<?php echo get_template_directory_uri(); ?>/library/thumbnailScroller/jquery-ui-1.8.13.custom.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/library/thumbnailScroller/jquery.thumbnailScroller.js"></script>
<?php get_template_part('includes/share'); ?>
</div>
</div>
<?php get_footer(); ?>