<?php

add_action('widgets_init','fdx_sidebar_menu_galeria');

function fdx_sidebar_menu_galeria() {
	register_widget('fdx_sidebar_menu_galeria');

	}

class fdx_sidebar_menu_galeria extends WP_Widget {
	function fdx_sidebar_menu_galeria() {
			
		$widget_ops = array('classname' => 'fdx_sidebar_menu_galeria','description' => __('Menu lateral da Galeria, ultimas postagens, aleat&oacute;rias e populares','fdx_framework'));
		$this->WP_Widget('fdx_sidebar_menu_galeria',__('FDX - Galeria Menu','fdx_framework'),$widget_ops);

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
<li class="active"><a href="#tab1" title="Galerias Recentes"><span>Recentes</span></a></li>
<li><a href="#tab2" title="Mais Visitado"><span>Populares</span></a></li>
<li><a href="#tab3" title="Melhor Classificado"><span>Top</span></a></li>
<li><a href="#tab4" title="Galerias Aleat&oacute;rias"><span>Aleat&oacute;rio</span></a></li>
</ul>
<div class="tab_container">
<div id="tab1" class="tab_content">
<ul class="sidebar-archive">
<?php if (function_exists('fdx_recent_news')) {  fdx_recent_news(''. $option_1.''); } ?>
</ul>
</div>

<div id="tab2" class="tab_content">
<ul class="sidebar-archive">
<?php if (function_exists('get_most_viewed')): ?>
<?php get_most_viewed('both', $option_1); ?>
<?php endif; ?>
</ul>
</div>

<div id="tab3" class="tab_content">
<ul class="sidebar-archive">
<?php if (function_exists('get_highest_rated')): ?>
<?php get_highest_rated('both', 0, $option_2); ?>
<?php endif; ?>
</ul>
</div>

<div id="tab4" class="tab_content">
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
			'option_2' => '7'
 			);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
	



		<p>
		<label for="<?php echo $this->get_field_id( 'option_1' ); ?>"><?php _e('Quantidade de post para mostrar', 'fdx_framework') ?></label>
		<input id="<?php echo $this->get_field_id( 'option_1' ); ?>" name="<?php echo $this->get_field_name( 'option_1' ); ?>" value="<?php echo $instance['option_1']; ?>" class="widefat" />
		</p>


		<p>
		<label for="<?php echo $this->get_field_id( 'option_2' ); ?>"><?php _e('Quantidade de post para mostrar Top', 'fdx_framework') ?></label>
		<input id="<?php echo $this->get_field_id( 'option_2' ); ?>" name="<?php echo $this->get_field_name( 'option_2' ); ?>" value="<?php echo $instance['option_2']; ?>" class="widefat" />
		</p>


       
   <?php 
}
	} //end class