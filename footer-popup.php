<div class="clear"></div>
<?php
wp_footer();

/* Script de terceiros e outros */
get_template_part('includes/footer_script');

/* codigos incluido no painel */
if ( option::get('footer_code') <> "" ) {
echo stripslashes(option::get('footer_code')) . "\n";
}
?>
</body>
</html>