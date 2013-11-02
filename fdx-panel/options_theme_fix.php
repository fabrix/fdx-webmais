<?php
//----------------------------------------------------
//GET BLOG CATEGORIES   2
	$categories = get_categories('hide_empty=0&orderby=name');
	$wp_cats = array();
	foreach ($categories as $category_list ) {
		$wp_cats[$category_list->cat_ID] = $category_list->cat_name;
	}
	array_unshift($wp_cats, "");

//GET PAGES
	$pages = get_pages();
	$wp_pages = array();
	foreach ($pages as $page_list ) {
		$wp_pages[$page_list->ID] = $page_list->post_title;
	}
	array_unshift($wp_pages, "");

//----------------------------------------------------
return array(
/* Theme Admin Menu */
"menu" => array(
    array("id"    => "1",
          "name"  => __('General', 'fdx_panel')),

    array("id"    => "2",
          "name"  => "Home"),

	array("id"    => "3",
          "name"  => "Layout"),

	array("id"    => "4",
          "name"  => __('Ads', 'fdx_panel')),
),

/* General Settings */
"id1" => array(
/*------------------------------------------------------*/
    array("type"  => "preheader",
          "name"  => __('Theme Settings', 'fdx_panel') ),

    array("name"  => "Default Layout",
          "desc"  => "Choose a default layout for your archive pages and posts.",
          "id"    => "default_layout",
          "options" => array('Default','Galeria','Forum'),
          "std"   => "Default",
          "type"  => "select"),

    array("name"  => "*Cores e estylo",
          "desc"  => "Escolha padrão cores",
          "id"    => "esquema_cores",
          "options" => array('blue', 'red', 'purple', 'green', 'orange'),
          "std"   => "blue", //valor padrão quando reset
          "type"  => "select"),

    array("name"  => "*Favicon URL",
          "desc"  => "Upload a favicon image (16&times;16px).",
          "id"    => "misc_favicon",
          "std"   => "",
          "type"  => "upload"),

array("type"  => "preheader",
          "name"  => "RSS e Redes Sociais"),

array( "name" => "Feed (Custom Feed URL)",
        "desc" => "Entre com URL: <code>http://feeds.feedburner.com/id</code>. Caso em branco usado o padr&atilde;o wordpress /feeed/atom/",
        "id" => "social_opp1",
        "type" => "text",
        "std" => ""),

array( "name" => "News Leter (feed burn)",
        "desc" => "Entre com o ID: <code>http://feeds.feedburner.com/<strong>ID</strong></code>",
        "id" => "social_opp5",
        "type" => "text",
        "std" => ""),

array( "name" => "Fecebook",
        "desc" => "Entre com o ID: <code>http://www.facebook.com/<strong>ID</strong></code>",
        "id" => "social_opp2",
        "type" => "text",
        "std" => ""),

array( "name" => "Twitter",
        "desc" => "Entre com o ID: <code>https://twitter.com/#!/<strong>ID</strong></code>",
        "id" => "social_opp3",
        "type" => "text",
        "std" => ""),

array( "name" => "Google Plus",
        "desc" => "Entre com o ID: <code>https://plus.google.com/<strong>ID</strong></code>",
        "id" => "social_opp4",
        "type" => "text",
        "std" => ""),

array("type"  => "preheader",
          "name"  => "Footer"),

array( "name" => "copyright",
        "desc" => "#year#",
        "id" => "footer_opp1",
        "type" => "text",
        "std" => "&copy; #year# - ".get_bloginfo('name')),

array("type"  => "preheader",
          "name"  => __('Page Options', 'fdx_panel') ),

	array("name" => __('Packages Page', 'fdx_panel'),
	      "desc" => __('Select a page to pull an excerpt from to display in the 2nd column.', 'fdx_panel'),
	      "id"   => "packages_page",
          "options" => $wp_pages,
          "std"   => "",
          "type" => "select"),

	array("name" => __('Property Page', 'fdx_panel'),
	      "desc" => __('Select your property page. If you don\'t already have one, create a blank page with the Properties template and then assign it here.', 'fdx_panel'),
	      "id"   => "property_page",
          "options" => $wp_pages,
          "std"   => "",
          "type" => "select"),

   	array("name"  => "Properties Per Page",
          "desc"  => "Properties per page shown on your website.",
          "id"    => "property_page_no",
          "std"   => "15",
          "options" => range(3, 90, 3), //inicio, fim, intervalo
          "type" => "select"),

	array("name" => __('Pricing Sign - Before Price', 'fdx_panel'),
	      "desc" => __('Choose the pricing sign that shows BEFORE the total amounts.', 'fdx_panel'),
	      "id"   => "price_sign_before",
          "std"   => "R$ ",
          "type" => "text"),

array("type"  => "preheader",
          "name"  => __('Payment Info', 'fdx_panel') ),

   	array("name"  => "Enable Paypal Sandbox mode",
          "desc" => __('If enabled, paypal will work in the sandbox mode and no real charges will be made', 'fdx_panel'),
          "id"    => "paypal_sandbox",
          "std"   => "off",
          "type"  => "checkbox"),

	array("name" => __('Paypal API Username', 'fdx_panel'),
	      "desc" => __('Please type here your paypal API username', 'fdx_panel'),
	      "id"   => "paypal_user",
          "std"   => "",
          "type" => "text"),

	array("name" => __('Paypal API Password', 'fdx_panel'),
	      "desc" => __('Your Paypal API password', 'fdx_panel'),
	      "id"   => "paypal_password",
          "std"   => "",
          "type" => "text"),

	array("name" => __('Paypal API Signature', 'fdx_panel'),
	      "desc" => __('Your Paypal API Signature', 'fdx_panel'),
	      "id"   => "paypal_signature",
          "std"   => "",
          "type" => "text"),

        array("name"  => __('Paypal Currency Code', 'fdx_panel'),
          "desc"  => __('Type in the currency your transactions will be made in (Currency Code)', 'fdx_panel'),
          "id"    => "paypal_currency",
          "options" => array('BRL', 'EUR', 'USD'),
          "std"   => "BRL",
          "type"  => "select"),

	array("name" => __('Payment Name', 'fdx_panel'),
	      "desc" => __('Payment name of the transaction.', 'fdx_panel'),
	      "id"   => "paypal_name",
          "std"   => "Nome do Plano",
          "type" => "text"),


/*------------------------------------------------------*/
),/*HOMEPAGE*/
"id2" => array(
/*------------------------------------------------------*/
array("type"  => "preheader",
          "name"  => __('Mapa', 'fdx_panel')),


	array("name"  => "Initial Map Latitude",
          "desc"  => "Use <a href='http://universimmedia.pagesperso-orange.fr/geo/loc.htm' target='_blank'>this service</a> #2",
          "id"    => "custom_init_map_lat",
          "std"   => "",
          "type"  => "text"),

	array("name"  => "Initial Map Longitude",
          "desc"  => "Use <a href='http://itouchmap.com/latlong.html' target='_blank'>this service</a> #1",
          "id"    => "custom_init_map_lng",
          "std"   => "",
          "type"  => "text"),

	array("name"  => "Initial Zoom",
          "desc"  => "xxxxxxxxxxxxxxxxxxxxxxxxx",
          "id"    => "slider_zoom",
          "std"   => "13",
          "options" => range(1, 20, 1), //inicio, fim, intervalo
          "type" => "select"),

	array("name"  => "Number of Slides",
          "desc"  => "xxxxxxxxxxxxxxxxxxxxxxxxx",
          "id"    => "slider_no",
          "std"   => "100",
          "type"  => "text"),

/*------------------------------------------------------*/
array("type"  => "preheader",
          "name"  => "Cycle Slider #"),

 	array("name"  => "Slide 1 ID",
          "desc"  => "Entre com id do post ou page para slide 1",
          "id"    => "slider_id_1",
          "std"   => "",
          "type"  => "text"),

    array("name"  => "Slider Imagem 1",
          "desc"  => "Imagem do slider 1 (606x332)",
          "id"    => "slider_img_1",
          "std"   => "",
          "type"  => "upload"),

  	array("name"  => "Slide 2 ID",
          "desc"  => "Entre com id do post ou page para slide 1",
          "id"    => "slider_id_2",
          "std"   => "",
          "type"  => "text"),

    array("name"  => "Slider Imagem 2",
          "desc"  => "Imagem do slider 1 (606x332)",
          "id"    => "slider_img_2",
          "std"   => "",
          "type"  => "upload"),

   	array("name"  => "Slide 3 ID",
          "desc"  => "Entre com id do post ou page para slide 3",
          "id"    => "slider_id_3",
          "std"   => "",
          "type"  => "text"),

    array("name"  => "Slider Imagem 3",
          "desc"  => "Imagem do slider 3 (606x332)",
          "id"    => "slider_img_3",
          "std"   => "",
          "type"  => "upload"),

   	array("name"  => "Slide 4 ID",
          "desc"  => "Entre com id do post ou page para slide 4",
          "id"    => "slider_id_4",
          "std"   => "",
          "type"  => "text"),

    array("name"  => "Slider Imagem 4",
          "desc"  => "Imagem do slider 4 (606x332)",
          "id"    => "slider_img_4",
          "std"   => "",
          "type"  => "upload"),

   	array("name"  => "Slide 5 ID",
          "desc"  => "Entre com id do post ou page para slide 5",
          "id"    => "slider_id_5",
          "std"   => "",
          "type"  => "text"),

    array("name"  => "Slider Imagem 5",
          "desc"  => "Imagem do slider 5 (606x332)",
          "id"    => "slider_img_5",
          "std"   => "",
          "type"  => "upload"),

 array("name"  => "Efeito",
          "desc"  => "Escolha o efeito de transi&ccedil;&atilde;o dos slides. (<a href=\"http://jquery.malsup.com/cycle/browser.html\" target=\"_blank\">demonstra&ccedil;&atilde;o</a>) (<strong>All</strong> = todos os efeitos)",
          "id"    => "cycle_efeito",
          "options" => array('blindX','blindY','blindZ','cover','curtainX','curtainY','fade','fadeZoom','growX','growY','scrollUp','scrollDown','scrollLeft','scrollRight','scrollHorz','scrollVert','slideX','slideY','turnUp','turnDown','turnLeft','turnRight','uncover','wipe','zoom','all','shuffle','toss'),
          "std"   => "scrollLeft",
          "type"  => "select"),

array("name"  => "Slide transition speed",
          "desc"  => "Select the interval (in miliseconds) at which the slider should change posts (if autoplay is enabled). Default: 2000 (2 seconds).",
          "id"    => "cycle_animspeed",
          "std"   => "2000",
          "type"  => "text"),

	array("name"  => "How long each slide will show",
          "desc"  => "Select the interval (in miliseconds) at which the slider should change posts (if autoplay is enabled). Default: 4000 (4 seconds).",
          "id"    => "cycle_pausetime",
          "std"   => "4000",
          "type"  => "text"),


/*------------------------------------------------------*/
   array("type"  => "preheader",
          "name"  => "featuresd Content #"),

array("name"  => "Featured Category 1",
          "desc"  => "Select the category which should appear as #1.",
          "id"    => "featured_category_1",
          "options" => $wp_cats,
          "type"  => "select"),

array("name"  => "Featured Category 2",
          "desc"  => "Select the category which should appear as #2.",
          "id"    => "featured_category_2",
          "options" => $wp_cats,
          "type"  => "select"),

array("name"  => "Featured Category 3",
          "desc"  => "Select the category which should appear as #2.",
          "id"    => "featured_category_3",
          "options" => $wp_cats,
          "std"   => "",
          "type"  => "select"),

array("name"  => "Featured Category 4",
          "desc"  => "Select the category which should appear as #2.",
          "id"    => "featured_category_4",
          "options" => $wp_cats,
          "type"  => "select"),

array("name"  => "Featured Category 5",
          "desc"  => "Select the category which should appear as #2.",
          "id"    => "featured_category_5",
          "options" => $wp_cats,
          "std"   => "",
          "type"  => "select"),

array("name"  => "Featured Category 6",
          "desc"  => "Select the category which should appear as #2.",
          "id"    => "featured_category_6",
          "options" => $wp_cats,
          "type"  => "select"),

array("name"  => "Featured Category 7",
          "desc"  => "Select the category which should appear as #2.",
          "id"    => "featured_category_7",
          "options" => $wp_cats,
          "type"  => "select"),

array("name"  => "Featured Category 8",
          "desc"  => "Select the category which should appear as #2.",
          "id"    => "featured_category_8",
          "options" => $wp_cats,
          "type"  => "select"),


array(  "name" => "Featured Posts per Category",
        "desc" => "How many posts should appear in every \"Featured Category\" on the homepage? Default: 6.",
        "id" => "number_featured_category",
        "options" => array('1', '2', '3', '4', '5', '6', '7','8','9','10'),
        "type" => "select"),

/*------------------------------------------------------*/
),
"id3" => array(
/*------------------------------------------------------*/
	array("type"  => "preheader",
          "name"  => "Styling"),

	array("name"  => "Background Color",
           "desc"  => "Optionally you can upload an image as background on this <a href=\"themes.php?page=custom-background\" target=\"_blank\">here</a>.",
 		   "id"   => "bg_css_color",
           "type" => "color"),

	array("name"  => "Link Color",
          "desc"  => "Optionally you can upload an image as background on this <a href=\"themes.php?page=custom-background\" target=\"_blank\">here</a>.",
		   "id"   => "a_css_color",
           "type" => "color"),

	array("name"  => "Link Hover Color",
           "desc"  => "Optionally you can upload an image as background on this <a href=\"themes.php?page=custom-background\" target=\"_blank\">here</a>.",
		   "id"   => "ahover_css_color",
           "type" => "color"),

	array("name"  => "Button Color",
           "desc"  => "Optionally you can upload an image as background on this <a href=\"themes.php?page=custom-background\" target=\"_blank\">here</a>.",
 		   "id"   => "btn_css_color",
           "type" => "color"),

	array("name"  => "Button Hover Color",
           "desc"  => "Optionally you can upload an image as background on this <a href=\"themes.php?page=custom-background\" target=\"_blank\">here</a>.",
		   "id"   => "btnhover_css_color",
           "options" => range(1, 20, 1), //inicio, fim, intervalo
           "type" => "select"),


/*------------------------------------------------------*/
),
"id4" => array(
/*------------------------------------------------------*/
	array("type"  => "preheader",
          "name"  => "Topo 728x90"),

    array("name"  => "HTML Code (Adsense)",
          "desc"  => "Enter complete HTML code for your banner (or Adsense code) or upload an image below.",
          "id"    => "top_code",
          "std"   => "",
          "type"  => "textarea"),
/*------------------------------------------------------*/
	array("type"  => "preheader",
          "name"  => "Fluid na Base"),

	array("name"  => "Ativar em todas as paginas",
          "id"    => "fluid_banner_todas",
          "std"   => "off",
          "type"  => "checkbox"),

    array("name"  => "Utilizar cookie (seção) para desativar <small>(se demarcado aparece sempre)</small>",
          "id"    => "fluid_banner_cookie",
          "std"   => "off",
          "type"  => "checkbox"),

    array("name"  => "HTML Code (Adsense)",
          "desc"  => "Enter complete HTML code for your banner (or Adsense code) or upload an image below.",
          "id"    => "fluid_code",
          "std"   => "",
          "type"  => "textarea"),

	array("name"  => "Upload your image",
          "desc"  => "Upload a banner image or enter the URL of an existing image.",
          "id"    => "fluid_imageupload",
          "std"   => "",
          "type"  => "upload"),

	array("name"  => "Destination URL",
          "desc"  => "Enter the URL where this banner ad points to.",
          "id"    => "fluid_imageupload_url",
          "type"  => "text"),

/*------------------------------------------------------*/
	array("type"  => "preheader",
          "name"  => "Ads. no Post"),

    array("name"  => "HTML Code (Adsense)",
          "desc"  => "Enter complete HTML code for your banner (or Adsense code) or upload an image below.",
          "id"    => "ads_post",
          "std"   => "",
          "type"  => "textarea"),

/*-------------------------end--------------------------*/
)
);/* end return */