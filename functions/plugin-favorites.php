<?php
//http://nxsn.com/my-projects/wp-favorite-posts-plugin/

define('WPFP_META_KEY', "wpfp_favorites");
define('WPFP_USER_OPTION_KEY', "wpfp_useroptions");

function wp_favorite_posts() {
    if (isset($_REQUEST['wpfpaction'])):

        if ($_REQUEST['wpfpaction'] == 'add') {
            wpfp_add_favorite();
        } else if ($_REQUEST['wpfpaction'] == 'remove') {
            wpfp_remove_favorite();
        } else if ($_REQUEST['wpfpaction'] == 'clear') {
            if (wpfp_clear_favorites()) wpfp_die_or_go('Limpo');
            else wpfp_die_or_go("ERROR");
        }
    endif;
}
add_action('template_redirect', 'wp_favorite_posts');

function wpfp_add_favorite($post_id = "") {
    if ( empty($post_id) ) $post_id = $_REQUEST['postid'];

    if (wpfp_do_add_to_list($post_id)) {
        // added, now?
        do_action('wpfp_after_add', $post_id);

            $str = wpfp_link(1, "remove", 0, array( 'post_id' => $post_id ) );
            wpfp_die_or_go($str);

    }
}
function wpfp_do_add_to_list($post_id) {
    if (wpfp_check_favorited($post_id))
        return false;
    if (is_user_logged_in()) {
        return wpfp_add_to_usermeta($post_id);
    }
}

function wpfp_remove_favorite($post_id = "") {
    if (empty($post_id)) $post_id = $_REQUEST['postid'];
    if (wpfp_do_remove_favorite($post_id)) {
        // removed, now?
        do_action('wpfp_after_remove', $post_id);

            if ($_REQUEST['page']==1):
                $str = '';
            else:
                $str = wpfp_link(1, "add", 0, array( 'post_id' => $post_id ) );
            endif;
            wpfp_die_or_go($str);

       //  wpfp_die_or_go('removido');

    }
    else return false;
}

function wpfp_die_or_go($str) {

   wp_redirect($_SERVER['HTTP_REFERER']);

}

function wpfp_add_to_usermeta($post_id) {
    $wpfp_favorites = wpfp_get_user_meta();
    $wpfp_favorites[] = $post_id;
    wpfp_update_user_meta($wpfp_favorites);
    return true;
}

function wpfp_check_favorited($cid) {
    if (is_user_logged_in()) {
        $favorite_post_ids = wpfp_get_user_meta();
        if ($favorite_post_ids)
            foreach ($favorite_post_ids as $fpost_id)
                if ($fpost_id == $cid) return true;
	}
    return false;
}

function wpfp_link( $return = 0, $args = array() ) {
    global $post;
    $post_id = $post->ID;
    extract((array)$args);
    $str = "";
    if (wpfp_check_favorited($post_id)):
        $str .= wpfp_link_html($post_id, '<span class="btn btn-danger">Remover dos Favoritos</spann>', "remove");
    else:
        $str .= wpfp_link_html($post_id, '<span class="btn btn-primary">Adicionar aos Favoritos</spann>', "add");
    endif;
    if ($return) { return $str; } else { echo $str; }
}

function wpfp_link_html($post_id, $opt, $action) {
    $link = "<a class='wpfp-link' href='?wpfpaction=".$action."&amp;postid=". $post_id . "' rel='nofollow'>". $opt ."</a>";
    $link = apply_filters( 'wpfp_link_html', $link );
    return $link;
}

function wpfp_get_users_favorites($user = "") {
    $favorite_post_ids = array();

    if (!empty($user)):
        return wpfp_get_user_meta($user);
    endif;

    # collect favorites from user is logged in from database.
    if (is_user_logged_in()):
        $favorite_post_ids = wpfp_get_user_meta();
	endif;
    return $favorite_post_ids;
}

function wpfp_list_favorite_posts( $args = array() ) {
    $user = $_REQUEST['user'];
    extract((array)$args); 
    global $favorite_post_ids;
    if (!empty($user)):
        if (!wpfp_is_user_favlist_public($user)):
            $favorite_post_ids = wpfp_get_users_favorites($user);
        endif;
    else:
        $favorite_post_ids = wpfp_get_users_favorites();
    endif;

}


// include("wpfp-widgets.php");


function wpfp_clear_favorites() {
    if (is_user_logged_in()) {
        $favorite_post_ids = wpfp_get_user_meta();
        if ($favorite_post_ids):
            foreach ($favorite_post_ids as $post_id) {
                wpfp_update_post_meta($post_id, -1);
            }
        endif;
        if (!delete_user_meta(wpfp_get_user_id(), WPFP_META_KEY)) {
            return false;
        }
    }
    return true;
}
function wpfp_do_remove_favorite($post_id) {
    if (!wpfp_check_favorited($post_id))
        return true;

    $a = true;
    if (is_user_logged_in()) {
        $user_favorites = wpfp_get_user_meta();
        $user_favorites = array_diff($user_favorites, array($post_id));
        $user_favorites = array_values($user_favorites);
        $a = wpfp_update_user_meta($user_favorites);
    }
}


function wpfp_init() {
    $wpfp_options = array();
    $wpfp_options['widget_title'] = '';
    $wpfp_options['widget_limit'] = 5;
    add_option('wpfp_options', $wpfp_options, 'Favorite Posts Options');
}
add_action('activate_wp-favorite-posts/wp-favorite-posts.php', 'wpfp_init');


function wpfp_update_user_meta($arr) {
    return update_usermeta(wpfp_get_user_id(),WPFP_META_KEY,$arr);
}

function wpfp_update_post_meta($post_id, $val) {
	$oldval = wpfp_get_post_meta($post_id);
	if ($val == -1 && $oldval == 0) {
    	$val = 0;
	} else {
		$val = $oldval + $val;
	}
    return add_post_meta($post_id, WPFP_META_KEY, $val, true) or update_post_meta($post_id, WPFP_META_KEY, $val);
}

function wpfp_delete_post_meta($post_id) {
    return delete_post_meta($post_id, WPFP_META_KEY);
}


function wpfp_get_options() {
   return get_option('wpfp_options');
}

function wpfp_get_user_id() {
    global $current_user;
    get_currentuserinfo();
    return $current_user->ID;
}

function wpfp_get_user_meta($user = "") {
    if (!empty($user)):
        $userdata = get_userdatabylogin($user);
        $user_id = $userdata->ID;
        return get_usermeta($user_id, WPFP_META_KEY);
    else:
        return get_usermeta(wpfp_get_user_id(), WPFP_META_KEY);
    endif;
}

function wpfp_get_post_meta($post_id) {
    $val = get_post_meta($post_id, WPFP_META_KEY, true);
    if ($val < 0) $val = 0;
    return $val;
}


function wpfp_is_user_favlist_public($user) {
    $user_opts = wpfp_get_user_options($user);
    if ($user_opts['list_is_public'])
        return true;
    else
        return false;
}

function wpfp_get_user_options($user) {
    $userdata = get_userdatabylogin($user);
    $user_id = $userdata->ID;
    return get_usermeta($user_id, WPFP_USER_OPTION_KEY);
}
function wpfp_is_user_can_edit() {
    if ($_REQUEST['user'])
        return false;
    return true;
}
function wpfp_remove_favorite_link($post_id) {
    if (wpfp_is_user_can_edit()) {
        $wpfp_options = wpfp_get_options();
        $link = "<a id='rem_$post_id' class='removlink' href='?wpfpaction=remove&amp;page=1&amp;postid=". $post_id ."' title='Remover' rel='nofollow'><code id='c0'>X</code></a>";
        $link = apply_filters( 'wpfp_remove_favorite_link', $link );
        echo $link;
    }
}
function wpfp_clear_list_link() {
    if (wpfp_is_user_can_edit()) {
        $wpfp_options = wpfp_get_options();
        echo "<div style='text-align: center'><a href='?wpfpaction=clear' rel='nofollow'><code id='c1'>Limpar Favoritos</code></a></div>";
    }
}

function wpfp_get_option($opt) {
    $wpfp_options = wpfp_get_options();
    return htmlspecialchars_decode( stripslashes ( $wpfp_options[$opt] ) );
}