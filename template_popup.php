<?php
/*
Template Name: Popup
*/
?>
<?php get_header('popup'); ?>
</head>
<body class="postarea_pop">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php the_content(__('Read more', 'webmais'));?>
<?php wp_link_pages('before=<div id="page-links">PAGINAS:&after=</div>&next_or_number=number&pagelink= %'); ?>
<?php endwhile; else: ?>
<?php endif; ?>
<div class="clear" id="fluidbarr"></div>

<?php edit_post_link('<code id="c1">EDITAR</code>', '<p style="text-align: center">', '</p>'); ?>
<?php get_footer('popup'); ?>