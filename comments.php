<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to twentytwelve_comment() which is
 * located in the functions.php file.
 *
 * @package engager
 * @since 1.0.0
 */
?>

<div class="block">
	<?php if ( have_comments() ) : ?>
  <h2 class="block-title"> <?php
				printf( _n( '1 Comment', '%1$s Comments', get_comments_number(), 'engager' ),
					number_format_i18n( get_comments_number() ), '<span>' . esc_attr(get_the_title()) . '</span>' );
			?></h2>

      
		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'engager_comment', 'style' => 'ol' ) ); ?>
		</ol><!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'engager' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'engager' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'engager' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'engager' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>
  <?php comment_form();?>
</div><!-- #comments .comments-area -->