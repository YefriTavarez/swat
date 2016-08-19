<?php 
$post = autocar_postData(); $src = ''; 
$brochure = get_post_meta($post->ID,'autocar_v_brochure',true);
$brochure = wp_get_attachment_url($brochure, 'full');
?>
<div class="recent-car on-listing">
	<div class="container">
		<div class="recent-car-content">
			<div class="row">
				<div class="col-md-6">
					<?php
						if(has_post_thumbnail($post->ID)){
							$thumb = get_post_thumbnail_id($post->ID);
							$src = wp_get_attachment_url($thumb, 'full');
						}
					?>
					
					<div id="car-flexslider" class="car-flexslider">
						<ul class="slides">
						<?php
							if(!empty($src)){
								echo '<li><img src="'.esc_url($src).'" alt="" /></li>';
							}
							$images = get_field( 'images' );
							if( $images ) {
								foreach($images as $image){
									echo '<li><img src="'.esc_url($image['sizes']['large']).'" alt="" />','</li>';
								}
							}
						?>
						</ul>
					</div>
					
					<div id="car-carousel" class="car-flexslider">
						<ul class="slides">
						<?php
							if(!empty($src)){
								echo '<li><img src="'.esc_url($src).'" alt="" /></li>';
							}
							$images = get_field( 'images' );
							if( $images ) {
								foreach($images as $image){
									echo '<li><img src="'.esc_url($image['sizes']['large']).'" alt="" />','</li>';
								}
							}
						?>
						</ul>
					</div>
					
				</div>
				<div class="col-md-6">
					<div class="car-details">
						<a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>"><h4><?php the_title(); ?></h4></a>
						<div class="ac_car_action">
							<ul>
								<?php $schedule = get_option('autocar_schedule'); ?>
								<?php if($schedule == 'enable'){ ?>
									<li><a href="javascript:;" class="autocar_schedule" data-title="<?php echo esc_attr(get_the_title($post->ID)); ?>"><?php esc_html_e('Schedule Test Drive','autocar'); ?></a></li>
								<?php } ?>
								<li><a href="<?php echo esc_url($brochure); ?>" class="autocar_brochure" download><?php esc_html_e('Brochure','autocar'); ?></a></li>
								<li>
									<?php $text = check_is_compare_id($post->ID); ?>
									<a href="javascript:;" class="<?php echo esc_attr($text['cls']); ?>" data-carId="<?php echo esc_attr($post->ID); ?>" data-aicon="false"><?php echo esc_html($text['txt']); ?></a>
								</li>
							</ul>
						</div>
						<?php echo do_shortcode( '[vehicle_price]' ); ?>
						<div class="line-dec"></div>
						<?php echo do_shortcode( '[vehicle_description]' ); ?>
						<?php echo do_shortcode( '[vehicle_specs]' ); ?>
						<div class="contact-info">
							<div class="row">
								<?php
									$phone = get_post_meta($post->ID,'autocar_v_phonenumber',true);
									$email = get_post_meta($post->ID,'autocar_v_emialID',true);
								?>
								
								<div class="col-md-6 col-sm-6 col-xs-6">
									<?php if(!empty($phone)){ ?>
										<i class="fa fa-phone"></i><span><?php echo esc_html($phone); ?></span>
									<?php } ?>
								</div>
								
								
								<div class="col-md-6 col-sm-6 col-xs-6">
									<?php if(!empty($email)){ ?>
										<i class="fa fa-envelope"></i><span><?php echo esc_html($email); ?></span>
									<?php } ?>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- similer car -->
<?php get_template_part( 'template-parts/similer','car' ); ?>
<!-- similer car -->