<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package autocar
 */
$redux = autocar_reduxData();
if( isset($redux['autocar_sidebar_position']) ){
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
				} ?>
				<?php if($sidebar_pos == 1) {
						echo '<div class="col-md-12">';
						}
						 else{
							 echo '<div class="col-md-8">';
						 } ?>
<div class="blog-classic-post">
	<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<h2 class="page-title"><?php printf( esc_html__( 'SEARCH RESULTS FOR: %s', 'autocar' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );
				?>
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
	} ?>
</div></div></div>
<div class="ac_space"></div>
<?php get_footer(); ?>