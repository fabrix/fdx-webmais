<div id="top_tabs">
<div id="top_tabs_navigation">
<div id="navigation-workspace">
<ul class="sections">
<li class="aba0"><a href="#"></a></li>
<li class="aba7"><a href="<?php if( defined('FDX_MLINK') ) { echo FDX_MLINK; } ?>" title="Vers&atilde;o Mobile"><div class="mobilever"></div></a></li>
<li class="aba5"><code><a href="http://webmais.com/" target="_top">Web Mais</a></code></li>
<li class="aba5"><code><a href="http://webmais.com/e/" target="_top" title="E-mail e Conta Microsoft ( ...@webmais.com ) Gr&aacute;tis!">E-m@il <div class="livemail">Gr&aacute;tis</div></a></code></li>
<li class="aba5"><code><a href="http://f1.webmais.com" target="_top" title="A P&aacute;gina Inicial">Start Page+</a></code></li>
<li class="aba5"><code><a href="http://g.webmais.com" target="_top">Galeria Mais</a></code></li>
</ul>
</div>

</div>
<div id="top_tabs_header">
<div id="header-workspace">
<?php if (option::get('default_layout') == 'Galeria') {
echo '<div id="logo2">'; } else { echo '<div id="logo">';}
?>
<a href="<?php echo home_url(); ?>" target="_top"><h1></h1></a></div>

<div id="ads-1">
<div id="ads-1-workspace">
<?php
if ( option::get('top_code') <> "" ) {
echo stripslashes(option::get('top_code')) . "\n";
}
?>
</div>
</div>

</div>
</div>

<?php if ( is_user_logged_in() ) {?>
<div id="userloged"><a href="<?php echo admin_url();?>" title="Painel"><?php global $userdata; get_currentuserinfo(); echo get_avatar( $userdata->ID, 32 ); ?></a><span><a href="<?php echo admin_url('profile.php');?>" title="Perfil"><code id="c1"><?php echo $userdata->nickname  ; ?></code></a><?php edit_post_link('<code id="c1">EDITAR</code>', '&nbsp;', ''); ?> <a href="<?php echo wp_logout_url(); ?>" title="Logout"><code id="c1">Sair</code></a></span></div>
<?php } ?>


</div><!--top_tabs-->

