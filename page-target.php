<?php
$target = "";
if(isset($_GET['target'])) {
$target = $_GET['target'];
}
?>

<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<style type="text/css">
*{margin: 0px;padding: 0px; outline: 0px;}

/* fonte garal para texto padrão */
body{background:#fff;
color:#333;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 14px;
  line-height: 20px;
}
</style>


</head>
<body>

<?php if ($target == 'facebook'){ ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=292960794077187";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div class="fb-like-box" data-href="http://www.facebook.com/webmais" data-width="550" data-height="550" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="false"></div>


<?php } elseif ($target == 'googleplus'){ ?>
<!-- Posicione esta tag onde você deseja que o widget apareça. -->
<div class="g-page" data-width="590" data-href="//plus.google.com/113100979718936007596" data-rel="publisher"></div>

<!-- Posicione esta tag depois da última tag do widget. -->
<script type="text/javascript">
  window.___gcfg = {lang: 'pt-BR'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
<?php } else { ?>
<div style="text-align: center; margin-top: 100px; color: #FF0000; font-size: 50px"><strong>ERRO</strong></div>
<?php } ?>
</body>
</html>