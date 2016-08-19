<?php
/**
 * Template Name: Vehicle Listing
 */
$redux = autocar_reduxData();
$sidebar_position = get_post_meta($post->ID,'autocar_page_sidebarposition',true);
if(	empty( $sidebar_position ) ){
	$sidebar_position = 'right';
}
get_header();
?>
<div class="page-heading">
	<div class="container">
		<div class="row">
			<?php do_action('autocar_vehicle_maintitle'); ?>
		</div>
	</div>
</div>
<div class="autocar_page">
	<div class="container">
<?php
$order = "DESC";
$orderby = "title";

if(isset($_GET['search_order'])) $order = $_GET['search_order'];
if(isset($_GET['search_orderby'])){
	if($_GET['search_orderby'] == 'title'){
		$orderby = $_GET['search_orderby'];
	}else{
		$orderby = 'meta_value';
	}
}

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
	'post_type' => 'vehicle',
	'paged'		=> $paged,
	'order'	=> $order,
	'orderby'	=> $orderby,
);

if(isset($_GET['search_orderby']) && $_GET['search_orderby'] != 'title'){
	$args['meta_key'] = $_GET['search_orderby'];
}

$the_query = new WP_Query( $args );
?>

<div class="row">			
	<div class="autocar_sort">
		<div class="col-lg-6 col-md-6">
			<h3 id="listed-property"><?php echo $the_query->found_posts;  echo esc_html__('Cars Listed', 'autocar')?> </h3>
		</div>		
		
			<div class="col-lg-6 col-md-6">

						<form class="custom" action="" method="get" id="orderform" name="orderform">
				            <div class="row">
				                <div class="col-lg-6 col-md-6">
				                    <select class="no-mbot hidden-field" name="search_order" onchange="document.forms['orderform'].submit()" >
				                        <option value="ASC" <?php echo $order == "ASC" ? "selected" : ""; ?>><?php echo esc_html__('Ascending', 'autocar');?></option>
				                        <option value="DESC" <?php echo $order == "DESC" ? "selected" : ""; ?>><?php echo esc_html__('Descending', 'autocar');?></option>
				                    </select>
				                </div>
				                <div class="col-lg-6 col-md-6">
				                    <select class="no-mbot hidden-field" name="search_orderby" onchange="document.forms['orderform'].submit()" >
				                        <option value="price" <?php echo $orderby == "price" ? "selected" : ""; ?>><?php echo esc_html__('Price', 'autocar');?></option>
				                        <option value="registration" <?php echo $orderby == "date" ? "selected" : ""; ?>><?php echo esc_html__('Registration Date', 'autocar');?></option>
				                        <option value="title" <?php echo $orderby == "title" ? "selected" : ""; ?>><?php echo esc_html__('Title', 'autocar');?></option>
										<option value="milage" <?php echo $orderby == "milage" ? "selected" : ""; ?>><?php echo esc_html__('Mileage', 'autocar');?></option>
				                    </select>
				                </div>
							</div>
				        </form>
					</div>
            	</div>
</div>	
<div class="row">	
		<?php
				if( $sidebar_position == 'left')
				{
					get_sidebar();
				}	
			?>
			<?php if($sidebar_position == 'full' ) {
						 echo '<div class="col-md-12">';
					 }
					 else{
						 echo '<div class="col-md-8">';
					 }
			?>
			
<?php		 
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		?>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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

	<?php
	}
 autocar_postsnavigation($the_query);
} else {
	// no posts found
}
?>
</div>
<?php 
			if( $sidebar_position == 'right' )
			{
				get_sidebar();
			}	
		 ?>
</div>
</div>
</div>
<div class="ac_space"></div>
<?php get_footer(); ?>