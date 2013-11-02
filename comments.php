<?php // Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) { ?>
This post is password protected. Enter the password to view any comments.
<?php
	return;
}

// show the comments
if ( have_comments() ) : ?>


		<h1 align="center" style="margin-bottom: 25px"><a name="comments"></a>
		<?php comments_number('0 Coment&aacute;rio/TracBack', '1 Coment&aacute;rio/TracBack', '% Coment&aacute;rios/TracBack' );?>
		</h1> <!-- center-widget-title -->


	<ol class="commentlist">
	<?php  wp_list_comments(array('type'=>'comment', 'avatar_size'=>48, 'reply_text'=>'Responder')); ?>


    </ol>

		<?php
	if (get_option('page_comments')) {
		$comment_pages = paginate_comments_links('echo=0');
		if ($comment_pages) {
?>
<div align="center"><strong><?php echo $comment_pages; ?></strong></div>
<?php }	} ?>	

<div id="trackback"><strong>TracBack</strong><ol class="trackback"><small><?php wp_list_comments(array('type'=>'pings', 'style' => 'ol')); ?></small></ol></div>


	



<?php else : ?>

<?php if ('open' == $post->comment_status) : ?>
<h1 align="center" style="margin-bottom: 25px"><a name="comments"></a><em>Ainda n&atilde;o h&aacute; Coment&aacute;rios !</em></h1>

<?php else :

endif;
      endif;
if ('open' == $post-> comment_status) : ?>




<div id="respond">

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>

<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>



<?php else : ?>
 <form  id="commentform" class="comment-form" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
<fieldset>
<div class="form-box">
<h2><?php comment_form_title('ESCREVER UM COMENT&Aacute;RIO', 'RESPONDER A %s'); ?> <small><?php cancel_comment_reply_link('(Cancelar Resposta!)'); ?></small></h2>
<div id="message-note"></div>
<?php if ( $user_ID ) : ?>
<p><strong>Bem-vindo: <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> </strong>(<a title="Log Out" href="<?php echo wp_logout_url(); ?>">Sair</a>)</p>

<?php else : ?>
<div class="row">
<span class="text-wrap"><input type="text" class="text clearc" name="author" id="author" value="Seu Nome<?php if ($req) _e('*'); ?>" /></span>
<span class="text-wrap"><input type="text" class="text clearc" name="email" id="email" value="E-mail<?php if ($req) _e('*'); ?>" /></span>
<span class="text-wrap"><input type="text" class="text clearc" name="url" id="url" value="Website, Blog, etc " /></span>
</div>
<?php endif; ?>
<?php comment_id_fields(); ?>

							<div class="textarea">
								<textarea cols="1" rows="1" name="comment" id="comment" class="clearc" >Mensagem...</textarea>
							</div>
							<div class="row" id="submitrow">
								<input type="submit" name="submit"  value="Enviar" />
                                <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
                            </div>
						</div>
                          <?php do_action('comment_form', $post->ID); ?><!-- add confi...  -->

					</fieldset>
				</form>
</div>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>