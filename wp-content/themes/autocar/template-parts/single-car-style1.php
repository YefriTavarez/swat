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
								$url_open = "'http://swatimport.com/zoom-in.php?url=".esc_url($src)."'";
								echo
									'<li>
										
										<img  src="'.esc_url($src).'" alt="" onclick="openView(' . $url_open . ');"/>
										
									</li>
									';
							}
							$images = get_field( 'images' );
							if( $images ) {
								foreach($images as $image){
									$image_url = "'http://swatimport.com/zoom-in.php?url=".esc_url($image['sizes']['large'])."'";
									echo '<li><img onclick="openView(' . $image_url . ');" src="'.esc_url($image['sizes']['large']).'" alt="" />','</li>';
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
						<div class="ac_car_ction">
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
<script type="text/javascript">
	var span = document.createElement('span');
	var next = document.createElement('span');
	var previous = document.createElement('span');

	var iframe = document.createElement('iframe');

	var carousel = document.getElementById("car-carousel");
	var image_list = carousel.getElementsByTagName("img");

	function openView(url){
		document.body.appendChild(span);
		span.innerHTML = "&times;";
		span.onclick = function(){ closeMe();}

		span.id = "cerrar";

		document.body.appendChild(iframe);
		iframe.src = url;
		iframe.className = "car-viewer";
		iframe.id = "carviewer";

		document.body.appendChild(previous);
		previous.innerHTML = "❮";
		previous.src = url;
		previous.className = "next-previous";
		previous.id = "previous";
		previous.onclick = function (){
			current_image = iframe.src.split("url=")[1];
			for(index = 0; index < image_list.length; index ++){
				if(current_image == image_list[index].getAttribute("src")){
					
					if(index == 0){
						console.log("this was the first image");
						iframe.src = "http://swatimport.com/zoom-in.php?url=" + image_list[image_list.length - 1].getAttribute("src");
					} else {
						console.log("http://swatimport.com/zoom-in.php?url=" + image_list[index - 1].getAttribute("src"));
						iframe.src = "http://swatimport.com/zoom-in.php?url=" + image_list[index - 1].getAttribute("src");
					}

					break;
				}
			}			
		};

		document.body.appendChild(next);
		next.innerHTML = "❯";
		next.src = url;
		next.className = "next-previous";
		next.id = "next";
		next.onclick = function(){
			current_image = iframe.src.split("url=")[1];
			for(index = 0; index < image_list.length; index ++){
				if(current_image == image_list[index].getAttribute("src")){
					
					if(index == (image_list.length - 1)){
						console.log("this was the first image");
						iframe.src = "http://swatimport.com/zoom-in.php?url=" + image_list[0].getAttribute("src");
					} else {
						iframe.src = "http://swatimport.com/zoom-in.php?url=" + image_list[index + 1].getAttribute("src");
					}

					break;
				}
			}
		};

		divs = document.getElementsByClassName("sidebar-menu-inner");
		for(index = 0; index < divs.length; index ++){
			//divs[index].style = "display: none;";
		}

	}

	function closeMe(){
		document.getElementById("carviewer").remove();
		document.getElementById("cerrar").remove();
		document.getElementById("previous").remove();
		document.getElementById("next").remove();

		divs = document.getElementsByClassName("sidebar-menu-inner");
		for(index = 0; index < divs.length; index ++){
			//divs[index].style = "display: block;";
		}
	}
	
</script>
<!-- similer car -->
<?php get_template_part( 'template-parts/similer','car' ); ?>
<!-- similer car -->