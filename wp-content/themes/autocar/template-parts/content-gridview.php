<?php
/**
 * Template part for displaying Grid View Post.
 * @package autocar
 */
$post = autocar_postData();
$thumb = get_post_thumbnail_id();
$img_url = wp_get_attachment_image_src( $thumb,'autocar_blog_grid');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="item col-md-4">
		<?php
			if( has_post_thumbnail($post->ID) ){
			echo '<a href="'. esc_url( get_the_permalink() ) .'"><img src="'. esc_url( $img_url[0] ) .'" alt="autocar"></a>';
		}
		?>
		<div class="down-content">
			<?php the_title( sprintf( '<a href="%s" rel="bookmark"><h4>', esc_url( get_permalink() ) ), '</h4></a>' ); ?>
			<ul>
				<li><span><em><?php esc_html_e('Posted by:', 'autocar');?></em>
				<?php
					echo '<a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'">'.esc_html(get_the_author()).'</a>';	
				?></span></li>
				<li><?php autocar_posted_on(); ?></li>
			</ul>
			<div class="line-dec"></div>
			<p><?php echo get_the_excerpt(); ?></p>
			<div class="primary-button">
				<a href="<?php echo esc_url( get_permalink() ) ;?>"><?php echo esc_html__('Read More', 'autocar'); ?></a>
			</div>
		</div>
	</div>
</article><!-- #post-## -->