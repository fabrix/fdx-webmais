<?php
add_action('admin_menu', 'adminDashboard::init');

class adminDashboard {

    /**
     * Initialize wp-admin options page
     */
    public static function init() {
        self::process();
        self::addWPMenu();
        medialibUploader::init();
    }
    
    /**
     * Pre-processor
     *
     * Pre process wp-admin requests and take care to save/update or to reset options
     */
    private static function process() {
        if (isset($_GET['page']) && $_GET['page'] == 'fdx_options' && isset($_REQUEST['action'])) {
            if ($_REQUEST['action'] == 'reset') {
                option::reset();
            }
        }
        
        if (is_admin() && isset($_GET['page']) && $_GET['page'] == 'fdx_options') {
            add_action('admin_print_styles', 'adminDashboard::register_admin_styles');
            add_action('admin_enqueue_scripts', 'adminDashboard::register_admin_scripts');
        }

    }
    

    public static function register_admin_styles() {
       wp_enqueue_style('fdx-panel', fdx::$assetsPath . '/css/fdx-panel.css', array(), fdx::$fdxVersion);
       wp_enqueue_style('colourpicker', fdx::$assetsPath . '/css/colorpicker.css', array(), fdx::$fdxVersion);
    }
    
    public static function register_admin_scripts() {
        wp_enqueue_script('fdx-panel', fdx::$assetsPath . '/js/fdx-panel.js', array('jquery', 'thickbox'), fdx::$fdxVersion, false); //carrega head
        wp_enqueue_script('colourpicker', fdx::$assetsPath . '/js/colorpicker.js', array(), fdx::$fdxVersion, false);
    }




    
    public static function admin() {
        require_once('page_options.php');
    }
    

    /**
     * fdx custom menu for wp-admin
     */
    private static function addWPMenu() {
        add_object_page ('FDX Panel', 'FDX Panel', 'manage_options','fdx_options', 'adminDashboard::admin', fdx::$assetsPath . '/images/menu_fdx.png');
    }

    /**
     * Menu for theme/framework options page
     */
    public static function menu() {
        $menu = option::$evoOptions['menu'];
        $out = '<ul class="tabs">';

        foreach ($menu as $item) {
            $class = strtolower(str_replace(" ", "_", preg_replace("/[^a-zA-Z0-9\s]/", "", $item['name'])));
            
            $out.= '<li class="' . $class . ' wz-parent" id="wzm-' . $class . '"><a href="#tab' . $item['id'] . '"><div class="section-icon" style="background-image:url('.get_template_directory_uri().'/fdx-panel/core/images/icons/'.$item['id'].'.png);"></div>' . $item['name'] . '</a><span></span><em></em>';
            $out.= '<ul>';
            foreach (option::$evoOptions['id' . $item['id']] as $submenu) {
                if ($submenu['type'] == 'preheader') {
                    $name = $submenu['name'];
                    
                    $stitle = 'wpz_' . substr(md5($name), 0, 8);
                    
                    $out.= '<li class="sub"><a href="#' . $stitle . '">' . $name . '</a></li>';
                }
            }
            $out.= '</ul>';
            $out.= '</li>';
        }
        
        $out.= '</ul>';
        
        echo $out;
    }
    
    public static function content() {
        $options = option::$evoOptions;

        $rOptions = array();
        $out = "";
        foreach($options as $name => $foptions) {
            $name = explode("id", $name);
            if (isset($name[1]) && $name[1] != "") {
                $rOptions[$name[1]] = $foptions;
            }
        }
        foreach ($rOptions as $rid => $column) {
        ?>
            <div id="tab<?php echo $rid; ?>" class="tab_content">

                <?php
                $out = "";
                $sidebar = "";
                $first = true;
                foreach ($column as $row) {
                    
                    $name = $row['name'];
                    $type = $row['type'];
                    if ($type != 'preheader') {
                        $id = isset($row['id']) ? $row['id'] : '';
                        $std = isset($row['std']) ? $row['std'] : '';
                        $desc = isset($row['desc']) ? $row['desc'] : '';
                        $value = (option::get($id) != "" && !is_array(option::get($id))) ? stripslashes(option::get($id)) : $std;
                    }
                    
                    if ($row['type'] != 'preheader') {
                        $out.= '<div class="wpz_option_container clear">';
                    }
                    
                    switch ($row['type']) {
                        case 'preheader':
                            if (!$first) {
                                $out.= "</div>";
                            }
                            $first = false;
                            $stitle = 'wpz_' . substr(md5($name), 0, 8);
                            $out.= "<div class=\"sub\" id=\"$stitle\">";
                            $out.= "<h4>$name</h4>";
                            $out.= "<div class=\"cleaner\">&nbsp;</div>";
                            break;
                        
                        case 'text':
                            $out.= "<label for=\"$id\">$name</label>";
                            $out.= "<input name=\"$id\" id=\"$id\" type=\"$type\" value=\"$value\" />";
                            $out.= "<p>$desc</p>";
                            $out.= '<div class="cleaner"></div></div>';
                            break;
                        

                       case 'textarea':
                            $out.= "<label>$name</label>";
                            if ($id == 'misc_export') {
                                $value = base64_encode(serialize(option::getOptions()));
                            }
                        //    elseif ($id === 'misc_debug') {
                        //        $value = fdx::debugInfo();
                       //     }
                            $out.= "<textarea id=\"$id\" name=\"$id\" type=\"$type\" colls=\"\" rows=\"\">$value</textarea>";
                            $out.= "<p>$desc</p>";
                            $out.= '<div class="cleaner"></div></div>';
                             break;


                        case 'select':
                            $out.= "<label>$name</label>";
                            $out.= "<select name=\"$id\" id=\"$id\">";
                            foreach ($row['options'] as $option) {
                                $selected = false;
                                if (option::get($id) == $option) { $selected = true; } else
                                if ($option == $std) { $selected = true; }
                                $out.= '<option' . ($selected ? ' selected="selected"' : '') . '>' . $option;
                                $out.= '</option>';
                            }
                            $out.= "</select>";
                            $out.= "<p>$desc</p>";
                            $out.= '<div class="cleaner"></div></div>';
                            break;

                        case 'checkbox':
                            $out.= '<div class="checkbox">';
                             $out.= "<input type=\"checkbox\" class=\"checkbox\" name=\"$id\" id=\"$id\" ";
                            if (option::get($id) == "on") {
                                $out.= ' checked="checked"';
                            } elseif (!option::get($id) && $std == "on") {
                                $out.= ' checked="checked"';
                            }
                            $out.= " />";
							$out.= "<label for=\"$id\">$name</label>";
							$out.= "<p>$desc</p>";
                            $out.= "</div>";
                            $out.= '<div class="cleaner"></div></div>';
                            break;
                        
                        case 'upload':
                            $val = option::get($id) ? option::get($id) : $std;
                            $out.= "<label>$name</label>";
                            $out.= medialibUploader::action($id, $val, $desc);
                            $out.= '<div class="cleaner"></div></div>';
                            break;

                        case 'color':
                            $val = option::get($id) ? option::get($id) : '';
                            $out.= "<label>$name</label>";
                            $out.= '<div class="colorSelector"><div></div></div><input name="'.$id.'" id="'.$id.'" class="txt input-text input-colourpicker" type="text" value="'.$val.'"></input>';
                            $out.= "<p>$desc</p>";
                            $out.= '<div class="cleaner"></div></div>';
                            break;
                    }
                }
                $out.= "</div>";
                ?>
                <div class="zoomForms">
                    <?php echo $out; ?>
                </div><!-- end .zoomForms -->
                <div class="clear"></div>
            </div>
    <?php 


        }
        
    }



}