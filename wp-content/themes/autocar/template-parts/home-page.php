<?php 
/**
 * Template Name: Home Page Style
 */
$sidebar_position = get_post_meta($post->ID,'autocar_page_sidebarposition',true);
if(	empty( $sidebar_position ) ){
	$sidebar_position = 'right';
}
get_header();
if( !is_front_page() ) { ?>
<div class="page-heading">
	<div class="container">
		<div class="row">
			<?php autocar_breadcrumb();?>
		</div>
	</div>
</div>
<?php } ?>
		<div class="row">
			<?php 
				if( $sidebar_position == 'left')
				{
					get_sidebar();
				}	
			?>
			<?php if($sidebar_position == 'full') {
					echo '<div class="col-md-12">';
				}
				else{
					 echo '<div class="col-md-8">';
					}?>
			<div class="single-post">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						//comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>
			</div>
			</div>
			<?php 
			if( $sidebar_position == 'right')
			{
				get_sidebar();
			} ?>
			</div>
<?php get_footer(); ?>