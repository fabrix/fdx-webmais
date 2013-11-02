<?php
require('basics.php');
require('google_map.php');
require('content_rotetor.php');

/* ------------------------------------------------------------------------------------------- */
/* SHORTCODE EDITOR DROPDOWN LIST */
/* ------------------------------------------------------------------------------------------- */
function add_sc_select(){
  echo '&nbsp;<select id="sc_select" style="margin-top:-8px;margin-left: 15px">';
/* 2 Colunas  */
$shortcodes_list .= "<option value='[row class=\"row\"]
[col class=\"col-xs-6\"]Text[/col]
[col class=\"col-xs-6\"]Text[/col]
[/row]' style='margin-top: 5px'>Colunas - 2*</option>";
/* 3 Colunas  */
$shortcodes_list .= "<option value='[row class=\"row\"]
[col class=\"col-xs-4\"]Text[/col]
[col class=\"col-xs-4\"]Text[/col]
[col class=\"col-xs-4\"]Text[/col]
[/row]'>Colunas - 3*</option>";
/* 4 Colunas  */
$shortcodes_list .= "<option value='[row class=\"row\"]
[col class=\"col-xs-3\"]Text[/col]
[col class=\"col-xs-3\"]Text[/col]
[col class=\"col-xs-3\"]Text[/col]
[col class=\"col-xs-3\"]Text[/col]
[/row]'>Colunas - 4*</option>";
/* 6 Colunas  */
$shortcodes_list .= "<option value='[row class=\"row\"]
[col class=\"col-xs-2\"]Text[/col]
[col class=\"col-xs-2\"]Text[/col]
[col class=\"col-xs-2\"]Text[/col]
[col class=\"col-xs-2\"]Text[/col]
[col class=\"col-xs-2\"]Text[/col]
[col class=\"col-xs-2\"]Text[/col]
[/row]'>Colunas - 6*</option>";
/* 12 Colunas  */
$shortcodes_list .= "<option value='[row class=\"row\"]
[col class=\"col-xs-1\"]Text[/col]
[col class=\"col-xs-1\"]Text[/col]
[col class=\"col-xs-1\"]Text[/col]
[col class=\"col-xs-1\"]Text[/col]
[col class=\"col-xs-1\"]Text[/col]
[col class=\"col-xs-1\"]Text[/col]
[col class=\"col-xs-1\"]Text[/col]
[col class=\"col-xs-1\"]Text[/col]
[col class=\"col-xs-1\"]Text[/col]
[col class=\"col-xs-1\"]Text[/col]
[col class=\"col-xs-1\"]Text[/col]
[col class=\"col-xs-1\"]Text[/col]
[/row]'>Colunas - 12*</option>";


/* imagens */
$shortcodes_list .= "<option value='0'>--------------------------------------------------</option>";
$shortcodes_list .= "<option value='<p class=\"text-center\"><img src=\"...\" alt=\"...\" class=\"img-thumbnail\"></p>'>Img - Center - Thumbnail</option>";
$shortcodes_list .= "<option value='<p class=\"text-center\"><img src=\"...\" alt=\"...\" class=\"img-circle\"></p>'>Img - Center - Circle</option>";
$shortcodes_list .= "<option value='<p class=\"alignleft\"><img src=\"...\" alt=\"...\" class=\"img-thumbnail\"></p>'>Img - Float Left</option>";
$shortcodes_list .= "<option value='<p class=\"alignright\"><img src=\"...\" alt=\"...\" class=\"img-thumbnail\"></p>'>Img - Float Right</option>";
$shortcodes_list .= "<option value='<p class=\"text-center\"><a href=\"##-1-##\"><img src=\"...\" alt=\"...\" class=\"img-thumbnail\"></a><br/><span class=\"label label-default\">Default</span></p>'>Img - Center - Thumbnail - Caption - Link</option>";

/* tooltip */
$shortcodes_list .= "<option value='0'>--------------------------------------------------</option>";
$shortcodes_list .= "<option value='<a href=\"##-1-##\" class=\"fdx_tooltip\" data-placement=\"top\" data-trigger=\"hover\" title=\"##-2-##\">##-3-##</a>'>Tooltip Hover Top</option>";
$shortcodes_list .= "<option value='<a href=\"##-1-##\" class=\"fdx_tooltip\" data-placement=\"right\" data-trigger=\"click\" title=\"##-2-##\">##-3-##</a>'>Tooltip Click Right</option>";


/* notification */
$shortcodes_list .= "<option value='0'>--------------------------------------------------</option>";
$shortcodes_list .= "<option value='[notification type=\"success\"]Well done! You successfully <a href=\"##-1-##\" class=\"alert-link\">read this</a> important alert message. [/notification]'>Notification - Success*</option>";
$shortcodes_list .= "<option value='[notification type=\"info\"]Heads up! <a href=\"##-1-##\" class=\"alert-link\">This alert</a> needs your attention, but its not super important. [/notification]'>Notification - Info*</option>";
$shortcodes_list .= "<option value='[notification type=\"warning\"]Warning! Best check yo self, youre <a href=\"##-1-##\" class=\"alert-link\">not looking</a> too good. [/notification]'>Notification - Warning*</option>";
$shortcodes_list .= "<option value='[notification type=\"danger\"]Oh snap! Change a few things<a href=\"##-1-##\" class=\"alert-link\"> up and try</a> submitting again.[/notification]'>Notification - Danger*</option>";

/* Button */
$shortcodes_list .= "<option value='0'>--------------------------------------------------</option>";
$shortcodes_list .= "<option value='<a href=\"##-1-##\" class=\"btn btn-default\">Default</a>'>Button - Default</option>";
$shortcodes_list .= "<option value='<a href=\"##-1-##\" class=\"btn btn-primary\">Primary</a>'>Button - Primary</option>";
$shortcodes_list .= "<option value='<a href=\"##-1-##\" class=\"btn btn-success\">Success</a> '>Button - Success</option>";
$shortcodes_list .= "<option value='<a href=\"##-1-##\" class=\"btn btn-info\">Info</a>'>Button - Info</option>";
$shortcodes_list .= "<option value='<a href=\"##-1-##\" class=\"btn btn-warning\">Warning</a>'>Button - Warning</option>";
$shortcodes_list .= "<option value='<a href=\"##-1-##\" class=\"btn btn-danger\">Danger</a>'>Button - Danger</option>";
$shortcodes_list .= "<option value='<a href=\"##-1-##\" class=\"btn btn-primary btn-lg\">Large button</a>'>-Large</option>";
$shortcodes_list .= "<option value='<a href=\"##-1-##\" class=\"btn btn-primary btn-sm\">Small button</a>'>-Small</option>";
$shortcodes_list .= "<option value='<a href=\"##-1-##\" class=\"btn btn-primary btn-xs\">Extra small button</a>'>-Extra Small</option>";

/* Label */
$shortcodes_list .= "<option value='0'>--------------------------------------------------</option>";
$shortcodes_list .= "<option value='<span class=\"label label-default\">Default</span>'>Label - Default</option>";
$shortcodes_list .= "<option value='<span class=\"label label-primary\">Primary</span>'>Label - Primary</option>";
$shortcodes_list .= "<option value='<span class=\"label label-success\">Success</span>'>Label - Success</option>";
$shortcodes_list .= "<option value='<span class=\"label label-info\">Info</span>'>Label - Info</option>";
$shortcodes_list .= "<option value='<span class=\"label label-warning\">Warning</span>'>Label - Warning</option>";
$shortcodes_list .= "<option value='<span class=\"label label-danger\">Danger</span>'>Label - Danger</option>";

/* panel */
$shortcodes_list .= "<option value='0'>--------------------------------------------------</option>";
$shortcodes_list .= "<option value='[panel type=\"default\" title=\"xxxxxx\"]yyyyyyyy[/panel]'>Panel - Default*</option>";
$shortcodes_list .= "<option value='[panel type=\"primary\" title=\"xxxxxx\"]yyyyyyyy[/panel]'>Panel - Primary*</option>";
$shortcodes_list .= "<option value='[panel type=\"success\" title=\"xxxxxx\"]yyyyyyyy[/panel]'>Panel - Success*</option>";
$shortcodes_list .= "<option value='[panel type=\"info\" title=\"xxxxxx\"]yyyyyyyy[/panel]'>Panel - Info*</option>";
$shortcodes_list .= "<option value='[panel type=\"warning\" title=\"xxxxxx\"]yyyyyyyy[/panel]'>Panel - Warning*</option>";
$shortcodes_list .= "<option value='[panel type=\"danger\" title=\"xxxxxx\"]yyyyyyyy[/panel]'>Panel - Danger*</option>";

/* Dropdown Tab */
$shortcodes_list .= "<option value='0'>--------------------------------------------------</option>";
$shortcodes_list .= "<option value='[tabs][thead]
[tab class=\"active\" type=\"tab\" href=\"#t_tit1\" title=\"Tab title\"]
[
dropdown id=\"fdx_dropdown1\" title=\"Dropdown\"]
[tab type=\"tab\" href=\"#tab_id1\" title=\"AAAAAAAAAAAAAAAA\"]
[tab type=\"tab\" href=\"#tab_id2\" title=\"BBBBBBBBBBBBBBBB\"]
[/dropdown]
[/thead][tcontents]
[tcontent class=\"active\" id=\"t_tit1\"]111111111111111111111111111111111111111111111111[/tcontent]
[tcontent class=\"\" id=\"tab_id1\"]2222222222222222222222222222222222222222222222222222[/tcontent]
[tcontent class=\"\" id=\"tab_id2\"]333333333333333333333333333333333333333333333333333333333333[/tcontent]
[/tcontents]
[/tabs]'>Dropdown Tabs*</option>";

/* collapse */
$shortcodes_list .= "<option value='0'>--------------------------------------------------</option>";
$shortcodes_list .= "<option value='[collapse id=\"collapse_aa\"]
[citem title=\"Collapsible Group Item a1\" id=\"citem_a1\" parent=\"collapse_aa\"]
Collapse content goes here....
[/citem]
[citem title=\"Collapsible Group Item a2\" id=\"citem_a2\" parent=\"collapse_aa\"]
Collapse content goes here....
[/citem]
[citem title=\"Collapsible Group Item a3\" id=\"citem_a3\" parent=\"collapse_aa\"]
Collapse content goes here....
[/citem]
[/collapse]'>Collapse 3 itens*</option>";
$shortcodes_list .= "<option value='[collapse id=\"collapse_bb\"]
[citem title=\"Collapsible Group Item b1\" id=\"citem_b1\" parent=\"collapse_bb\"]
Collapse content goes here....
[/citem]
[citem title=\"Collapsible Group Item b2\" id=\"citem_b2\" parent=\"collapse_bb\"]
Collapse content goes here....
[/citem]
[citem title=\"Collapsible Group Item b3\" id=\"citem_b3\" parent=\"collapse_bb\"]
Collapse content goes here....
[/citem]
[citem title=\"Collapsible Group Item b4\" id=\"citem_b4\" parent=\"collapse_bb\"]
Collapse content goes here....
[/citem]
[/collapse]'>Collapse 4 itens*</option>";

/* jumbotron*/
$shortcodes_list .= "<option value='0'>--------------------------------------------------</option>";
$shortcodes_list .= "<option value='[jumbotron]
<h1>Hello, world!</h1>
<p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
<p><a href=\"##-1-##\" class=\"btn btn-primary btn-lg\">Learn more</a></p>
[/jumbotron]'>Jumbotron*</option>";

/* WORDPRESS embed */
$shortcodes_list .= "<option value='0'>--------------------------------------------------</option>";
$shortcodes_list .= "<option value='[embed width=\"450\" height=\"200\"]https://twitter.com/webmaiscom/status/208510538613923840[/embed]' style='color: #0000FF'>WP Embed - Twitter</option>";
$shortcodes_list .= "<option value='[embed width=\"587\" height=\"440\"]http://www.youtube.com/watch?v=WQhR0Dvtnn8[/embed]' style='color: #0000FF'>WP Embed - youtube</option>";

/* flash centralizado */
$shortcodes_list .= "<option value='0'>--------------------------------------------------</option>";
$shortcodes_list .= "<option value='[flash value=\"/_file/swf/acordo_ortografico.swf\" id=\"acordo_ortografico\" width=\"330\" height=\"220\"]'>Flash (centralizado)</option>";
$shortcodes_list .= "<option value='[flash value=\"/_file/swf/acordo_ortografico.swf\" id=\"acordo_ortografico\" width=\"330\" height=\"220\" align=\"left\"]'>Flash (flutuante esquerda)</option>";
$shortcodes_list .= "<option value='[flash value=\"/_file/swf/acordo_ortografico.swf\" id=\"acordo_ortografico\" width=\"330\" height=\"220\" align=\"right\"]'>Flash (flutuante direita)</option>";

/* rotação de conteudo */
$shortcodes_list .= "<option value='0'>--------------------------------------------------</option>";
$shortcodes_list .= "<option value='[~[texto1;texto2;texto3;texto4]~]'>Rota&ccedil;&atilde;o de conte&uacute;do (rand&ocirc;mico)</option>";

/* GOOGLE MAPS */
$shortcodes_list .= "<option value='0'>--------------------------------------------------</option>";
$shortcodes_list .= "<option value='[map
 lat=\"-12.95254193\"
 lon=\"-38.4350260\"
 id=\"map\"
 z=\"1\"
 h=\"415\"
 maptype=\"ROADMAP\"
 kml=\"\"
 kmlautofit=\"yes\"
 marker=\"no\"
 markerimage=\"\"
 traffic=\"no\"
 bike=\"no\"
 fusion=\"\"
 start=\"-12.95254193,-38.4350260\"
 end=\"-12.9812429,-38.46520029999999\"
 infowindow=\"\"
 infowindowdefault=\"yes\"
 hidecontrols=\"false\"
 scale=\"false\"
 scrollwheel=\"true\"]
----------------------
+campos personalizados
----------------------
'style='color: #0000FF'>Mapas</option>";

/* Syntax Highlighter */
$shortcodes_list .= "<option value='0'>--------------------------------------------------</option>";
$shortcodes_list .= "<option value='[raw][code lang=\"php\" highlight=\"1,2,3\"]
----------------------
+campos personalizados
----------------------
[/code][/raw]' style='color: #0000FF'>Syntax Highlighter (php,css,js,xml)</option>";

//***********************************************************END
echo $shortcodes_list;
echo '</select>';
}
add_action('admin_head', 'shortcodeselector');

function shortcodeselector() {
	echo '<script type="text/javascript">
	jQuery(document).ready(function(){
	   jQuery("#sc_select").change(function() {
	   		var selectedval = jQuery("#sc_select :selected").val();
	   		if(selectedval != 0){
				send_to_editor(selectedval);
			}
			return false;
		});
	});
	</script>';
}

add_action('media_buttons','add_sc_select',11);

/* ------------------------------------------------------------------------------------------- */
/* CUSTOM EDITOR QUICKTAG BUTTONS */
/* ------------------------------------------------------------------------------------------- */
function _add_my_quicktags()
{?>
<script type="text/javascript">
QTags.addButton( 'b1', '*Center', '[center]', '[/center]' );
QTags.addButton( 'b2', '*Left', '<span style="float: left">', '</span>' );
QTags.addButton( 'b3', '*Right', '<span style="float: right">', '</span>' );
QTags.addButton( 'b4', '*B~&gt;', '<div class="bquote"><span style="float: left">###IMG###</span><a class="cursor1" href="javascript:(function(){w=390;h=440;window.open(\'http://webmais.com/fl/bookmarklet/hasher.php\',null,\'width=\'+w+\',height=\'+h+\',left=\'+parseInt((screen.availWidth/2)-(765/2))+\',top=\'+parseInt((screen.availHeight/3)-(102/2))+\'resizable=0,toolbar=0,scrollbars=0,location=0,status=0,menubar=0\');})();" onclick="window.alert(\'Arraste a este link para sua barra de favoritos, ou clique com bot&atilde;o direito e adicione o link aos Favoritos\');return false;"><strong>###NOME-DA-FERRAMENTA###&rsaquo;&rsaquo;&rsaquo;</strong></a><br />###DESCRICAO DA FERRAMENTA####</div>' );
QTags.addButton( 'b5', '*Lightbox', '<a href="###URL###?lightbox[iframe]=true&lightbox[width]=560&lightbox[height]=510" class="lightbox" title="" rel="nofollow">###LINK###</a>');
</script>
<?php
}
add_action('admin_print_footer_scripts',  '_add_my_quicktags');
?>
