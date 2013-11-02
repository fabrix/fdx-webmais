</div><!-- /content -->
<div class="clear"></div>
<div id="floating-footer">
<div class="inner">
<div id="foot-menu">
<div class="foot-badges">
<a class="facebook fdx_tooltip" data-placement="top" data-trigger="hover" href="javascript:void(0);" onclick="PopupCenter('<?php get_bloginfo('url'); ?>/target/?target=facebook', 'facebook',550,530,'no');" title="Encontre-nos no Facebook" rel="nofollow"></a>
<a class="twitter fdx_tooltip" data-placement="top" data-trigger="hover" href="javascript:void(0);" onclick="PopupCenter('https://twitter.com/intent/user?screen_name=webmaiscom', 'twitter',550,480,'no');" title="Siga webmais no Twitter" rel="nofollow"></a>
<a class="gogleplus fdx_tooltip" data-placement="top" data-trigger="hover" href="javascript:void(0);" onclick="PopupCenter('https://plus.google.com/113100979718936007596/', 'gplus',1000,700,'yes');" title="Participe do nosso c&iacute;rculo" rel="nofollow"></a>
<a class="mail fdx_tooltip" data-placement="top" data-trigger="hover" href="javascript:void(0);" onclick="PopupCenter('http://feedburner.google.com/fb/a/mailverify?uri=webmais&amp;loc=pt_BR', 'mail',600,450,'no');" title="Assine nosso Newsletter" rel="nofollow"></a>
<a class="rss fdx_tooltip" data-placement="top" data-trigger="hover" href="javascript:void(0);" onclick="PopupCenter('http://feeds.feedburner.com/webmais', 'rss',800,600,'yes');" title="Receba atualiza&ccedil;&otilde;es" rel="nofollow"></a>
</div>
</div>
<div id="external-links">
&nbsp; <a href="/contact/?id=Mande sua dica" class="iframe" title="Mande sua dica" rel="nofollow">Mande sua dica</a> | <a href="/contact/?id=Fale Conosco" class="iframe" title="Fale Conosco" rel="nofollow">Fale Conosco</a>&nbsp;
</div>
</div>
</div>
<div class="ccop"><a href="/politica-de-privacidade/" class="iframe" rel="nofollow">Pol&iacute;tica de Privacidade</a> &bull; 2007~<?php echo date("Y"); ?> (<a href="http://creativecommons.org/licenses/by-sa/3.0/br/" class="iframe2" title="Alguns direitos reservados" rel="nofollow"><strong>CC</strong></a>) &bull; Powered by <a href="http://fabrix.net" target="_blank">Fabrix.net</a></div>
<div class="clear"></div>
<!-- div oculta -->
<div class="scrollTo_top"><a title="Topo" href="#"><span class="uptop"></span></a></div>

<?php
/*-------------------adiciona banner 728x90 fluid-------------------*/
if (option::get('fluid_banner_todas') == 'on') {?>
<div id="fanback">
<div id="fanclose" title="Fechar"></div>
<div id="fanbox">
<?php if ( option::get('fluid_imageupload') <> "" ) { //fdx?>
<a href="<?php echo option::get('fluid_imageupload_url');?>"><img src="<?php echo option::get('fluid_imageupload');?>" border="0" width="728" height="90" alt="*" /></a>
<?php  } else { ?>
<?php echo option::get('fluid_code');?>
<?php } ?>
</div>
</div>

<script type="text/javascript">
jQuery(document).ready(function($){
<?php if (option::get('fluid_banner_cookie') == 'on') {?>
 if($.cookie('popup_user_login')!='yes'){
  $('#fanback').delay(100).fadeIn('medium');
  $('#fanclose, #fan-exit').click(function(){
  $('#fanback').stop().fadeOut('medium')})
  }$.cookie('popup_user_login','yes',{path:'/'})
  <?php  } else { ?>
  $('#fanback').delay(100).fadeIn('medium');
  $('#fanclose, #fan-exit').click(function(){
  $('#fanback').stop().fadeOut('medium')})
 <?php } ?>
});
</script>
<?php }/* adiciona banner 728x90 */?>


<?php
/* add wp default */
wp_footer();

/* Script de terceiros e outros */
get_template_part('includes/footer_script');

/* codigos incluido no painel */
if ( option::get('footer_code') <> "" ) {
echo stripslashes(option::get('footer_code')) . "\n";
}
?>
</body>
</html>