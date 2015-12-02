<?php
    if ( post_password_required() ) {
        return;
    }
?>

<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php printf( get_comments_number() == 0 || get_comments_number() > 1 ? '%1$s kommentarer på %2$s' : '%1$s kommentar på %2$s', get_comments_number(), '<span>' . get_the_title() . '</span>' ); ?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text">Kommentarnavigering</h2>

                <div class="nav-links">
                    <div class="nav-previous"><?php previous_comments_link( 'Äldre kommentarer' ); ?></div>
                    <div class="nav-next"><?php next_comments_link( 'Nyare kommentarer' ); ?></div>
                </div>
            </nav>
		<?php endif; ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style' => 'ol',
                    'avatar_size' => 64,
					'short_ping' => true
				) );
			?>
		</ol>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text">Kommentarnavigering</h2>

                <div class="nav-links">
                    <div class="nav-previous"><?php previous_comments_link( 'Äldre kommentarer' ); ?></div>
                    <div class="nav-next"><?php next_comments_link( 'Nyare kommentarer' ); ?></div>
                </div>
            </nav>
        <?php endif; ?>
	<?php endif; ?>

	<?php if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments">Inga nya kommentarer kan lämnas.</p>
	<?php endif; ?>

	<?php comment_form(); ?>


</div>
