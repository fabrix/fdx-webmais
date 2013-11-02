<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<link rel="stylesheet" id="main" href="<?php echo get_template_directory_uri(); ?>/css/css.php?files=core,<?php echo option::get('esquema_cores');?>" media="all" />

<meta name="robots" content="noindex,nofollow" />
<?php wp_head();

get_template_part('includes/header/single');
?>