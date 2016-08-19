<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package autocar
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="item">
<?php
$post = autocar_postData();
if( has_post_thumbnail() ){
	$image_src = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );	
	echo '<img src="'. esc_url( $image_src ) .'" alt="autocar" />';
}
	the_title( '<h4 class="entry-title">', '</h4>' );
	
echo '<div class="atc_metadata"><ul>';?>
		<li><span><em><?php esc_html_e('Posted by:', 'autocar');?></em>
		<?php
		echo '<a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'">'.esc_html(get_the_author()).'</a>';	
		?></span></li>
		<li><?php autocar_posted_on(); ?></li>
		<?php
		$facbook = 'https://www.facebook.com/sharer/sharer.php?u='.esc_url(get_permalink());
		$twitter = 'https://twitter.com/home?status='.esc_url(get_permalink());
		$linkdin = 'https://www.linkedin.com/shareArticle?mini=true&url='.esc_url(get_permalink()).'&title=&summary=&source=';
		echo '<li><em>'.esc_html__('Categories:', 'autocar').'</em>'.get_the_category_list( ',').'</li>
		<li><span><em>'.esc_html__('Share on:', 'autocar').'</em>
		<a href="'.esc_url( $facbook ).'">'.esc_html__('Facebook', 'autocar').'</a>,
		<a href="'.esc_url( $twitter ).'">'.esc_html__('Twitter', 'autocar').'</a>,
		<a href="'.esc_url( $linkdin ).'"> '.esc_html__('Linkedin', 'autocar').'</a></span></li>
		</ul>'; ?>
</div>
<div class="line-dec"></div>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'autocar' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<div class="entry-footer">
	<?php autocar_entry_footer(); ?>
	</div>
</div>

</article><!-- #post-## -->