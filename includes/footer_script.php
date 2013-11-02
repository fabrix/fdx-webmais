<?php
/* CDN  links externos */
if (option::get('control_ext') == 'on') { ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/js.php?files=jquery.cookie,core"></script>
<?php } else {?>
<script src="<?php echo get_template_directory_uri(); ?>/js/js.php?files=bootstrap,jquery.colorbox-min,jquery.cycle.all.min,jquery.cookie,core"></script>
<?php } ?>
<script type="text/javascript">
  window.___gcfg = {lang: 'pt-BR'};
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=292960794077187";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>