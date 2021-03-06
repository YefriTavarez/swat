<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package autocar
 */
$redux = autocar_reduxData();
$sidebar_pos = 3;
if( isset($redux['autocar_sidebar_position']) ){
	$sidebar_pos = $redux['autocar_sidebar_position'];
}	
get_header(); ?>
<div class="page-heading"></div>
<div class="blog-page">
	<div class="container">
		<div class="row">
		<?php 
			if( $sidebar_pos == 2){
				get_sidebar();
			}	
		?>
		<?php 
			echo '<div class="',($sidebar_pos == 1 ? 'col-md-12' : 'col-md-8'),'">';
		?>
			
				<div class="blog-classic-post">
			<?php if ( have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php
						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() ); ?>
				<?php endwhile; ?>
				<?php autocar_numeric_posts_nav(); ?>
			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; ?>
				</div>
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