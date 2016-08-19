<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package autocar
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

<div id="comments" class="comments comments-area">
	<?php if ( have_comments() ) : ?>
		<div class="sep-section-heading">
		<h2>
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( '1 COMMENT', '%1$s %2$s', get_comments_number(), 'comments title', 'autocar' ) ),
					number_format_i18n( get_comments_number() ),
					 esc_html__('COMMENTS', 'autocar') 
				);
			?>
		</h2>
		</div>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'autocar' ); ?></h2>
			<div class="nav-links">
				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'autocar' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'autocar' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
				    'callback'   => 'autocar_customcomment',
					'avatar_size'=> 60,
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'autocar' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'autocar' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'autocar' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'autocar' ); ?></p>
	<?php endif; ?>
</div><!-- #comments -->
<?php	
$args = array(
  'id_form'           => 'commentform',
  'class_form'    	  => 'comment-form',
  'id_submit'         => 'submit',
  'class_submit'      => 'submit',
  'name_submit'       => 'submit',
  'title_reply'       => esc_html__( 'Leave Comment', 'autocar' ),
  'title_reply_to'    => esc_html__( 'Leave a Reply to %s', 'autocar' ),
  'cancel_reply_link' => esc_html__( 'Cancel Reply', 'autocar' ),
  'label_submit'      => esc_html__( 'Submit Now', 'autocar' ),
  'format'            => 'xhtml',
  'comment_field' =>  '<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><p class="comment-form-comment"><label for="comment"></label><textarea id="comment" name="comment" cols="45" rows="4"  placeholder="'.esc_html__('Message...', 'autocar' ).'" aria-required="true">' .
    '</textarea></p></div></div>'
);?>
<div class ="atc_comments">
	<?php comment_form( $args ); ?>
</div>