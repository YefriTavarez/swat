<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package autocar
 */
$redux = autocar_reduxData();
if( isset($redux['autocar_sidebar_position']) )
{
	$sidebar_pos = $redux['autocar_sidebar_position'];
}
get_header(); ?>
<div class="page-heading">
	<div class="container">
		<div class="row">
			<?php autocar_breadcrumb(); ?>
		</div>
	</div>
</div>
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
						 }?>
						 
		<?php if ( have_posts() ) : ?>
		
			<div class="blog-classic-post search_wrapper row">
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );
					?>

				<?php endwhile; ?>
			</div>
			<?php autocar_numeric_posts_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
		</div>
		<?php 
			if( $sidebar_pos == 3)
			{
				get_sidebar();
			}	
		 ?>
		</div>
	</div>
</div>
<div class="ac_space"></div>
<?php get_footer(); ?>
