<?php
$post = autocar_postData();
$categories = get_the_terms($post->ID,'make');
$category_in=array();
if(is_array($categories) && !empty($categories)){
	foreach($categories as $category) {      
		$category_in[]=$category->term_id;
	}
	$args = array(
		'post_type' => 'vehicle',
		'post__not_in' => array($post->ID),
		'posts_per_page' => -1,
		'tax_query' => array(
			array( 
				'taxonomy' => 'make',
				'terms' => $category_in
			)
		)
	);
	$similercar = get_posts($args);
	if($similercar){
?>
<div class="recent-car similar-car">
	<div class="container">
		<div class="recent-car-content">
			<div class="row">
				<div class="col-md-12">
					<div class="section-heading">
						<i class="fa fa-car"></i>
						<div class="atc_sect_heading">
						<h2><?php esc_html_e('Similar Cars','autocar'); ?></h2>
						<span><?php esc_html_e('You may like thoose too','autocar'); ?></span>
						</div>
					</div>
				</div>
			</div>
			<div id="owl-similar" class="owl-carousel owl-theme">
				<?php foreach ($similercar as $post ) : setup_postdata( $post );  ?>
				<div class="car-item">
					<div class="thumb-content">
						<div class="car-banner-rent">
							<a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>"><?php esc_html_e('Model:','autocar'); ?> 
							<?php
							$categories = get_the_terms($post->ID,'model');
							foreach($categories as $category) {      
								echo esc_html($category->name);
								break;
							}
							?></a>
						</div>
						<a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
							<?php 
							$src = '';
							if(has_post_thumbnail($post->ID)){
								$thumb = get_post_thumbnail_id($post->ID);
								$src = wp_get_attachment_image_src($thumb,'autocar_vehicle');	
								echo '<img src="'.esc_url($src[0]).'" alt="'.esc_html(get_the_title($post->ID)).'" />';
							}							
							
							?>
						</a>
					</div>
					<div class="down-content">
						<a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>"><h4><?php echo esc_html(get_the_title($post->ID)); ?></h4></a>
						<?php echo do_shortcode( "[vehicle_price]" ); ?>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
<?php } wp_reset_postdata(); } ?>