<?php
/**
 * Template Name: Blog Classic
 * @package autocar
 */
$post = autocar_postData();
$sidebar_position = get_post_meta($post->ID,'autocar_page_sidebarposition',true);
if(	empty( $sidebar_position ) ){
	$sidebar_position = 'right';
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
		<?php 
			if( $sidebar_position == 'left'){
				get_sidebar();
			}	
		?>
		<?php 
			echo '<div class="',($sidebar_position == 'full' ? 'col-md-12' : 'col-md-8'),'">';
		?>
				<div class="blog-classic-post">
			<?php if ( $query->have_posts() ) : 				
				while ( $query->have_posts() ) : $query->the_post(); ?>
					<?php
					  get_template_part( 'template-parts/content', get_post_format() ); ?>
				<?php endwhile; ?>
				<?php autocar_postsnavigation($query); ?>
			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
				</div>
			</div>
			<?php 
		if( $sidebar_position == 'right')
		{
			get_sidebar();
		}	
		 ?>
		</div>
	</div>
</div>
<div class="ac_space"></div>
<?php get_footer(); ?>