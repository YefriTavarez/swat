<?php
/**
 * Template Name: Blog Grid View
 * @package autocar
 */
$post = autocar_postData();
$redux = autocar_reduxData();
if( isset($redux['autocar_sidebar_position']) )
{
	$sidebar_pos = $redux['autocar_sidebar_position'];
}	
get_header();
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
			'post_type' 	 => 'post',
			'paged'		 	 => $paged,
			'orderby' 		 => 'menu_order'
			);			
$query = new WP_Query( $args );
 ?>
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
			<div class="col-md-12">
				<div class="blog-grid-post">
					<div class="row">
					<?php if ( $query->have_posts() ) : 
					while ( $query->have_posts() ) : $query->the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'gridview' ); ?>
					<?php endwhile; ?>
					
					<?php else : ?>
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
					<?php endif; ?>
					
					</div>
				</div>
			</div>
		</div>
		<?php autocar_postsnavigation($query); ?>
		<?php wp_reset_postdata(); ?>
	</div>
</div>
<div class="ac_space"></div>
<?php get_footer(); ?>