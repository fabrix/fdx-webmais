<?php return array(
/* Theme Admin Menu */
"menu" => array(
    array("id"    => "5",
          "name"  => "SEO"),

    array("id"    => "6",
          "name"  => __('Integration', 'fdx_panel')),

    array("id"    => "7",
          "name"  => __('Settings', 'fdx_panel')),
),

/*------------------------------------------------------*/
/*SEO*/
"id5" => array(
/*------------------------------------------------------*/
    array("type"  => "preheader",
          "name"  => "Homepage <code>&lt;meta&gt;</code>"),

    array("name"  => "META Keywords for Homepage",
          "desc"  => "Insert META keywords, comma separated. Generally META Keywords are ignored by Search Engines.<br />On <strong><em>Single Posts</em></strong> by default tags will be used to generate keywords.",
          "id"    => "home_meta_key",
          "type"  => "textarea"),

    array("name"  => "META Description for Homepage",
          "desc"  => "Here you can insert META description for your home page, which will appear in search engines. If you leave it blank, the <a href='options-general.php' target='_blank'>Tagline</a> will be used instead. On Single Posts by default will be used the excerpt to generate description.",
          "id"    => "home_desc_key",
          "type"  => "textarea"),

    array("type"  => "preheader",
          "name"  => "Homepage <code>&lt;author&gt;</code>"),

    array( "name" => "Homepage Author",
        "desc" => "Select the user that you would like to be used as the rel=\"author\" for the homepage. Be sure the user you select has entered their Google+ profile address on the profile edit screen.",
        "id" => "home_author",
        "type" => "text",
        "std" => ""),

/*------------------------------------------------------*/
 ),/*MISCELLANEOUS*/
"id6" => array(
/*------------------------------------------------------*/
	array("type"  => "preheader",
          "name"  => "Custom Code"),

	array("name"  => "*Custom Style",
          "desc"  => "Here you can add scripts that will be added before the end of <code>&lt;head&gt;</code> tag.",
		  "id"    => "header_css",
          "std"   => "",
          "type"  => "textarea"),

	array("name"  => "*Header Code",
          "desc"  => "Here you can add scripts that will be added before the end of <code>&lt;head&gt;</code> tag.",
		  "id"    => "header_code",
          "std"   => "",
          "type"  => "textarea"),

    array("name"  => "*Footer Code & Analytics",
          "desc"  => "If you want to add some tracking script to the footer, like Google Analytics, insert the complete tracking code here. The following code will be added to the footer before the closing <code>&lt;/body&gt;</code> tag.",
          "id"    => "footer_code",
          "std"   => "",
          "type"  => "textarea"),

/*------------------------------------------------------*/
),
"id7" => array(
/*------------------------------------------------------*/

array("type"  => "preheader",
          "name"  => __('Options', 'fdx_panel')),

	array("name"  => "Ativar CDN para Libraries",
          "desc"  => "Se marcado Ativa CDN para (Bootstrap, Colorbox, jQuery.cycle)",
          "id"    => "control_ext",
          "std"   => "on",
          "type"  => "checkbox"),

	array("name"  => "Ativar jQuery via CDN",
          "desc"  => "Se marcado ativa carregamento jQuery por CDN (<a href=\"http://cdnjs.com\" target=\"_blank\">cdnjs - CloudFlare</a>)",
          "id"    => "control_jquery",
          "std"   => "on",
          "type"  => "checkbox"),

	array("name"  => "Ativar Favoritos",
          "desc"  => "Se marcado ativa fun&ccedil;&atilde;o Favoritos",
          "id"    => "control_favoritos",
          "std"   => "",
          "type"  => "checkbox"),

    array("type"  => "preheader",
          "name"  => __('Import / Export', 'fdx_panel')),

    array("name"  => "Import Options",
          "desc"  => "To import the options from another installation of this theme insert your code here.",
          "id"    => "misc_import",
          "std"   => "",
          "type"  => "textarea"),

    array("name"  => "Export Options",
          "desc"  => "Export the options to another installation of this theme, or to keep a backup of your options. You can can also save your options in a new text document.",
          "id"    => "misc_export",
          "std"   => "",
          "type"  => "textarea"),


)
);/* end return */