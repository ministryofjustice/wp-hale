<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hale
 * Theme Hale with GDS styles
 * ©Crown Copyright
 * Adapted from version from NHS Leadership Academy, Tony Blacker
 * @version 2.0 February 2021
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div id="comments">

	<?php
	// You can start editing here -- including this comment!
	if ( $comments ) :
		$comments_number = absint( get_comments_number() );
		?>
		<h2 class="comments-title">
			<?php
			if ( ! have_comments() ) {
				esc_html_e( 'Leave a comment', 'hale' );
			} elseif ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( esc_html_x( 'One reply on &ldquo;%s&rdquo;', 'comments title', 'hale' ), esc_html( get_the_title() ) );
			} else {
				echo sprintf(
					esc_html(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s reply on &ldquo;%2$s&rdquo;',
							'%1$s replies on &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							'hale'
						)
					),
					esc_html( number_format_i18n( $comments_number ) ),
					esc_html( get_the_title() )
				);
			}

			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ul class="govuk-list">
			<?php wp_list_comments( 'type=all&callback=hale_comment_display' ); ?>
		</ul><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'hale' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	// Customized strings for the comment form.
	$commentform_args = [
		'title_reply' => __( 'Leave a Comment', 'hale' ),
	];
	comment_form( $commentform_args );
	?>

</div><!-- #comments -->
