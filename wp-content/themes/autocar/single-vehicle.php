<?php
/**
 * The template for displaying all Car For Sale single posts.
*/
get_header(); 
$post = autocar_postData();
?>
<div class="page-heading">
	<div class="container">
		<div class="row">
			<?php do_action('autocar_vehicle_maintitle'); ?>
		</div>
	</div>
</div>
<?php while ( have_posts() ) : the_post(); ?>
<?php 		
	$single_page_style = get_post_meta( $post->ID, 'autocar_single_page_style', true );
	if( $single_page_style == 'style1' ) {
		get_template_part( 'template-parts/single-car','style1' );
	} else {
		get_template_part( 'template-parts/single-car','style2' );
	}
?>
<?php endwhile; ?>

	<?php do_action('autocar_scheduleform'); ?>
<div class="ac_space"></div>
<?php get_footer(); ?>