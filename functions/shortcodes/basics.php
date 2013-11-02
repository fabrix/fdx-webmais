<?php
/******************************************
/* Shortcodes
******************************************/
//removendo formatação automatica [raw]  [/raw]
function my_formatter($content) {
       $new_content = '';
       $pattern_full = '{(\[raw\].*?\[/raw\])}is';
       $pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
       $pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);
       foreach ($pieces as $piece) {
               if (preg_match($pattern_contents, $piece, $matches)) {
                       $new_content .= $matches[1];
               } else {
                       $new_content .= wptexturize(wpautop($piece));
               }
       }
       return $new_content;
}
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');
add_filter('the_content', 'my_formatter', 99);


// [raw][code lang="php" highlight="1,2,3"] [/code][/raw]     (php,css,js,xml)
function fdx_code ( $atts, $content = null ) {
             extract(shortcode_atts(array(
             'lang' => '',
             'highlight' => '',
             ), $atts));
return '<script type="syntaxhighlighter" class="brush: '.$lang.'; highlight: ['.$highlight.']"><![CDATA['.$content.'</script><script type="text/javascript">SyntaxHighlighter.all();</script>';
}
add_shortcode( 'code', 'fdx_code' );

//Buttons
function button_shortcode( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'color' => 'default',
	  'url' => '',
	  'text' => ''
      ), $atts ) );
	  if($url) {
		return '<a href="' . $url . '" class="btn-shortcode button' . $color . '"><span>' . $text . $content . '</span></a>';
	  } else {
		return '<div class="btn-shortcode button' . $color . '"><span>' . $text . $content . '</span></div>';
	}
}
add_shortcode('button', 'button_shortcode');

/* Flash  [flash value="/_file/swf/acordo_ortografico.swf" id="acordo_ortografico" width="330" height="220"]
 *------------------------------------------------------------*/
function fdx_flash($atts) {
	extract(shortcode_atts(array(
		"value" => 'http://www.com',
		"width" => '100%',
		"height" => '351',
		"id"=> 'id1',
        "align"=> 'none',
	), $atts));
	return '<div align="center" style="float: '.$align.'"><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="'.$width.'" height="'.$height.'" id="'.$id.'" align="middle">
<param name="allowScriptAccess" value="sameDomain" />
<param name="allowFullScreen" value="false" />
<param name="movie" value="/_file/swf/acordo_ortografico.swf" />
<param name="quality" value="high" />
<param name="wmode" value="transparent" />
<embed src="'.$value.'" quality="high" wmode="transparent" width="'.$width.'" height="'.$height.'" name="'.$id.'" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer" />
</object></div>';
}
add_shortcode("flash", "fdx_flash");

##################################################BOOTSTRAP############################################################

//Columns
function fdx_row($params, $content = null){
    extract(shortcode_atts(array(
        'class' => 'row'
    ), $params));
    $content = preg_replace('/<br class="nc".\/>/', '', $content);
    $result = '<div class="'.$class.'">';
    $result .= do_shortcode($content );
    $result .= '</div>';
    return force_balance_tags( $result );
}
add_shortcode('row', 'fdx_row');

function fdx_span($params,$content=null){
    extract(shortcode_atts(array(
        'class' => 'col-xs-1'
        ), $params));

    $result = '<div class="'.$class.'">';
    $result .= do_shortcode($content );
    $result .= '</div>';
    return force_balance_tags( $result );
}
add_shortcode('col', 'fdx_span');


//collapse
function fdx_collapse($params, $content = null){
    extract(shortcode_atts(array(
        'id'=>''
         ), $params));
    $content = preg_replace('/<br class="nc".\/>/', '', $content);
    $result = '<div class="panel-group" id="'.$id.'">';
    $result .= do_shortcode($content );
    $result .= '</div>';
    return force_balance_tags( $result );
}
add_shortcode('collapse', 'fdx_collapse');

function fdx_citem($params, $content = null){
    extract(shortcode_atts(array(
        'id'=>'',
        'title'=>'Collapse title',
        'parent' => ''
         ), $params));
    $content = preg_replace('/<br class="nc".\/>/', '', $content);
    $result = ' <div class="panel panel-default">';
    $result .= ' <div class="panel-heading">';
    $result .= '    <h4 class="panel-title">';
    $result .= '<a class="accordion-toggle" data-toggle="collapse" data-parent="#'.$parent.'" href="#'.$id.'">';
    $result .= $title;
    $result .= '</a>';
    $result .= '</h4>';
    $result .= '</div>';
    $result .= '<div id="'.$id.'" class="panel-collapse collapse">';
    $result .= '<div class="panel-body">';
    $result .= do_shortcode($content );
    $result .= '</div>';
    $result .= '</div>';
    $result .= '</div>';
    return force_balance_tags( $result );
}
add_shortcode('citem', 'fdx_citem');

//notification
function fdx_notice($params, $content = null){
    extract(shortcode_atts(array(
        'type' => 'unknown'
    ), $params));
    $content = preg_replace('/<br class="nc".\/>/', '', $content);
    $result = '<div class="alert alert-'.$type.' alert-dismissable">';
    $result .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    $result .= do_shortcode($content );
    $result .= '</div>';
    return force_balance_tags( $result );
}
add_shortcode('notification', 'fdx_notice');

//tabs
function fdx_tabs($params, $content = null){
  $content = preg_replace('/<br class="nc".\/>/', '', $content);
  $result = '<div class="tab_wrap">';
  $result .= do_shortcode($content );
  $result .= '</div>';
  return force_balance_tags( $result );
}
add_shortcode('tabs', 'fdx_tabs');

function fdx_thead($params, $content = null){
  $content = preg_replace('/<br class="nc".\/>/', '', $content);
  $result = '<ul class="nav nav-tabs">';
  $result .= do_shortcode($content );
  $result .= '</ul>';
  return force_balance_tags( $result );
}
add_shortcode('thead', 'fdx_thead');

function fdx_tab($params, $content = null){
  extract(shortcode_atts(array(
    'href' => '#',
    'title' => '',
    'class' => ''
    ), $params));
  $content = preg_replace('/<br class="nc".\/>/', '', $content);

  $result = '<li class="'.$class.'">';
  $result .= '<a data-toggle="tab" href="'.$href.'">'.$title.'</a>';
  $result .= '</li>';
  return force_balance_tags( $result );
}
add_shortcode('tab', 'fdx_tab');

function fdx_dropdown($params, $content = null){
  global $bs_timestamp;
  extract(shortcode_atts(array(
    'title' => '',
    'id' => '',
    'class' => '',
    ), $params));
  $content = preg_replace('/<br class="nc".\/>/', '', $content);
  $result = '<li class="dropdown">';
  $result .= '<a class="'.$class.'" id="'.$id.'" class="dropdown-toggle" data-toggle="dropdown">'.$title.'<b class="caret"></b></a>';
  $result .='<ul class="dropdown-menu">';
  $result .= do_shortcode($content);
  $result .= '</ul></li>';
  return force_balance_tags( $result );
}
add_shortcode('dropdown', 'fdx_dropdown');

function fdx_tcontents($params, $content = null){
  $content = preg_replace('/<br class="nc".\/>/', '', $content);
  $result = '<div class="tab-content">';
  $result .= do_shortcode($content );
  $result .= '</div>';
  return force_balance_tags( $result );
}
add_shortcode('tcontents', 'fdx_tcontents');

function fdx_tcontent($params, $content = null){
  extract(shortcode_atts(array(
    'id' => '',
    'class'=>'',
    ), $params));
  $content = preg_replace('/<br class="nc".\/>/', '', $content);
  $class= ($class=='active')?'active in':'';
  $result = '<div class="tab-pane fade '.$class.'" id='.$id.'>';
  $result .= do_shortcode($content );
  $result .= '</div>';
  return force_balance_tags( $result );
}
add_shortcode('tcontent', 'fdx_tcontent');

/*------------------------------------------------------------
* [jumbotron] [/jumbotron]
*------------------------------------------------------------*/
function fdx_jumbotron( $atts, $content = null ) {
return '<div class="jumbotron"><div class="container">'.$content.'</div></div>';}
add_shortcode( 'jumbotron', 'fdx_jumbotron' );

/*------------------------------------------------------------
* [panel type="default" title="xxxxxx"] yyyyyyyyyyy [/panel]
*------------------------------------------------------------*/
function fdx_panel( $atts, $content = null )
{
	extract(
	shortcode_atts( array(
      'type' => 'default',
       'title' => 'default'
      ),
	  $atts ) );
		return '<div class="panel panel-' . $type . '"><div class="panel-heading"><h3 class="panel-title">' . $title . '</h3></div><div class="panel-body">' . $content . '</div></div>';
}
add_shortcode('panel', 'fdx_panel');


