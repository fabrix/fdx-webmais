<?php
// **************************************************************************
// Breadcrumbs
// **************************************************************************
function fdx_breadcrumbs() {
  $home = '<span class="bradhome"></span>'; // text for the 'Home' link
  $before = '<li><a>'; // tag before the current crumb
  $after = '</a></li>'; // tag after the current crumb
  $homeLink = get_bloginfo('url');
  echo '<ul class="breadcrumb2">';
  if ( !is_home() && !is_front_page() || is_paged() ) {

    global $post;
     echo '<li><a title="Home" href="' . $homeLink . '">' . $home . '</a></li>';

    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo '<li>' .(get_category_parents($parentCat, TRUE, ' </li> '));
      echo $before . single_cat_title('', false) . $after;

    } elseif ( is_day() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>';
      echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li>';
      echo $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>';
      echo $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li>';
        echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        echo '<li>' . get_category_parents($cat, TRUE, '</li>');
        echo $before . get_the_title() . $after;
      }

    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo '<li>' . get_category_parents($cat, TRUE, '</li>');
      echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li>';
      echo $before . get_the_title() . $after;

    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;

    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo '<li>' . $crumb . '</li>';
      echo $before . get_the_title() . $after;

    } elseif ( is_search() ) {
      echo $before . 'Resultados da busca por "' . get_search_query() . '"' . $after;

    } elseif ( is_tag() ) {
      echo $before . single_tag_title('', false) . $after;

    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . $userdata->display_name .$after;
    }

    elseif ( is_404() ) {
     echo $before . '404 - Page Not Found (Pagina n&atilde;o encontrada)' . $after;
     }

    if ( get_query_var('paged') ) {
      if ( is_home() || is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '<li><a>(';
      echo 'P&aacute;gina' . ' ' . get_query_var('paged');
      if ( is_home() || is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')</a></li>';
    }

  } else {
    echo '<li><a title="Home" href="' . $homeLink . '">' . $home . '</a></li>'; }
echo '</ul>';
}