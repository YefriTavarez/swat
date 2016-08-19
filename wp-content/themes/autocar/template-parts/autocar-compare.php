<?php
/**
 * Template Name: Compare Car
 */
get_header();
$cookiearr = isset($_COOKIE['autocar_car_items']) ? $_COOKIE['autocar_car_items'] : '';
$arr = explode(',',$cookiearr);
$first = isset($arr[0]) ? $arr[0] : '';
$second = isset($arr[1]) ? $arr[1] : '';
$third = isset($arr[2]) ? $arr[2] : '';
?>
<div class="page-heading">
	<div class="container">
		<div class="row">
			<?php autocar_breadcrumb();?>
		</div>
	</div>
</div>
<div class="ac_compare_section">
	<div class="container">
		<div class="row">
			<div class="ac_car_compare autocar_compare_addnewitemsec">
				<div class="col-md-3 hidden-xs">
					<div class="ac_compare_wrapper">
						<div class="compare_heading">
							<h1><?php esc_html_e('compare car','autocar'); ?></h1>
						</div>
						<div class="ac_compare_list">
							<ul>
								<?php autocar_get_vehicle_specs(); ?>
							</ul>
						</div>
						<div class="ac_compare_featurelist">
							<h3><?php esc_html_e('Additional Features','autocar'); ?></h3>
						</div>
					</div>
				</div>
							
				<?php 
					if(empty($first)){ 
						autocar_compare_itemsadd();
					}else{
						autocar_compare_itemsremove($first);
					} 
					
					if(empty($second)){ 
						autocar_compare_itemsadd();
					}else{
						autocar_compare_itemsremove($second);
					} 
					
					if(empty($third)){ 
						autocar_compare_itemsadd();
					}else{
						autocar_compare_itemsremove($third);
					} 
				?>
				
			</div>
			
		</div>
	</div>
</div>
<div class="ac_space"></div>
<?php get_footer(); ?>
