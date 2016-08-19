<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package autocar
 */
$sidebar_position = get_post_meta($post->ID,'autocar_post_sidebarposition',true);
if(	empty( $sidebar_position ) ){
	$sidebar_position = 'right';
}
get_header(); ?>
<div class="page-heading">
	<div class="container">
		<div class="row">
			<?php autocar_breadcrumb();?>
		</div>
	</div>
</div>
<div class="blog-page">
	<div class="container">
		<div class="row">
		<?php 
			if( $sidebar_position == 'left'){
				get_sidebar();
			}	
			echo '<div class="',($sidebar_position == 'full' ? 'col-md-12' : 'col-md-8'),'">';
		?>
				<div class="single-post">
					<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'single' ); ?>

					<?php autocar_numeric_posts_nav(); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
					comments_template();
					endif; ?>
					<?php endwhile; // End of the loop. ?>
				</div>
			</div>
		<?php if( $sidebar_position == 'right'){
					get_sidebar();
				}	?>
		</div> <!--End Row-->
	</div> <!--End Container-->
</div> <!--End Blog Page-->
<div class="ac_space"></div>
<?php get_footer(); ?>