<?php
    /**
     * The comments template file
     *
     * @package MacMhìcheil.uk
     * @since MacMhìcheil.uk 1.0
     */
?>

<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>

			<?php
			return;
		}
	}
	/* This variable is for alternating comment background */
	$oddcomment = 'class="comments-alt" ';
?>

<!-- You can start editing here. -->


<?php if ('open' == $post->comment_status) : ?>

<h3 id="respond"><i class="fa fa-reply"></i> Thoir Beachd</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>Feumaidh tu <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">log a-steach</a> airson beachd a thoirt seachad.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Tha thu air logadh a-steach mar <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log a-mach &raquo;</a></p>

<?php else : ?>

<p><label for="author"><small>Ainm <?php if ($req) echo "(Riatanach)"; ?></small></label><br/><input class="form-control" type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" /></p>

<p><label for="email"><small>Post-d (Dìomhar) <?php if ($req) echo "(Riatanach)"; ?></small></label><br/><input class="form-control" type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" /></p>

<p><label for="url"><small>Làrach-lìn</small></label><br/><input class="form-control" type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" /></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea class="form-control" name="comment" id="comment" cols="10" rows="20" tabindex="4"></textarea></p>

<p><input class="form-control"name="submit" type="submit" id="submit" tabindex="5" value="Cuir a-steach" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<br/>

<?php if ($comments) : ?>
	<h3 id="comments"><i class="fa fa-comment"></i> <?php comments_number('Gun Bheachd', 'Beachdan', 'Beachdan' );?></h3>

	<ol class="commentlist">

	<?php foreach ($comments as $comment) : ?>

		<li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">

			<b><?php comment_author_link() ?></b>
			<?php if ($comment->comment_approved == '0') : ?>
			<em>Tha am beachd agad a' feitheamh ri aontachadh.</em>
			<?php endif; ?>
			<br />

			<p class="small"><?php comment_date('F jS, Y') ?> aig <?php comment_time() ?></p>

			<?php comment_text() ?>
			
			<p class="small"><?php edit_comment_link('Deasaich'); ?></p>

		</li>

	<?php
		/* Changes every other comment to a different class */
		$oddcomment = ( empty( $oddcomment ) ) ? 'class="comments-alt" ' : '';
	?>

	<?php endforeach; /* end for each comment */ ?>

	</ol>


 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Chan eil beachdan ceadaichte.</p>

	<?php endif; ?>
<?php endif; ?>




<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>