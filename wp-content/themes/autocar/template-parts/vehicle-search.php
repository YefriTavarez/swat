<?php
$size = 'autocar_vehicle_2';
$categories = get_the_terms($post->ID,'make');
foreach($categories as $category) {      
	$make = $category->name;
	break;
}
?>
<div class="col-md-6">
	<div class="recent_car_wrapper">
		<div class="recent_car_img">
			<?php if(has_post_thumbnail($post->ID)){ ?>
				<?php $thumb = get_post_thumbnail_id($post->ID);
				$src = wp_get_attachment_image_src($thumb, $size); ?>
				<a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
				<img src="<?php echo esc_url($src[0]); ?>" alt="<?php echo esc_html(get_the_title($post->ID)); ?>" />
				</a>
			<?php } ?>
			
			<div class="ac_price_wrapper">
				<?php echo do_shortcode( "[vehicle_price]" ); ?>
			</div>
			
			<?php $text = check_is_compare_id($post->ID,'true'); ?>
			
			<div class="ac_overlay"><span><a href="javascript:;" class="<?php echo esc_attr($text['cls']); ?>" data-carId="<?php echo esc_attr($post->ID); ?>" data-aicon="true" > <?php echo $text['txt']; ?></a> <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" ><i class="fa fa-link"></i></a></span></div>
			
		</div>
		<div class="ac_recent_car_content">
			<div class="ac_car_name">
				<h4><a href="<?php echo esc_url(get_the_permalink());  ?>"><?php echo esc_html(get_the_title()); ?></a></h4>
			</div>
			<div class="ac_car_type">
				<div class="ac_car_icon"><img src="<?php echo PLUGIN_PATH; ?>images/car_icon.png" alt=""></div>
				<h6><?php echo esc_html($make); ?></h6>
			</div>
		</div>
	</div>
</div>

