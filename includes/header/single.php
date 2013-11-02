<?php
/************************************************
  Adicionar campos personalizados css/javascript
************************************************/
$id = $wp_query->post->ID;
$css_uri  = get_post_meta($id, 'fdx_css_uri', false);
$css_tags = get_post_meta($id, 'fdx_css_tags', false);
$js_uri   = get_post_meta($id, 'fdx_js_uri', false);
$js_tags  = get_post_meta($id, 'fdx_js_tags', false);
$syntaxhi = get_post_meta($id, 'fdx_syntax', false);
$googlemaps = get_post_meta($id, 'fdx_gmap', false);

//add css
if (!empty($css_uri))
{
echo '<!--FDX custom css uri-->'."\n";
foreach ($css_uri as $css)
{
echo '<link rel="stylesheet" href="'.$css.'" type="text/css" media="screen" />'."\n";
}
}

if (!empty($css_tags))
{
echo '<!--FDX custom css tags-->'."\n";
foreach ($css_tags as $css2)
        {
    	echo '<style type="text/css" media="all">'."\n";
        echo $css2."\n";
        echo '</style>'."\n";
        }
}

//add javascript
if (!empty($js_uri))
{
echo '<!--FDX custom javascript uri-->'."\n";
foreach ($js_uri as $js)
{
echo '<script src="'.$js.'" type="text/javascript"></script>'."\n";
}
}

if (!empty($js_tags))
{
	echo '<!--FDX custom javascript tags-->'."\n";
	foreach ($js_tags as $js2)
	{
		echo '<script language="JavaScript" type="text/javascript">/*<![CDATA[*/'."\n";
        echo $js2."\n";
        echo '/*]]>*/</script>'."\n";
	}
}


if (!empty($syntaxhi))
{
     $template_uri = get_template_directory_uri();
     echo '<!--FDX Syntax Highlighter-->'."\n";
     echo '<link rel="stylesheet" href="'.$template_uri.'/library/syntaxhighlighter/shCoreDefault.css" type="text/css" media="screen" />'."\n";
     echo '<link rel="stylesheet" href="'.$template_uri.'/library/syntaxhighlighter/shThemeDefault.css" type="text/css" media="screen" />'."\n";
     echo '<script src="'.$template_uri.'/library/syntaxhighlighter/shCore.js" type="text/javascript"></script>'."\n";
     echo '<script src="'.$template_uri.'/library/syntaxhighlighter/shBrushPhp.js" type="text/javascript"></script>'."\n";
     echo '<script src="'.$template_uri.'/library/syntaxhighlighter/shBrushXml.js" type="text/javascript"></script>'."\n";
     echo '<script src="'.$template_uri.'/library/syntaxhighlighter/shBrushJScript.js" type="text/javascript"></script>'."\n";
     echo '<script src="'.$template_uri.'/library/syntaxhighlighter/shBrushCss.js" type="text/javascript"></script>'."\n";
}

if (!empty($googlemaps))
{
 echo '<!--FDX Google Maps-->'."\n";
 echo '	<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=false"></script>  '."\n";
}
?>