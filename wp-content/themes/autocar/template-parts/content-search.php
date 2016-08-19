<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package autocar
 */
$post = autocar_postData();
$image_src = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="item">
	<header class="entry-header">
	<?php
	if( has_post_thumbnail($post->ID) ){
			echo '<a href="'. esc_url( get_the_permalink() ) .'"><img src="'. esc_url( $image_src ) .'" alt="autocar"></a>';
		}
	?>
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="atc_metadata">
			<?php
			echo '<ul>
				<li><span><em>'. esc_html__('Posted by:', 'autocar') .'</em>';
				echo '<a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'">'.esc_html(get_the_author()).'</a>';	
				echo '</li>'; ?>
				<li><?php autocar_posted_on(); ?></span></li>
			<?php	
			echo '<li><span><em>'.esc_html__('Categories:', 'autocar').'</em>'.get_the_category_list( ',').'</li></ul>'; ?>
			<div class="line-dec"></div>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
		<?php the_excerpt(); ?>
		<div class="primary-button">
				<a href="<?php echo esc_url( get_permalink() ) ;?>"><?php echo esc_html__('Read More', 'autocar'); ?></a>
		</div>
   </div>		
</article><!-- #post-## -->