<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package autocar
 */
$redux = autocar_reduxData();
if( isset($redux['autocar_sidebar_position']) )
{
	$sidebar_pos = $redux['autocar_sidebar_position'];
}	
get_header(); ?>
			<div class="page-heading"></div>
				<div class="blog-page">
					<div class="container">
						<div class="row">
						<?php 
						if( $sidebar_pos == 2)
						{
							get_sidebar();
						}	
						 ?>
						 <?php if($sidebar_pos == 1) {
							 echo '<div class="col-md-12">';
						 }
						 else{
							 echo '<div class="col-md-8">';
						 } ?>
						 
			<div class="error-404 not-found">
				<header class="page-header">
					<h2 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'autocar' ); ?></h2>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'autocar' ); ?></p>
					<div class="atc_searchform">
						<?php get_search_form(); ?>
					</div>
					<?php 
$args = array(
    'before_title' => '<h4>',
    'after_title' => '</h4>'
    );
	$instance = '';
					the_widget( 'WP_Widget_Recent_Posts',$instance, $args ); ?>

					<?php if ( autocar_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
					<div class="widget widget_categories">
						<h4 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'autocar' ); ?></h4>
						<ul>
						<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
						?>
						</ul>
					</div><!-- .widget -->
					<?php endif; ?>

					<?php
						/* translators: %1$s: smiley */
						$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'autocar' ), convert_smilies( ':)' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "before_title=<h4>$archive_content" );
					?>

					<?php the_widget( 'WP_Widget_Tag_Cloud',$instance, $args ); ?>

				</div><!-- .page-content -->
			</div><!-- .error-404 -->
			</div>
<?php 
		if( $sidebar_pos == 3)
		{
			get_sidebar();
		} ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
