<?php

add_action('widgets_init','fdx_newsletter_mais');

function fdx_newsletter_mais() {
	register_widget('fdx_newsletter_mais');
	
	}

class fdx_newsletter_mais extends WP_Widget {
	function fdx_newsletter_mais() {
			
		$widget_ops = array('classname' => 'fdx_newsletter_mais','description' => __('Newsletter e principais redes sociais','fdx_framework'));
		$this->WP_Widget('fdx_newsletter_mais',__('FDX - Newsletter Mais','fdx_framework'),$widget_ops);

		}
		
	function widget( $args, $instance ) {
		extract( $args );
		/* User-selected settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$option_1 = $instance['option_1'];
		$option_2 = $instance['option_2'];
        $option_3 = $instance['option_3'];
        $option_4 = $instance['option_4'];
		$sim_nao_1 = $instance['sim_nao_1'];

		/* Before widget (defined by themes). */
		echo $before_widget;
		/* Title of widget (before and after defined by themes). */
		if ( $title )
		echo $before_title . $title . $after_title;
		?>
 <!-- ######################################################################################## -->
<div class="newsletter">
<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $option_1 ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
<input type="text" class="signup-form" name="email" name="uri" value="Seu E-mail" onfocus="if(this.value=='Seu E-mail')this.value='';" onblur="if(this.value=='')this.value='Seu E-mail';"/>
<input type="hidden" value="<?php echo $option_1 ?>" name="uri"/>
<input type="hidden" value="<?php echo $option_1 ?>" name="title"/>
<input type="hidden" name="loc" value="pt_BR"/>
<input type="submit"  class="signup-button" value="Assinar" />
</form>
</div>
<?php if($sim_nao_1 != 'on') {?>

<div class="social-icons">
<ul class="tabs2">
<a href="#id00" style="display: none"></a>
<li class="icon-rss"><a href="#id01" title="">RSS</a><span>Receba atualiza&ccedil;&otilde;es</span></li>
<li class="icon-facebook"><a href="#id02" title="">Facebook</a><span>Torne-se nosso f&atilde;!</span></li>
<li class="icon-twitter"><a href="#id03" title="">Twitter</a><span>Siga-nos.</span></li>
<li class="icon-google"><a href="#id04" title="">Google Plus</a><span>Entre no nosso c&iacute;rculo!</span></li>
</ul>
<div class="tab_container2">
<div id="id00" class="tab_content2" style="display: none">
&nbsp;
</div>

<div id="id01" class="tab_content2">
<div class="rss-ok"><a href="http://feeds.feedburner.com/<?php echo $option_1 ?>"><span class="icon-rss-ok">RSS Feed</span> </a></div>
</div>
<div id="id02" class="tab_content2">
<div style="margin-left: -6px"><iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2F<?php echo $option_3 ?>&amp;width=293&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;border_color=%23F7F7F7&amp;stream=false&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:293px; height:258px;" allowTransparency="true"></iframe></div>

</div>
<div id="id03" class="tab_content2">

<div class="twiter-ok"><a href="https://twitter.com/<?php echo $option_2 ?>" class="twitter-follow-button" data-show-count="true" data-lang="pt">Siga @<?php echo $option_2 ?></a> </div>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

</div>
<div id="id04" class="tab_content2">
<div id="ggogleplus"><div class="g-plus" data-href="https://plus.google.com/<?php echo $option_4 ?>" data-width="280" data-theme="light"></div></div>
</div>
</div>
</div>


<div class="clear"></div>

<?php } else {}?>
<!-- ########################################################################################## -->



			
<?php 
/* After widget (defined by themes). */
echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['option_2'] = $new_instance['option_2'];
		$instance['option_1'] = $new_instance['option_1'];
		$instance['option_3'] = $new_instance['option_3'];
        $instance['option_4'] = $new_instance['option_4'];
		$instance['sim_nao_1'] = $new_instance['sim_nao_1'];

		return $instance;
	}
	
function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Assine nosso newsletter', 'fdx_framework'),
            'sim_nao_1' => '',
            'option_1' => 'webmais',
			'option_2' => 'webmaiscom',
            'option_3' => 'webmaiscom',
            'option_4' => '113100979718936007596'
            );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
	

	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'fdx_framework') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'option_1' ); ?>"><?php _e('ID: http://feeds.feedburner.com/ID)', 'fdx_framework') ?></label>
		<input id="<?php echo $this->get_field_id( 'option_1' ); ?>" name="<?php echo $this->get_field_name( 'option_1' ); ?>" value="<?php echo $instance['option_1']; ?>" class="widefat" />
		</p>

		<p>
		<input class="checkbox" type="checkbox" <?php checked( $instance['sim_nao_1'], 'on' ); ?> id="<?php echo $this->get_field_id( 'sim_nao_1' ); ?>" name="<?php echo $this->get_field_name( 'sim_nao_1' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'sim_nao_1' ); ?>"><?php _e('Nao mostrar websocial', 'fdx_framework'); ?></label>
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'option_2' ); ?>"><?php _e('Twitter :', 'fdx_framework') ?></label>
		<input id="<?php echo $this->get_field_id( 'option_2' ); ?>" name="<?php echo $this->get_field_name( 'option_2' ); ?>" value="<?php echo $instance['option_2']; ?>" class="widefat" />
		</p>

        <p>
		<label for="<?php echo $this->get_field_id( 'option_3' ); ?>"><?php _e('Facebook :', 'fdx_framework') ?></label>
		<input id="<?php echo $this->get_field_id( 'option_3' ); ?>" name="<?php echo $this->get_field_name( 'option_3' ); ?>" value="<?php echo $instance['option_3']; ?>" class="widefat" />
		</p>

        <p>
		<label for="<?php echo $this->get_field_id( 'option_4' ); ?>"><?php _e('Google Plus :', 'fdx_framework') ?></label>
		<input id="<?php echo $this->get_field_id( 'option_4' ); ?>" name="<?php echo $this->get_field_name( 'option_4' ); ?>" value="<?php echo $instance['option_4']; ?>" class="widefat" />
		</p>
       
   <?php 
}
	} //end class