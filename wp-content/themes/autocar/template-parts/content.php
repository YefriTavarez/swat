<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package autocar
 */
$post = autocar_postData();
?>

<?php if ( 'vehicle' === get_post_type() ) : ?>
	<?php get_template_part( 'template-parts/vehicle', 'search' ); ?>
	<?php return; ?>
<?php endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="item">
	
	<?php 
		if( has_post_thumbnail($post->ID) ){
			autocar_set_feature_image($post->ID);
		}
		
		the_title( sprintf( '<a href="%s" rel="bookmark"><h4 class="entry-title">', esc_url( get_permalink() ) ), '</h4></a>' ); 
	?>
		
		<ul>
			<li><span><em><?php esc_html_e('Posted by:', 'autocar');?></em>
			<?php
				echo '<a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'">'.esc_html(get_the_author()).'</a>';			
			?></span></li>
			<li><?php autocar_posted_on(); ?></li>
			<?php	
			echo '<li><em>'.esc_html__('Categories:', 'autocar').'</em>'.get_the_category_list(',').'</li></ul>'; ?>
			<div class="line-dec"></div>

				<p><?php echo get_the_excerpt(); ?></p>
			<div class="primary-button">
				<a href="<?php echo esc_url( get_permalink() ) ;?>"><?php echo esc_html__('Read More', 'autocar'); ?></a>
			</div>
		<?php
			wp_link_pages( array(
				 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'autocar' ),
				 'after'  => '</div>',
			 ) ); ?>
	</div>
</article><!-- #post-## -->