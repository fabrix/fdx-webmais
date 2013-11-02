<?php
require_once( dirname(__FILE__) . '/fdx.php' );
require_once( dirname(__FILE__) . '/core/option-manager.php' );

fdx::init();

//estas fun��es so carregam no painel de controle
if (is_admin()) {
require_once( dirname(__FILE__) . '/core/medialib-uploader.php' );
require_once( dirname(__FILE__) . '/core/dashboard.php' ); xxx
}

/* Wordpress Login Logo and URL
 *------------------------------------------------------------*/
function thisismyurl_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.fdx::$assetsPath.'/images/login-logo.png) !important; }
        #login {padding-top:20px !important;}
        </style>';
}
add_action('login_head', 'thisismyurl_custom_login_logo');

//url
function thisismyurl_custom_login_logo_url($url) {
	return 'http://fabrix.net/fdx-panel/';
}
add_filter( 'login_headerurl', 'thisismyurl_custom_login_logo_url' );
//title
function change_wp_login_title() {
return 'FDX PANEL v' . fdx::$fdxVersion;
}
add_filter('login_headertitle', 'change_wp_login_title');
?>
