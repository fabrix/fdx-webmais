<?php
class fdx {
    public static $fdxVersion = "0.9.0";
    public static $fdxPath;
    public static $assetsPath;
    public static $themePath;
    public static $config;
    public static $themeData;
    public static $prefix = "fdx_";

    public static function init() {
        if (is_admin() && isset($_GET['activated']) && $_GET['activated'] == 'true') {
            self::activate();
        }
        self::loadThemeData();
        option::init();
        add_action('wp_ajax_fdx_ajax_post', 'fdx::ajaxOptions');
 }

/*Handle Ajax calls for option updates. */
    public static function ajaxOptions() {
        parse_str($_POST['data'], $data);

        check_ajax_referer('fdx-ajax-save', '_ajax_nonce');

        foreach(option::$options as $name => $null) {
            if ($data['misc_import'] != '') {
                if ($data['misc_import'] != '') {
                    option::setupOptions($data['misc_import'], true);
                }


                die("success");
            }
            if (isset($data[$name])) {
                if ($name == 'misc_export' || $name == 'misc_export') {
                 } else {
                    $value = $data[$name];

                    if (!is_array($data[$name])) {
                        $value = stripslashes($value);
                    }

                    update_option(option::$prefix . $name, $value);
             		$time = time();
		            update_option('fdx_edited_time', $time);
                }
            } else {
                update_option(option::$prefix . $name, "off");
            }
        }

        die("success");
    }

    /**  Called when theme is being activated, and redirects to options page. */
    public static function activate() {
        add_action('admin_head', 'self::optionSetup');
        header('Location: admin.php?page=fdx_options');
    }
    /**
     * Loads theme data and configs.
      */
    private static function loadThemeData() {
        self::$themePath = get_template_directory_uri();
        self::$fdxPath = self::$themePath . "/fdx-panel";
        self::$assetsPath = fdx::$fdxPath . '/core';
    }

}
?>
