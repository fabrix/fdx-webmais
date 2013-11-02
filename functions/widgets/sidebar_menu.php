<?php

add_action('widgets_init','fdx_sidebar_menu');

function fdx_sidebar_menu() {
	register_widget('fdx_sidebar_menu');

	}

class fdx_sidebar_menu extends WP_Widget {
	function fdx_sidebar_menu() {
			
		$widget_ops = array('classname' => 'fdx_sidebar_menu','description' => __('Menu lateral com, ultimas postagens, aleat&oacute;rias e populares','fdx_framework'));
		$this->WP_Widget('fdx_sidebar_menu',__('FDX - Sidebar Menu','fdx_framework'),$widget_ops);

		}
		
	function widget( $args, $instance ) {
		extract( $args );
		/* User-selected settings. */
		$option_1 = $instance['option_1'];
		$option_2 = $instance['option_2'];


		/* desativado entradas pad~rao */

		?>
 <!-- ######################################################################################## -->

 <div class="tabsCell">
<ul class="tabs">
<li class="active"><a href="#id163684fe14a5f30452tab0" title="Postagens Recentes"><span>Recentes</span></a></li>
<li><a href="#id163684fe14a5f30452tab1" title="Mais comentados nos &uacute;ltimos <?php echo $option_2 ?> dias. "><span>Populares</span></a></li>
<li><a href="#id163684fe14a5f30452tab2" title="Postagens Aleat&oacute;rias"><span>Aleat&oacute;rio</span></a></li>
</ul>
<div class="tab_container">
<div id="id163684fe14a5f30452tab0" class="tab_content">
<ul class="sidebar-archive">
<?php if (function_exists('fdx_recent_news')) {  fdx_recent_news(''. $option_1.''); } ?>
</ul>
</div>
<div id="id163684fe14a5f30452tab1" class="tab_content">
 <ul class="sidebar-archive">
<?php if (function_exists('fdx_popular_posts')) { fdx_popular_posts('lapse=-'.$option_2.' day&classes=r5,r4,r3,r2,r1&number_posts=' . $option_1); }?>
</ul>
</div>
<div id="id163684fe14a5f30452tab2" class="tab_content">
 <ul class="sidebar-archive">
<?php if (function_exists('fdx_tandom_post')) {  fdx_tandom_post(''. $option_1.''); } ?>
</ul>
</div>

</div>
</div>
<!-- ########################################################################################## -->





			
<?php
/* desativado entradas pad~rao */

	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['option_2'] = $new_instance['option_2'];
		$instance['option_1'] = $new_instance['option_1'];

		return $instance;
	}
	
function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Assine nosso newsletter', 'fdx_framework'),
			'option_1' => '5',
			'option_2' => '30'
 			);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
	



		<p>
		<label for="<?php echo $this->get_field_id( 'option_1' ); ?>"><?php _e('Quantidade de post para mostrar', 'fdx_framework') ?></label>
		<input id="<?php echo $this->get_field_id( 'option_1' ); ?>" name="<?php echo $this->get_field_name( 'option_1' ); ?>" value="<?php echo $instance['option_1']; ?>" class="widefat" />
		</p>


		<p>
		<label for="<?php echo $this->get_field_id( 'option_2' ); ?>"><?php _e('Mais populares nos &uacute;ltimos "1~360" dias', 'fdx_framework') ?></label>
		<input id="<?php echo $this->get_field_id( 'option_2' ); ?>" name="<?php echo $this->get_field_name( 'option_2' ); ?>" value="<?php echo $instance['option_2']; ?>" class="widefat" />
		</p>


       
   <?php 
}
	} //end class