<?php

add_action('widgets_init','fdx_author_page');

function fdx_author_page() {
	register_widget('fdx_author_page');
	
	}

class fdx_author_page extends WP_Widget {
	function fdx_author_page() {
			
		$widget_ops = array('classname' => 'fdx_author_page','description' => __('Descri&ccedil;&atilde;o que aparece na pagina do autor','fdx_framework'));
		$this->WP_Widget('fdx_author_page',__('FDX - Autor Index','fdx_framework'),$widget_ops);

		}
		
	function widget($args, $instance) {
  		?>
 <!-- ######################################################################################## -->


 <div class="sidebar-widget"><h3 class="widget-head"><?php the_author_meta('first_name'); ?> <?php the_author_meta('last_name'); ?> ( <?php the_author_meta('display_name'); ?> )</h3>
<div class="textwidget">
<div style="float: left; margin-right: 5px; margin-bottom: -10px">
<?php
global $authordata;
if(function_exists('userphoto_exists') && userphoto_exists($authordata)){
userphoto_thumbnail($authordata);
}
else {
echo get_avatar($authordata->ID, 96);
} ?>
</div>
<p><strong> &bull; <a href="<?php the_author_meta('jabber'); ?>"><?php the_author_meta('jabber'); ?></a></strong></p>
<p><strong> &bull; <a href="<?php the_author_meta('aim'); ?>"><?php the_author_meta('aim'); ?></a></strong></p>
<p><strong> &bull; <a href="<?php the_author_meta('yim'); ?>"><?php the_author_meta('yim'); ?></a></strong></p>
<p><strong> &bull; <a href="<?php the_author_meta('user_url'); ?>"><?php the_author_meta('user_url'); ?></a></strong></p>
<p><?php the_author_meta('description'); ?></p>

</div></div>


<!-- ########################################################################################## -->

			
<?php 
/* After widget (defined by themes). */
	}
  } //end class