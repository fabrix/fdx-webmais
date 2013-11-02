<?php
/*
* @package   FDX-Panel
* @author    Fabrix DoRoMo
* @uri       http://fabrix.net
* @license   http://fabrix.net/license
*/

/* LOAD FDX-Panel
-----------------------------------------------------------*/
define("FDX_PANEL_V", "1.0");

define("FDX_PANEL", TEMPLATEPATH . "/fdx-panel");
require_once( dirname(__FILE__) . '/fdx-panel/init.php' );

/* CDN
-----------------------------------------------------------*/
define("FDX_CDN_JQUERY", "//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js");
define("FDX_CDN_BOOTSTRAP_JS", "//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0/js/bootstrap.min.js");
define("FDX_CDN_BOOTSTRAP_CSS", "//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0/css/bootstrap.min.css");
define("FDX_CDN_COLORBOX_JS", "//cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.4.3/jquery.colorbox-min.js");
define("FDX_CDN_COLORBOX2_CSS", "//cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.4.3/example1/colorbox.css");
define("FDX_CDN_CYCLE", "//cdnjs.cloudflare.com/ajax/libs/jquery.cycle/2.9999.8/jquery.cycle.all.min.js");




/*
*------------------------------------------------------------*/
require_once( dirname(__FILE__) . '/functions/core.php' );                      // core functions
require_once( dirname(__FILE__) . '/functions/shortcodes/shortcodes.php' );
require_once( dirname(__FILE__) . '/functions/widgets/widgets.php' );
require_once( dirname(__FILE__) . '/functions/plugin-seo.php' );
require_once( dirname(__FILE__) . '/functions/plugin-pagination.php' );
require_once( dirname(__FILE__) . '/functions/plugin-breadcrumbs.php' );

if (option::get('control_favoritos') == 'on') { //
require_once( dirname(__FILE__) . '/functions/plugin-favorites.php' );
}

/* SUPORTE A MULTI IDIOMAS
*------------------------------------------------------------*/
$currentLocale = get_locale();
			if(!empty($currentLocale)) {
				$moFile = dirname(__FILE__) . "/languages/". $currentLocale . ".mo";
				if(@file_exists($moFile) && is_readable($moFile)) load_textdomain('fdx-lang', $moFile);
}
?>